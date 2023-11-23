<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use App\Models\iptbm\IptbmProjectYearBudget;
use App\Rules\iptbm\DateDuration;
use Carbon\Carbon;
use Livewire\Component;


class AddProjectYear extends Component
{

    public $project;
    public $startingDate;
    public $duration;
    public $budget;

    public $prevExtensionDuration;
    public $prevProjectEndDate;

    public $endDate;
    public $lastProjectYear;

    public function updatedStartingDate()
    {
        $this->validateOnly('startingDate');
        if ($this->duration) {
            $this->endDate = Carbon::parse(Carbon::createFromFormat('F-d-Y', $this->startingDate))->addMonths($this->duration)->subDay();
        }
    }

    public function updatedDuration()
    {
        $this->validateOnly('duration');
        if ($this->startingDate) {
            $this->endDate = Carbon::parse(Carbon::createFromFormat('F-d-Y', $this->startingDate))->addMonths($this->duration)->subDay();
        }
    }

    public function saveProjectYear()
    {
        $this->validate();
        $proj = $this->project->projectDetails()->latest()->first();
        $proj->extendable = false;
        $proj->save();
        $this->project->projectDetails()->save(new IptbmProjectYearBudget([
            'date_implemented_start' => Carbon::parse(Carbon::createFromFormat('F-d-Y', $this->startingDate))->format('Y-n-j'),
            'date_implemented_end' => Carbon::parse($this->endDate)->format('Y-n-j'),
            'year_budget' => $this->budget
        ]));
        $this->emit('reloadPage');
    }


    public function mount($project)
    {
        $this->project = $project;
        $this->lastProjectYear = $this->project->projectDetails()->latest()->first();
        $this->prevExtensionDuration = $this->lastProjectYear->extended_duration;
        $this->prevProjectEndDate = $this->lastProjectYear->date_implemented_end;
    }

    public function rules(): array
    {

        return [
            'startingDate' => [
                'required',
                new DateDuration($this->prevProjectEndDate, 'Invalid entry. Date mus be after ' . Carbon::parse($this->prevProjectEndDate)->addMonths($this->prevExtensionDuration)->subDay()->format('F-d-Y'))
            ],
            'endDate' => 'required',
            'duration' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.iptbm.staff.profile.add-project-year');
    }
}
