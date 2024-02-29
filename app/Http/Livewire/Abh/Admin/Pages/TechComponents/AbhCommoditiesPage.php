<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechComponents;


use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhCommoditiesPage extends Component
{
    public $industry;
    public function mount( $industry)
    {
        $this->industry=$industry->load([
            'commodities'=>function ($commodity) {
                $commodity->orderBy('name');
            }
        ]);
    }
    public function render()
    {
        return view('livewire.abh.admin.pages.tech-components.abh-commodities-page')
            ->layout(AbhAdminApp::class);
    }
}
