<?php

namespace App\Http\Livewire\Abh\Profile;

use App\Models\abh\AbhProjectImplementation;
use App\Rules\iptbm\DateDuration;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Number;
use Livewire\Component;

class ProjectYearDetail extends Component
{
    public $project;
    public $dateImp;
    public $duration;
    public $budget;
    public $dateDate;
    public  $startDate;
    public $endDate;


    public $extendDuration;








    public function deleteYear(AbhProjectImplementation $project): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $project->delete();
        return redirect(route("abh.staff.profile.project",['project'=>$this->project]));
    }



    public function saveForm(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $this->validateOnly('dateImp');
        $this->validateOnly('duration');
        $this->validateOnly('budget');

        $date=Carbon::createFromFormat('F-d-Y', $this->dateImp);
        $this->project->year_implemented()->save(new AbhProjectImplementation([
            'date_started'=>$date,
            'duration'=>$this->duration,
            'budget'=>$this->budget,
        ]));
        return redirect(route("abh.staff.profile.project",['project'=>$this->project]));
    }

    public function updated($props): void
    {
        $this->validateOnly($props);
    }
    public function rules(): array
    {
        return [
            'dateImp'=>[
                'required',
                new DateDuration($this->endDate->toString(), 'Invalid entry. Date mus be after ' . Carbon::parse($this->endDate->toString())->addMonths($this->dateDate->extended_duration)->format('F-d-Y'))
            ],
            'duration'=>[
                'required',
                'min:0',
                'integer',
                'max:100'
            ],
            'budget'=>[
                'required',
                'numeric',
                'min:0'
            ],

        ];
    }


    public function mount($project): void
    {
        $this->project = $project->load('year_implemented');
        $this->dateDate=$this->project->year_implemented()->latest()->first();
        $this->startDate=$this->dateDate->date_started;
        $this->endDate=Carbon::parse($this->dateDate->date_started)->addMonths($this->dateDate->duration)->subDay();
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.profile.project-year-detail');
    }
}
