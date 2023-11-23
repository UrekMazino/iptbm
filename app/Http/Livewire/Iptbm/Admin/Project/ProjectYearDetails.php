<?php

namespace App\Http\Livewire\Iptbm\Admin\Project;

use Carbon\Carbon;
use Livewire\Component;

class ProjectYearDetails extends Component
{
    public $projectYearDetails;
    public $yearLabel;

    public function mount($yearDetails, $yearLabel)
    {
        $this->projectYearDetails = $yearDetails;
        $this->yearLabel = $yearLabel;
    }

    public function render()
    {

        $end = Carbon::parse($this->projectYearDetails->date_implemented_end);
        $start = Carbon::parse($this->projectYearDetails->date_implemented_start);
        if ($this->projectYearDetails->change_of_implementation) {
            $start = Carbon::parse($this->projectYearDetails->change_of_implementation);
        }
        $extension = 0;
        if ($this->projectYearDetails->extended_duration) {
            $extension = $this->projectYearDetails->extended_duration;
        }
        return view('livewire.iptbm.admin.project.project-year-details')->with([
            'duration' => $end->diffInMonths($start) + 1 + $extension
        ]);
    }
}
