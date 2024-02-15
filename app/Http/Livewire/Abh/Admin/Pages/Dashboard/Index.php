<?php

namespace App\Http\Livewire\Abh\Admin\Pages\Dashboard;


use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class Index extends Component
{




    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('livewire.abh.admin.pages.dashboard.index')->layout(AbhAdminApp::class);
    }
}
