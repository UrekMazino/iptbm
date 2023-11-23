<?php

namespace App\Http\Livewire\Iptbm\Staff\Inventor;

use App\Models\iptbm\IptbmInventorExpertise;
use Livewire\Component;


class DeleteExpertiesPopup extends Component
{

    public $expertise;
    public $routeId;

    public function mount($expertise, $id)
    {
        $this->expertise = $expertise;
        $this->routeId = $id;
    }

    public function deleteRecord($id)
    {
        IptbmInventorExpertise::find($id)->delete();

        return redirect()->route('iptbm.inventor.show.profile', ['id' => $this->routeId]);
    }

    public function render()
    {
        return view('livewire.iptbm.staff.inventor.delete-experties-popup');
    }
}
