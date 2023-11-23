<?php

namespace App\Http\Livewire\Iptbm\Admin\TechComponent;

use App\Models\iptbm\IptbmTechCommodity;
use Livewire\Component;

class TechCategoryButtons extends Component
{

    public $category;
    public $categoryModel;


    public function saveEditForm()
    {
        $this->validate();
        $this->category->name = $this->categoryModel;
        $this->category->save();
        $this->emit('reloadPage');
    }

    public function saveForm()
    {
        $this->validate();
        $this->category->load('industry');
        $industry = $this->category->industry;
        $industry->techcategory()->save(new IptbmTechCommodity([

        ]));
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'categoryModel' => 'required|unique:iptbm_commodities,name'
        ];
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function delete(): void
    {
        $this->category->delete();
        $this->emit('reloadPage');
    }

    public function mount($category)
    {

        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.iptbm.admin.tech-component.tech-category-buttons');
    }
}
