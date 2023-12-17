<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use App\Models\iptbm\IptbmProjectYearBudget;
use App\Rules\iptbm\DateDuration;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;


class AddProjectYear extends Component
{

    public $project;
    public $startingDate;
    public $duration;
    public $budget;

    public $prevExtensionDuration;
    public $prevProjectEndDate;


    public $lastProjectYear;


    public function saveProjectYear(): void
    {
        $this->validate();

        $this->project->projectDetails()->save(new IptbmProjectYearBudget([
            'date_start' => Carbon::parse(Carbon::createFromFormat('F-d-Y', $this->startingDate))->format('Y-n-j'),
            'duration' => $this->duration,
            'year_budget' => $this->budget
        ]));
        $this->emit('reloadPage');
    }

    public function updated($props): void
    {
        $this->validateOnly($props);
    }


    public function mount($project): void
    {
        $this->project = $project;
        $this->lastProjectYear = $this->project->projectDetails()->latest()->first();
        $this->prevExtensionDuration = $this->lastProjectYear->extended_duration;
        $this->prevProjectEndDate = Carbon::parse($this->lastProjectYear->date_start)->addMonths($this->lastProjectYear->duration+($this->lastProjectYear->extended_duration)?? 0)->subDay();

    }

    public function rules(): array
    {

        return [
            'startingDate' => [
                'required',
                new DateDuration($this->prevProjectEndDate, 'Invalid entry. Date mus be after ' . $this->prevProjectEndDate->format('F-d-Y'))
            ],
            'duration' => 'required',
            'budget'=>'required|min:1|max:999999999'
        ];
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.iptbm.staff.profile.add-project-year');
    }
}
