<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use App\Models\iptbm\IptbmProject;
use App\Models\iptbm\IptbmProjectYearBudget;
use App\Rules\iptbm\DateDuration;
use Carbon\Carbon;
use Livewire\Component;

class Projects extends Component
{

    public $recentDeletedProjects;
    public $profile;



    public $projectName;
    public $projectLeader;
    public $implementationStart;
    public $implementationEnd;
    public $duration;
    public $projectEndDate;
    public $year1Budget;

    public $showProjectForm=false;




    public function rules()
    {
        return [
            'projectName'=>'required|unique:iptbm_projects,project_name|min:5',
            'projectLeader'=>'required|min:5',
            'implementationStart'=>'required|date_format:F-d-Y',
            //'implementationEnd'=>'required|after:implementationStart',
              //  new DateDuration($this->implementationStart,'Invalid time duration'),
            'year1Budget'=>'required|numeric|min:0',
        ];
    }

    public function updatedImplementationStart()
    {

        $this->validateOnly('implementationStart');

        $date=Carbon::createFromFormat('F-d-Y',$this->implementationStart);
        if($this->duration)
        {
            $this->implementationEnd=Carbon::parse($date)->addMonths($this->duration)->setDay(Carbon::parse($date)->day-1)->format('F-d-Y');
        }

    }

    public function updatedDuration()
    {
        $this->validateOnly('duration');

        $date=Carbon::createFromFormat('F-d-Y',$this->implementationStart);
        if($this->duration)
        {
            $this->implementationEnd=Carbon::parse($date)->addMonths($this->duration)->setDay(Carbon::parse($date)->day-1)->format('F-d-Y');
        }
    }

    public function updatedImplementationEnd()
    {

        $this->validateOnly('implementationStart');
        $this->validateOnly('implementationEnd');
    }
    protected $validationAttributes =[
        'projectName'=>'Project Name',
        'projectLeader'=>'Project Leader',
        'implementationStart'=>'Approved Implementation date',
        'implementationEnd'=>'End of project',
        'year1Budget'=>'Year 1 Budget',
       // 'year2Budget'=>'Year 2 Budget',
    ];

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    public function showProjectForm()
    {
        $this->reset('projectName');
        $this->showProjectForm=!$this->showProjectForm;
    }




    public function saveProject()
    {

        $this->validate();
        $fromDate=Carbon::createFromFormat('F-d-Y',$this->implementationStart);
        $toDate=Carbon::createFromFormat('F-d-Y',$this->implementationEnd);
        $project=new IptbmProject([
            'project_name'=>$this->projectName,
            'project_leader'=>$this->projectLeader,
            'implementation_period'=>$fromDate->format('Y-n-j')
        ]);


        $this->profile->projects()->save($project);




        $project->projectDetails()->save(new IptbmProjectYearBudget([
            'date_implemented_start' =>$fromDate->format('Y-n-j'),
            'date_implemented_end' => $toDate->format('Y-n-j'),
            'year_budget'=>$this->year1Budget,
        ]));
        return redirect()->route("iptbm.staff.ipProfile");

    }



    public function mount($profile)
    {

        $this->profile=$profile;
        $this->recentDeletedProjects=IptbmProject::where('ip_profile_id',$profile->id)->onlyTrashed()->get();

    }
    public function render()
    {
        return view('livewire.iptbm.staff.profile.projects');
    }
}
