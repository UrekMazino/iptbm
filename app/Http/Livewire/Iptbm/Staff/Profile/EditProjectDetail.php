<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use App\Rules\iptbm\DateDuration;
use Carbon\Carbon;
use Livewire\Component;

class EditProjectDetail extends Component
{

    public $project;
    public $projectState;



    public $projectName;
    public $projectLeader;
    public $projectImplementation;
    public $duration;
    public $changeImp;
    public $changeStartModel;
    public $changeEndModel;
    public $showProjectLeader = false;
    public $showProjectImplementation = false;
    public $showUpdateImplementation = false;
    public $showTotalBudget = false;
      public $updateImplementation;
      public $totalBudget;
       public $year1Budget;
       public $year2Budget;
    public $showYear1Budget = false;
    public $showYear2Budget = false;
    protected $validationAttributes = [
        'projectName' => 'Project Name',
        'projectLeader' => 'Project Leader',
        'projectImplementation' => 'Approved Implementation date',
        'updateImplementation' => 'Change in Implementation Date',
        'totalBudget' => 'Total Budget',
        'year1Budget' => 'Year 1 Budget',
        'year2Budget' => 'Year 2 Budget',
        'changeStartModel' => 'Implementation Starting date',
        'changeEndModel' => 'Implementation Ends date',

    ];

    public function deleteProject()
    {
        $this->project->delete();
        return redirect()->route('iptbm.staff.ipProfile');
    }

    public function updatedChangeImp()
    {
        $date = Carbon::createFromFormat('F-d-Y', $this->changeImp);
        $this->validateOnly('changeImp');
        $this->changeEndModel = Carbon::parse($date)->addMonths($this->duration)->setDay(Carbon::parse($date)->day - 1)->format('F-d-Y');

    }


    public function saveChanges(): void
    {
        $this->validateOnly('changeImp');

        $fromDate = Carbon::createFromFormat('F-d-Y', $this->changeImp);

        $this->project->update_implementation_period=$fromDate->format('Y-n-j');
        $this->project->save();
        $details = $this->project->projectDetails()->latest()->first();

        $details->date_start = $fromDate->format('Y-n-j');
        $details->save();
        $this->emit('reloadPage');

    }

    public function showProjectLeader()
    {
        $this->showProjectLeader = !$this->showProjectLeader;
    }

    public function saveProjectLeader(): void
    {
        $this->validate([
            'projectLeader' => 'required|min:5',
        ]);
        $this->project->project_leader = $this->projectLeader;

        $this->project->save();

        $this->emit('reloadPage');
    }



    public function saveProjectImplementation(): void
    {
        $this->validate([
            'projectImplementation' => 'required|min:5',
        ]);
        $this->project->implementation_period = $this->projectImplementation;

        $this->project->save();

        session()->flash('projectImplementation', 'Save successfully...');
    }

    public function saveUpdateImplementation(): void
    {

        $this->validate([
            'updateImplementation' => 'required|min:5',
        ]);
        $this->project->update_implementation_period = $this->updateImplementation;
        $this->project->save();
        session()->flash('updateImplementation', 'Save successfully...');
    }

    public function showTotalBudget()
    {
        $this->showTotalBudget = !$this->showTotalBudget;
    }

    public function saveTotalBudget(): void
    {
        $this->validate([
            'totalBudget' => 'required|integer|min:0',
        ]);
        $this->project->total_budget = $this->totalBudget;

        $this->project->save();

        session()->flash('totalBudget', 'Save successfully...');
    }

    public function showYear1Budget(): void
    {
        $this->showYear1Budget = !$this->showYear1Budget;
    }

    public function saveYear1Budget(): void
    {
        $this->validate([
            'year1Budget' => 'required|integer|min:0',
        ]);
        $this->project->year_1_budget = $this->year1Budget;
        $this->project->save();
        session()->flash('year1Budget', 'Save successfully...');
    }

    public function showYear2Budget(): void
    {
        $this->showYear2Budget = !$this->showYear2Budget;
    }

    public function saveYear2Budget(): void
    {
        $this->validate([
            'year2Budget' => 'required|integer|min:0',
        ]);
        $this->project->year_2_budget = $this->year2Budget;

        $this->project->save();

        session()->flash('year2Budget', 'Save successfully...');
    }

    public function mount($project)
    {


        $this->project = $project;
        $this->projectLeader = $this->project->project_leader;
        $this->projectName = $this->project->project_name;
        $this->projectImplementation = $this->project->implementation_period;

        $this->projectState = ($project->projectDetails->count() > 1);


    }

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.iptbm.staff.profile.edit-project-detail');
    }

    protected function rules()
    {
        return [
            'projectName' => 'required|unique:iptbm_projects,project_name|min:5',
            'projectLeader' => 'required|min:5',
            'projectImplementation' => 'required|date',
            'updateImplementation' => 'required|date',
            'totalBudget' => 'required|integer|min:0',
            'year1Budget' => 'required|integer|min:0',
            'year2Budget' => 'required|integer|min:0',
            'changeStartModel' => 'required|before:changeEndModel|after:projectImplementation',
            'changeEndModel' => 'required|after:changeStartModel',
            'changeImp' => [
                'required',
                // 'after:projectImplementation',
                new DateDuration($this->projectImplementation, 'Change in Implementation date  must be a date after Approved Implementation date.')
            ],

        ];
    }
}
