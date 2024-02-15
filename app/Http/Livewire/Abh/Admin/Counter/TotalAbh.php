<?php

namespace App\Http\Livewire\Abh\Admin\Counter;

use Livewire\Component;

class TotalAbh extends Component
{
    public $modal_id;


    public function mount($modal_id): void
    {

        $this->modal_id=$modal_id;
    }





    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('livewire.abh.admin.counter.total-abh');
    }
}
