<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmIndustry;
use App\Models\iptbm\IptbmTechIndustry;
use App\Models\iptbm\IptbmTechStatus;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class TechnologyProfile extends Component
{
    use WithFileUploads;



    public $techStatus;
    public $statusModel;

    public $showIndustry = false;

    public $techIndustry;

    public $industryModel;
    public $techPhoto;
    public $tempPhoto;

    public $techTitle;
    public $description;

    public $showStatusForm = false;
    public $toggleTechPhoto = false;
    public $toggleTechTitle = false;
    public $toggleDescription = false;
    public $technology;
    public $industryList;
    protected $listeners = [
        'updateIndustry',
        'loadIndustry',
        'updateStatus'
    ];

    public function toggleShowStatusForm()
    {
        $this->showStatusForm = !$this->showStatusForm;
        $this->resetValidation(['statusModel']);
        $this->reset('statusModel');
    }

    public function saveStatusUpdate()
    {
        $this->validateOnly('statusModel');
        $this->technology->statuses()->save(new IptbmTechStatus([
            'status' => $this->statusModel
        ]));
        $this->technology->save();
        $this->technology->refresh();
        $this->techStatus = $this->technology->statuses;
        $this->reset('statusModel');
        session()->flash('statusModel', 'Technology Status updated successfully');
        $this->emit('reloadPage');
    }

    public function updateStatus()
    {
        $this->emit('reloadPage');
    }

    public function updateIndustry()
    {
        $this->technology->refresh();
    }

    public function rules()
    {
        return [
            'tempPhoto' => [
                'required',
                'image',
                'mimes:png,jpg,jpeg',
                'max:2048',
                function ($attribute, $value, $fail) {
                    $temporaryFilePath = $this->tempPhoto->getRealPath();
                    if (!getimagesize($temporaryFilePath)) {
                        $this->tempPhoto = null;
                        $fail('The file must be an image.');
                    }
                }
            ],
            'statusModel' => [
                'required',
                Rule::unique(IptbmTechStatus::class, 'status')->where('iptbm_technology_profile_id', $this->technology->id)
            ],
            'industryModel' => [
                'required',
                'exists:iptbm_industries,id',
                Rule::unique(IptbmTechIndustry::class, 'iptbm_industry_id')->where('iptbm_technology_id', $this->technology->id)
            ],
            'description' => 'required|min:10',
            'techTitle' => 'required|min:5|unique:iptbm_technology_profiles,title',
            'year_dev'=>'required|digits:4|integer|min:1900|max:'.(Carbon::now()->year+1),
        ];
    }

    public function toggleShowIndustry()
    {
        $this->showIndustry = !$this->showIndustry;
    }

    public function toggleTechPhoto()
    {
        $this->toggleTechPhoto = !$this->toggleTechPhoto;

    }

    public function toggleTechTitle()
    {
        $this->toggleTechTitle = !$this->toggleTechTitle;
        $this->techTitle = $this->technology->title;
        $this->resetValidation(['techTitle']);
    }

    public function toggleDescription()
    {
        $this->toggleDescription = !$this->toggleDescription;
        $this->description = $this->technology->tech_desc;
        $this->resetValidation(['description']);
    }

    public function saveTechPhoto()
    {
        $this->validateOnly('tempPhoto');
        $path = $this->tempPhoto->store('public/technology_profile');
        $this->technology->tech_photo = $path;
        $this->technology->save();
        $this->techPhoto = $this->technology->tech_photo;
        $this->resetValidation(['tempPhoto']);
        $this->reset('tempPhoto');
        session()->flash('tempPhoto', 'Technology Title updated successfully');
    }

    public function saveTechTitle()
    {
        $this->validateOnly('techTitle');
        $this->technology->title = $this->techTitle;
        $this->technology->save();
        $this->techTitle = $this->technology->title;
        $this->resetValidation(['techTitle']);
        session()->flash('techTitle', 'Technology Title updated successfully');
    }

    public function saveDescription()
    {
        $this->validateOnly('description');
        $this->technology->tech_desc = $this->description;
        $this->technology->save();
        $this->description = $this->technology->tech_desc;
        $this->resetValidation(['description']);
        session()->flash('description', 'Technology description updated successfully');
    }

    public function loadIndustry()
    {
        $this->technology->refresh();
        $this->industryList = $this->technology->industries;
        $this->emit('reloadPage');
    }

    public function saveIndustry()
    {
        $this->validateOnly('industryModel');
        $this->technology->industries()->save(new IptbmTechIndustry([
            'iptbm_industry_id' => $this->industryModel
        ]));
        $this->technology->save();
        $this->emit('loadIndustry');
        $this->resetValidation(['industryModel']);
        session()->flash('industryModel', 'Technology Industry updated successfully');
    }

    public function updated($properties)
    {
        $this->validateOnly($properties);
    }

    public $year_dev;
    public function updateYearDev()
    {
        $this->validateOnly('year_dev');
        $this->technology->year_developed=$this->year_dev;
        $this->technology->save();
        $this->emit('reloadPage');
    }


    public function mount($technology)
    {
        $this->technology = $technology;
        $this->industryList = $this->technology->industries;
        $this->techTitle = $technology->title;
        $this->description = $technology->tech_desc;
        $this->techPhoto = $technology->tech_photo;
        $this->techIndustry = IptbmIndustry::all();
        $this->techStatus = $this->technology->statuses;
        $this->year_dev= $this->technology->year_developed;

    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.technology-profile')->with([
            'max_year'=>Carbon::now()->year
        ]);
    }
}
