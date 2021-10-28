<?php

namespace App\View\Components\Pages;

use Illuminate\View\Component;

use Modules\Page\Entities\Page;

class SinglePage extends Component
{
    public $page;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $page = Page::where(
            [
                'id' => $id,
                'is_pending'   => false,
                'is_deleted'   => false
            ]
        )->first();

        if ($page) {
            $page['description'] = Page::parseContent($page['description']);
        }

        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.pages.single-page');
    }
}
