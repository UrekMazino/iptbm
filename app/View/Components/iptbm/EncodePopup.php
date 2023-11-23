<?php

namespace App\View\Components\iptbm;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EncodePopup extends Component
{
    /**
     * @var mixed|null
     */
    private mixed $modalId;

    private mixed $classHead;

    private mixed $route;

    private mixed $title;

    private mixed $classClose;
    /**
     * @var mixed|null
     */
    private mixed $routeData;
    /**
     * @var mixed|null
     */
    private mixed $classModal;
    /**
     * @var mixed|null
     */
    private mixed $upload;
    private mixed $multiple;

    /**
     * Create a new component instance.
     */
    public function __construct($multiple = null, $modalId = null, $route = null, $classHead = null, $title = null, $classClose = null, $routeData = null, $classModal = null, $upload = null)
    {
        $this->modalId = $modalId;
        $this->route = $route;
        $this->classHead = $classHead;
        $this->title = $title;
        $this->classClose = $classClose;
        $this->routeData = $routeData;
        $this->classModal = $classModal;
        $this->upload = $upload;
        $this->multiple = $multiple;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.iptbm.encode-popup', [
            'modalId' => $this->modalId,
            'route' => $this->route,
            'classHead' => $this->classHead,
            'title' => $this->title,
            'classClose' => $this->classClose,
            'routeData' => $this->routeData,
            'classModal' => $this->classModal,
            'upload' => $this->upload,
            'multiple' => $this->multiple,
        ]);
    }
}
