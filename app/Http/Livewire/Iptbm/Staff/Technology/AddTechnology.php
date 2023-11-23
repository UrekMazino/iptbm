<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmFullTechDescription;
use App\Models\iptbm\IptbmIndustry;
use App\Models\iptbm\IptbmTechIndustry;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\Models\iptbm\IptbmTechStatus;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddTechnology extends Component
{
    use WithFileUploads;

    public $photo;
    public $title;
    public $description;
    public $techStatus;
    public $yearDeveloped;
    public $techIndustry;
    public $techAgency;

    public $agencies;
    public $industries;

    public $profile;


    public function rules()
    {
        return [
            'photo' => [
                'nullable',
                'image',
                'mimes:png,jpg,jpeg',
                'max:2048',
                function ($attribute, $value, $fail) {
                    if ($this->photo) {
                        $temporaryFilePath = $this->photo->getRealPath();
                        if (!getimagesize($temporaryFilePath)) {
                            $this->photo = null;
                            $fail('The file must be an image.');
                        }
                    }
                }
            ],

        ];
    }


    public function mount($profile)
    {
        $this->profile = $profile;
        $this->agencies = IptbmAgency::all();
        $this->industries = IptbmIndustry::all();

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate([
            'photo' => [
                'nullable',
                'image',
                'mimes:png,jpg,jpeg',
                'max:2048',
                function ($attribute, $value, $fail) {
                    if ($this->photo) {
                        $temporaryFilePath = $this->photo->getRealPath();
                        if (!getimagesize($temporaryFilePath)) {
                            $this->photo = null;
                            $fail('The file must be an image.');
                        }
                    }

                }
            ],
            'description' => 'required|min:10|max:1000',
            'title' => 'required|min:5|unique:iptbm_technology_profiles,title',
            'techIndustry' => 'required',
            'techAgency' => 'required|exists:iptbm_agencies,id',
            'yearDeveloped' => 'required|date_format:Y',
            'techStatus' => 'required|in:Laboratory experiment stage / Lab testing / Greenhouse testing,Pilot Testing stage,Upscaled Testing stage,Commercial scale testing stage,Technology ready for commercialization,Commercialized technology'
        ]);
        if ($this->photo) {
            $path = $this->photo->store('public/technology_profiles');
        } else {
            $path = '';
        }


        $technology = new IptbmTechnologyProfile([
            'title' => $this->title,
            'year_developed' => $this->yearDeveloped,
            'tech_desc' => $this->description,
            'tech_photo' => $path,
            'tech_owner' => $this->techIndustry,
        ]);


        $this->profile->technologies()->save($technology);
        $techIndustry = new IptbmTechIndustry([
            'iptbm_industry_id' => $this->techIndustry
        ]);

        $techStatus = new IptbmTechStatus([
            'status' => $this->techStatus
        ]);
        $technology->industries()->save($techIndustry);
        $technology->statuses()->save($techStatus);
        $technology->full_description()->save(new IptbmFullTechDescription([]));
        $this->profile->save();
        $this->reset([
            'photo',
            'description',
            'title',
            'techIndustry',
            'techAgency',
            'yearDeveloped',
            'techStatus'
        ]);
        session()->flash('techno', 'New Technology was added successfully');

        return redirect()->route('iptbm.staff.technology.show', ['id' => $technology->id]);


    }


    public function render()
    {
        return view('livewire.iptbm.staff.technology.add-technology');
    }
}
