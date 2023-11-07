<?php

namespace App\View\Components\iptbm\admin;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AddRecordNav extends Component
{
    /**
     * @var mixed|null
     */
    private mixed $tab;

    /**
     * Create a new component instance.
     */
    public function __construct($tab=null)
    {
        $this->tab = $tab;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.iptbm.admin.add-record-nav',[
            'tab' => $this->tab
        ]);
    }
}
