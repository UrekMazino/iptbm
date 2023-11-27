<?php

namespace App\Http\Livewire\Abh\Profile;

use Carbon\Carbon;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class ProjectDetail extends Component
{
    public $project;
    public $leader;

    public $changeDate;


    public function saveChangeDate(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $this->validateOnly('changeDate');
        $date=Carbon::createFromFormat('F-d-Y', $this->changeDate);

        $this->project->change_in_implementation=$date->format('Y-n-j');
        $this->project->save();

        return redirect(route("abh.staff.profile.project",['project'=>$this->project]));
    }


   public function saveLeader(): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
   {
       $this->validateOnly('leader');
       $this->project->project_leader=$this->leader;
       $this->project->save();
       return redirect(route("abh.staff.profile.project",['project'=>$this->project]));
   }
    public function rules()
    {
        return[
            'leader' =>'required:max:60',
            'changeDate'=>'required'
        ];
    }
    public function mount($project)
    {
        $this->project=$project;
        $this->leader=$project->project_leader;

    }
    public function render()
    {
        return view('livewire.abh.profile.project-detail');
    }
}
