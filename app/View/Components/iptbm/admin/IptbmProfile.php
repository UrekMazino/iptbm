<?php

namespace App\View\Components\iptbm\admin;

use App\Models\iptbm\IptbmRegion;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class IptbmProfile extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $regions=IptbmRegion::select('id','name')->get();
        return view('components.iptbm.admin.iptbm-profile',[
            'regions'=>$regions
        ]);
    }
}
