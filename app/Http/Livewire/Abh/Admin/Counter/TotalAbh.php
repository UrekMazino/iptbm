<?php

namespace App\Http\Livewire\Abh\Admin\Counter;

use App\Models\abh\AbhProfile;
use App\Models\iptbm\IptbmRegion;
use App\View\Components\abh\admin\AbhAdminApp;
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

        return view('livewire.abh.admin.counter.total-abh')
            ->with([
                'regions'=>IptbmRegion::with('abh')->latest()->get(),
                'abh_profile'=>AbhProfile::all()->count()
            ]);
    }
}
