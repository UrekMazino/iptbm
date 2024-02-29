<?php

namespace App\Http\Livewire\Abh\Admin\Component\Dashboard;

use App\Models\abh\AbhProfile;
use Carbon\Carbon;
use Livewire\Component;

class AbhAdminLineGraph extends Component
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
        return view('livewire.abh.admin.component.dashboard.abh-admin-line-graph');
    }
}
