<?php

namespace App\View\Components\iptbm;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashBoardTechnology extends Component
{
    private mixed $id;

    /**
     * Create a new component instance.
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.iptbm.dash-board-technology');
    }
}
