<?php

namespace App\View\Components\Users;

use DB;

use Illuminate\View\Component;

class AddUserForm extends Component
{
    public $roles;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $roles = DB::table('roles')->orderBy('id', 'desc')->get();
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.users.add-user-form');
    }
}
