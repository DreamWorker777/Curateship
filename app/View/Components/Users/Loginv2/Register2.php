<?php

namespace App\View\Components\Users\Loginv2;

use Illuminate\View\Component;

class Register2 extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.users.loginv2.registerv2');
    }
}
