<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmCommodity;
use App\Models\iptbm\IptbmTechCategory;
use App\Models\iptbm\IptbmTechCommodity;
use App\Models\iptbm\IptbmTechIndustry;
use App\Models\iptbm\IptbmTechnologyCategory;
use Livewire\Component;

class IndustryDetails extends Component
{

    public $industry;

    public $showCommodity=false;
    public $showCategory=false;
    public $showOtherCommodity=false;
    public $showOtherCategory=false;







    public $commodities;
    public $categories;

    public $techCommodity;
    public $techCategory;

    public $techCommodityList;
    public $techCategoryList;

    protected $listeners=[
        'updateParentCommodity',
        'updateParentCategory'
    ];

    public function updateParentCommodity()
    {
        $this->industry->refresh();
        $this->techCommodityList=$this->industry->commodities;
    }
    public function updateParentCategory()
    {
        $this->industry->refresh();
        $this->techCategoryList=$this->industry->categories;
    }
    public function toggleShowCommodity()
    {
        $this->showCommodity=!$this->showCommodity;
        $this->resetValidation(['techCommodity']);

    }
    public function toggleShowCategory()
    {
        $this->showCategory=!$this->showCategory;
        $this->resetValidation(['techCategory']);
    }
    public function toggleShowOtherCommodity()
    {
        $this->showOtherCommodity=!$this->showOtherCommodity;
        $this->techCommodity=null;
        $this->resetValidation(['techCommodity']);
    }
    public function toggleShowOtherCategory()
    {
        $this->showOtherCategory=!$this->showOtherCategory;
        $this->techCategory=null;
        $this->resetValidation(['techCategory']);
    }


    public function rules()
    {
        return [
            'techCommodity'=>'required|min:3|unique:iptbm_tech_commodities,commodity',
            'techCategory'=>'required|min:3|unique:iptbm_technology_categories,category'
        ];
    }
    protected $validationAttributes  = [
        'techCommodity'=>'Technology Commodity',
        'techCategory'=>'Technology Category'
    ];

    public function saveCommodity()
    {
        $this->validateOnly('techCommodity');
        $this->industry->commodities()->save(new IptbmTechCommodity([
            'commodity'=>$this->techCommodity
        ]));
        $this->industry->save();
        $this->industry->refresh();
        $this->reset( 'techCommodity');
        $this->resetValidation(['techCommodity']);
        $this->techCommodityList=$this->industry->commodities;
        session()->flash('techCommodity', 'Technology Commodity updated successfully');
    }

    public function saveCategory()
    {
        $this->validateOnly('techCategory');
        $this->industry->categories()->save(new IptbmTechnologyCategory([
            'category'=>$this->techCategory
        ]));
        $this->industry->save();
        $this->industry->refresh();
        $this->reset( 'techCategory');
        $this->resetValidation(['techCategory']);
        $this->techCategoryList=$this->industry->categories;
        session()->flash('techCategory', 'Technology Category updated successfully');
    }

    public function deleteIndustry($id)
    {
        $indus=IptbmTechIndustry::where('iptbm_industry_id',$id);
        $indus->delete();
        $this->emit('updateIndustry');
    }

    public function mount($industry)
    {
        $this->industry=IptbmTechIndustry::with('iptbmTechnologies','industry','commodities','categories')->find($industry->id);
        $this->commodities=IptbmCommodity::where('iptbm_industry_id',$industry->iptbm_industry_id)->get();
        $this->categories=IptbmTechCategory::where('iptbm_industry_id',$industry->iptbm_industry_id)->get();
        $this->techCommodityList=$this->industry->commodities;
        $this->techCategoryList=$this->industry->categories;

    }
    public function render()
    {
        return view('livewire.iptbm.staff.technology.industry-details');
    }
}
