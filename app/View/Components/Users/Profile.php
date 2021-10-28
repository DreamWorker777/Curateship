<?php

namespace App\View\Components\Users;

use Illuminate\View\Component;

use Modules\Users\Entities\User;

class Profile extends Component
{
    public $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id = null)
    {
        if ($id) {
            $this->user = User::where('id', $id)->first();
        } else {
            $this->user = auth()->user();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.users.profile');
    }

}
