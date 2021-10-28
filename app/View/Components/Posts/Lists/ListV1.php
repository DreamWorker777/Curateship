<?php

namespace App\View\Components\Posts\Lists;

use Illuminate\View\Component;
use Modules\Post\Entities\Post;

class ListV1 extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.posts.lists.list-v1');
    }
}
