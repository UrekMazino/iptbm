<?php

namespace App\View\Components\iptbm\admin\IpAlert;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class NavigationAlert extends Component
{
    /**
     * Create a new component instance.
     */
    public $route;
    public function __construct()
    {
        $this->route=Route::currentRouteName();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.iptbm.admin.ip-alert.navigation-alert');
    }
}
