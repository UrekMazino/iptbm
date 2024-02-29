<?php

namespace App\Http\Livewire\Abh\Admin\Pages\TechComponents;


use App\View\Components\abh\admin\AbhAdminApp;
use Livewire\Component;

class AbhTechCategoriesPage extends Component
{
    public $industry;
    public function mount( $industry)
    {
        $this->industry=$industry->load([
            'categories'=>function ($category) {
                $category->orderBy('name');
            }
        ]);
    }
    public function render()
    {
        return view('livewire.abh.admin.pages.tech-components.abh-tech-categories-page')
            ->layout(AbhAdminApp::class);
    }
}
