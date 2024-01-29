<?php

namespace App\Http\Livewire\Abh\Pages\Profile;

use App\Models\abh\AbhProject;
use App\View\Components\abh\AbhLayout;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class ProjectPage extends Component
{
    use AuthorizesRequests;
    public $project;

    public function delete_project(): Application|Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $this->project->delete();
        return redirect(route('abh.staff.profile'));
    }
    public function mount(AbhProject $project): void
    {
        $this->authorize('view',$project);
        $this->project=$project;
    }
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.abh.pages.profile.project-page')
            ->with(['project' => $this->project])
            ->layout(AbhLayout::class);
    }
}
