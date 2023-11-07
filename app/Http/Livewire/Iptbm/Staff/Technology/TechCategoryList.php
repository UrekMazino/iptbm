<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmTechnologyCategory;
use Livewire\Component;

class TechCategoryList extends Component
{
    public $category;

    public function deleteCategory($id)
    {
        $category=IptbmTechnologyCategory::find($id);
        $category->delete();
        $this->emit('updateParentCategory');

    }
    public function mount($category)
    {
        $this->category=$category;
    }
    public function render()
    {
        return view('livewire.iptbm.staff.technology.tech-category-list');
    }
}
