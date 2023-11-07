<?php

namespace App\View\Components\iptbm;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteButton extends Component
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
    private mixed $botClass;

    /**
     * Create a new component instance.
     */
    private mixed $hiddenName;
    /**
     * @var mixed|null
     */



    /**
     * Create a new component instance.
     */
    public function __construct($modId=null,$route=null,$itemId=null,$title=null,$itemName=null,$hiddenName=null,$botClass=null)
    {
        $this->modId=$modId;
        $this->route=$route;
        $this->itemId=$itemId;
        $this->title=$title;
        $this->itemName=$itemName;
        $this->hiddenName=$hiddenName;
        $this->botClass=$botClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.iptbm.delete-button',[
            'modId'=>$this->modId,
            'route'=>$this->route,
            'itemId'=>$this->itemId,
            'title'=>$this->title,
            'itemName'=>$this->itemName,
            'hiddenName'=>$this->hiddenName,
            'botClass'=>$this->botClass
        ]);
    }
}
