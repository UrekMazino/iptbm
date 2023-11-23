<?php

namespace App\Http\Livewire\Iptbm\Admin\TechComponent;

use App\Models\iptbm\IptbmTechCategory;
use Livewire\Component;

class AddCategory extends Component
{
    public $industry;
    public $categoryModel;

    public function saveForm(): void
    {
        $this->validate();
        $this->industry->techcategory()->save(new IptbmTechCategory([
            'name' => $this->categoryModel
        ]));
        $this->emit('reloadPage');

    }

    public function rules()
    {
        return [
            'categoryModel' => 'required|unique:iptbm_tech_categories,name'
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($industry)
    {
        $this->industry = $industry;
    }

    public function render()
    {
        return view('livewire.iptbm.admin.tech-component.add-category');
    }
}
