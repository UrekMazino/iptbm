<?php

namespace App\Http\Livewire\Abh\Profile;

use App\Models\abh\AbhProject;
use App\Models\abh\AbhProjectImplementation;
use Carbon\Carbon;
use Livewire\Component;

class AbhProfileProject extends Component
{


    public $profile;
    public $title;
    public $leader;
    public $approvedDate;
    public $duration;
    public $endDate;
    public $budget;

    public function saveProject()
    {

        $this->validate();
        $date=Carbon::createFromFormat('F-d-Y', $this->approvedDate);

        $project=new AbhProject([
            'project_name'=>$this->title,
            'project_leader'=>$this->leader,
            'implementation_period'=>$date->format('Y-n-d'),
        ]);

        $this->profile->projects()->save($project);

        $project->year_implemented()->save(new AbhProjectImplementation([
            'date_started'=>$date->format('Y-n-d'),
            'duration'=>$this->duration,
            'budget'=>$this->budget,
        ]));



        return redirect(route("abh.staff.profile"));

    }



    public function updatedDuration(): void
    {

        $this->validateOnly('duration');
        $date=Carbon::createFromFormat('F-d-Y', $this->approvedDate);

        if ($this->approvedDate) {
            $this->endDate= Carbon::parse($date)->addMonths($this->duration)->setDay(Carbon::parse($date)->day - 1)->format('F-d-Y');
        }

    }
    public function updatedApprovedDate(): void
    {

        $this->validateOnly('approvedDate');

        $date=Carbon::createFromFormat('F-d-Y', $this->approvedDate);
        if ($this->duration) {
            $this->endDate= Carbon::parse($date)->addMonths($this->duration)->setDay(Carbon::parse($date)->day - 1)->format('F-d-Y');
        }

    }

    public function updated($props): void
    {
        $this->validateOnly($props);
    }

    public function rules(): array
    {
        return[
            'title'=>[
                'required',
                'unique:abh_projects,project_name',
                'max:200'
            ],
            'leader'=>'required|max:100',
            'approvedDate'=>[
                'required',
            ],
            'duration'=>[
                'required',
                'integer',
                'min:1'
            ],
            'budget'=>'required|numeric|min:1|max:999999999'
        ];
    }
    protected $validationAttributes=[
        'leader'=>'Project Leader',
        'title'=>'Project Title',
        'approvedDate'=>'Approved date of implementation'
    ];
    protected $messages=[
        'budget'=>'The budget field must not be greater than 999,999,999'
    ];

    public function mount($profile)
    {
        $this->profile = $profile->load('projects.year_implemented');
    }
    public function render()
    {
        return view('livewire.abh.profile.abh-profile-project');
    }
}
