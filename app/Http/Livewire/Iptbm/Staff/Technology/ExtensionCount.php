<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmExtensionPathway;
use Livewire\Component;

class ExtensionCount extends Component
{
    public $extension;
    public $count;
    public $technology;

    public function mount($technologyId)
    {

        /*
         *  $this->fill([
             'extension' => $extension,
             'count' => $this->extension->count()
         ]);
         */
        $this->technology = $technologyId;
    }

    public function render()
    {
        $this->extension = IptbmExtensionPathway::latest()->limit(5)->where('technology_id', $this->technology)->get();
        return view('livewire.iptbm.staff.technology.extension-count')->with([
            'extension' => $this->extension
        ]);
    }
}
