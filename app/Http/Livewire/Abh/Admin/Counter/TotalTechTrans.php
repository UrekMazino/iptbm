<?php

namespace App\Http\Livewire\Abh\Admin\Counter;

use Livewire\Component;

class TotalTechTrans extends Component
{

    public $modal_id;


    public function mount($modal_id): void
    {

        $this->modal_id=$modal_id;
    }
    public function render()
    {
        return view('livewire.abh.admin.counter.total-tech-trans');
    }
}
