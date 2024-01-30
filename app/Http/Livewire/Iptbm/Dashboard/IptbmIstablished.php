<?php

namespace App\Http\Livewire\Iptbm\Dashboard;

use App\Models\iptbm\IptbmProfile;
use Carbon\Carbon;
use Livewire\Component;

class IptbmIstablished extends Component
{

    public $iptbmProfile;
    public $countPerYear;



    public function render()
    {
        $this->iptbmProfile = IptbmProfile::orderBy('year_established')->get();
        $this->countPerYear = [
            [
                'year' => '',
                'total' => 0
            ]
        ];
        for ($year = 2017; $year <= Carbon::now()->year; $year++) {
            $this->countPerYear[] = [
                'year' => $year,
                'total' => IptbmProfile::where('year_established', $year)->count()
            ];
        }
        return view('livewire.iptbm.dashboard.iptbm-istablished');
    }
}
