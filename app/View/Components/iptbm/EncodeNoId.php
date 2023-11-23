<?php

namespace App\View\Components\iptbm;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EncodeNoId extends Component
{
    /**
     * @var mixed|null
     */
    public $modalId;
    /**
     * @var mixed|null
     */
    public $route;
    /**
     * @var mixed|null
     */
    public $classHead;
    /**
     * @var mixed|null
     */
    public $title;
    /**
     * @var mixed|null
     */
    public $classClose;
    /**
     * @var mixed|null
     */
    public $classModal;
    /**
     * @var mixed|null
     */
    public $upload;

    /**
     * Create a new component instance.
     */
    public function __construct($modalId = null, $route = null, $classHead = null, $title = null, $classClose = null, $classModal = null, $upload = null)
    {
        $this->modalId = $modalId;
        $this->route = $route;
        $this->classHead = $classHead;
        $this->title = $title;
        $this->classClose = $classClose;
        $this->classModal = $classModal;
        $this->upload = $upload;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.iptbm.encode-no-id', [
            'modalId' => $this->modalId ?? "",
            'route' => $this->route ?? "",
            'classHead' => $this->classHead ?? "",
            'title' => $this->title ?? "",
            'classClose' => $this->classClose ?? "",
            'classModal' => $this->classModal ?? "",
            'upload' => $this->upload ?? ""
        ]);
    }
}
