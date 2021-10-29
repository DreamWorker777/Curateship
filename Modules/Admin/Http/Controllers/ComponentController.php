<?php

namespace Modules\Admin\Http\Controllers;

use Arr, Str, Image, File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Component;

class ComponentController extends Controller {
    public function index() {
        // Storage::disk('component')->put                                   ** replace the file **
        // Storage::disk('component')->delete('path/file.jpg');              ** delete the file **
        // Storage::disk('component')->get('file.jpg');                      ** get the file **

        // ** download file **
        // return Storage::download('file.jpg');                            
        // return Storage::download('file.jpg', $name, $headers);

        $components = Component::get()->toArray();

        foreach( $components as $index => $component ) {
            $exists = Storage::disk('component')->exists($component['category'].'/'.$component['name'].'.blade.php');
            if( $exists ) {
                $content = Storage::disk('component')->get($component['category'].'/'.$component['name'].'.blade.php');
                $content_php = Storage::disk('component')->get($component['category'].'/'.$component['name'].'.php');
            } else {
                $content = '';
                $content_php = '';
            }
            
            $components[$index]['content'] = $content;
            $components[$index]['content_php'] = $content_php;
        }

        return view('admin::editor.component.index', compact('components'));
    }

    public function add(Request $request) {
        $name = $request->name;
        $category = $request->category;

        $exists = Storage::disk('component')->exists($category.'/'.$name.'.blade.php');

        $data = [];

        if( !$exists ) {
            Storage::disk('component')->put($category.'/'.$name.'.blade.php', '');
            Storage::disk('component')->put($category.'/'.$name.'.php', '');
            
            $model = new Component;
            $model->name = $name;
            $model->category = $category;
            $model->save();

            $data['success'] = true;
            $data['message'] = "Successfully added the component!";
        } else {
            $data['success'] = false;
            $data['message'] = "This component already exists.";
        }
        
        return response( json_encode($data) );
    }

    public function saveContent(Request $request) {
        $id = $request->id;
        $content = $request->content;
        $content_php = $request->content_php;

        $component = Component::find($id);
        $category = $component->category;
        $name = $component->name;

        $data = [];

        $exists = Storage::disk('component')->exists($category.'/'.$name.'.blade.php');
        if( $exists ) {
            Storage::disk('component')->put($category.'/'.$name.'.blade.php', $content);
            Storage::disk('component')->put($category.'/'.$name.'.php', $content_php);

            $data['success'] = true;
            $data['message'] = 'Successfully saved the component!';
        } else {
            $data['success'] = false;
            $data['message'] = "Component doesn't exist!";
        }
        
        return response( json_encode($data) );
    }

    public function updateName( Request $request ) {
        $id = $request->id;
        $newName = $request->updatedName;

        $data = [];

        $component = Component::find($id);

        $temp = Component::where(['name' => $newName, 'category' => $component->category])->get()->toArray();

        if( count($temp) > 0 ) {
            $data['success'] = false;
            $data['message'] = 'Component name already exists in the same category';

            return response( json_encode($data) );
        }

        $content = Storage::disk('component')->get($component['category'].'/'.$component['name'].'.blade.php');
        $content_php = Storage::disk('component')->get($component['category'].'/'.$component['name'].'.php');

        Storage::disk('component')->delete($component['category'].'/'.$component['name'].'.blade.php');
        Storage::disk('component')->delete($component['category'].'/'.$component['name'].'.php');

        $component->name = $newName;
        $component->save();

        Storage::disk('component')->put($component['category'].'/'.$component['name'].'.blade.php', $content);
        Storage::disk('component')->put($component['category'].'/'.$component['name'].'.php', $content_php);

        $data['success'] = true;
        $data['message'] = 'Successfully updated the component name!';
        return response( json_encode($data) );
    }

    public function deleteComponent( Request $request ) {
        $id = $request->id;
        $component = Component::find($id);

        Storage::disk('component')->delete($component['category'].'/'.$component['name'].'.blade.php');
        Storage::disk('component')->delete($component['category'].'/'.$component['name'].'.php');

        $component->delete();

        $data = [];
        $data['success'] = true;
        $data['message'] = 'Successfully deleted the component!';

        return response( json_encode($data) );
    }
}