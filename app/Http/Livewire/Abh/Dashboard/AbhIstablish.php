<?php

namespace App\Http\Livewire\Abh\Dashboard;

use App\Models\abh\AbhProfile;
use App\Models\iptbm\IptbmProfile;
use Carbon\Carbon;
use Livewire\Component;

class AbhIstablish extends Component
{

    public $abhProfile;
    public $countPerYear;

    public function render()
    {
        $this->abhProfile = AbhProfile::orderBy('year_established')->get();
        $this->countPerYear = [
            [
                'year' => '',
                'total' => 0
            ]
        ];
        for ($year = 2017; $year <= Carbon::now()->year; $year++) {
            $this->countPerYear[] = [
                'year' => $year,
                'total' => AbhProfile::where('year_established', $year)->count()
            ];
        }
        return view('livewire.abh.dashboard.abh-establish');
    }
}
