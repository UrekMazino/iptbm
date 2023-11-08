<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology\Fulltechdescription;

use App\Models\iptbm\IptbmFullTechPhoto;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class FullTechPhoto extends Component
{
    use WithFileUploads;
    public $fulltechdescription;
    public $photoModel;
    public $description;
    public $type;

    public $viewPictures=false;
    public $technology_photos;

    public function deletePhoto(IptbmFullTechPhoto $photo)
    {
        $photo->delete();
        $this->emit('reloadPage');
    }

    public function viewPictures()
    {
        $this->technology_photos=IptbmFullTechPhoto::latest()->where('iptbm_full_tech_descriptions_id',$this->fulltechdescription->id)->get();
        $this->resetView();
    }
    public function resetView()
    {
        $this->viewPictures=!$this->viewPictures;
    }

    public function saveForm()
    {
        $this->validate();
        $path=$this->photoModel->store('public/full-tech-photos');
        $this->fulltechdescription->technology_photos()->save(new IptbmFullTechPhoto([
            'file_type'=>$this->type,
            'file_description'=>$this->description,
            'file'=>$path
        ]));
        $this->emit('reloadPage');
    }

    public function updatedPhotoModel()
    {
      $this->type=$this->photoModel->extension();
    }
    public function rules()
    {
        return [
            'photoModel'=>'required|image|mimes:png,jpg,jpeg|max:2048',
            'description'=>[
                'nullable',
                'max:100',
                Rule::unique(IptbmFullTechPhoto::class,'file_description')->where('iptbm_full_tech_descriptions_id',$this->fulltechdescription->id)
            ],
            'type'=>'in:png,jpg'
        ];
    }
    public function updated($props)
    {
        $this->validateOnly($props);
    }
    public function mount($fullDescription)
    {
        $this->fulltechdescription = $fullDescription;
    }
    public function render()
    {
        $photos=IptbmFullTechPhoto::latest()->limit(3)->where('iptbm_full_tech_descriptions_id',$this->fulltechdescription->id)->get();
        return view('livewire.iptbm.staff.technology.fulltechdescription.full-tech-photo')->with([
            'photos'=>$photos
        ]);
    }
}
