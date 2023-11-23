<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmTechCommodity;
use Livewire\Component;

class TechCommodityList extends Component
{
    public $commodity;

    public function deleteCommodity($id)
    {
        $commodity = IptbmTechCommodity::find($id);
        $commodity->delete();
        $this->emit('updateParentCommodity');

    }

    public function mount($commodity)
    {
        $this->commodity = $commodity;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.tech-commodity-list');
    }
}
