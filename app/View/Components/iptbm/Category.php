<?php

namespace App\View\Components\iptbm;

use App\Models\iptbm\IptbmTechCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category extends Component
{
    private mixed $route;
    /**
     * @var mixed|null
     */
    private mixed $id;
    /**
     * @var mixed|null
     */
    private mixed $indusId;
    private mixed $sector;

    /**
     * Create a new component instance.
     */
    public function __construct($route, $sector, $indusId = null, $id = null)
    {
        /**
         *  use industry id as parameter
         */
        $this->route = $route;
        $this->id = $id;
        $this->indusId = $indusId;
        $this->sector = $sector;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = IptbmTechCategory::where('iptbm_industry_id', $this->id)->get();
        return view('components.iptbm.category', [
            'categories' => $categories,
            'route' => $this->route,
            'indusId' => $this->indusId,
            'sector' => $this->sector
        ]);
    }
}
