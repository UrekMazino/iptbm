<?php

namespace App\Http\Livewire\Iptbm;

use Livewire\Component;

class DeleteRow extends Component
{
    public $model;
    public $item;
    public $eventName;
    public $modalId;

    public function deleteData()
    {
        if($this->eventName)
        {
            $this->emit($this->eventName);

        }else{
            $this->model->delete();
            $this->emit('reloadPage');
        }

    }
    public function mount($model,$item,$modalName,$customFunction=null)
    {
        $this->model=$model;
        $this->item=$item;
        $this->eventName=$customFunction;
        $this->modalId=$modalName;
    }
    public function render()
    {
        return view('livewire.iptbm.delete-row');
    }
}
