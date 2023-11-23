<?php

namespace App\View\Components\iptbm;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteWarning extends Component
{
    /**
     * @var mixed|null
     */
    private mixed $modId;
    /**
     * @var mixed|null
     */
    private mixed $route;
    /**
     * @var mixed|null
     */
    private mixed $itemId;
    /**
     * @var mixed|null
     */
    private mixed $title;
    /**
     * @var mixed|null
     */
    private mixed $itemName;
    /**
     * @var mixed|null
     */
    private mixed $hiddenName;

    /**
     * Create a new component instance.
     */
    public function __construct($modId = null, $route = null, $itemId = null, $title = null, $itemName = null, $hiddenName = null)
    {
        $this->modId = $modId;
        $this->route = $route;
        $this->itemId = $itemId;
        $this->title = $title;
        $this->itemName = $itemName;
        $this->hiddenName = $hiddenName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.iptbm.delete-warning', [
            'modId' => $this->modId,
            'route' => $this->route,
            'itemId' => $this->itemId,
            'title' => $this->title,
            'itemName' => $this->itemName,
            'hiddenName' => $this->hiddenName
        ]);
    }
}
