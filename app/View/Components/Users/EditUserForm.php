<?php

namespace App\View\Components\Users;

use Illuminate\View\Component;

use DB;
use Modules\Users\Entities\User;

class EditUserForm extends Component
{
    public $user;
    public $roles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $user = User::with('users_setting')->find($id);
        $roles = DB::table('roles')->orderBy('id', 'desc')->get();

        $this->user = $user;
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.users.edit-user-form');
    }
}
