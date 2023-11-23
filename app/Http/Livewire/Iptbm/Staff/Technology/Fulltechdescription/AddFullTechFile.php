<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology\Fulltechdescription;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddFullTechFile extends Component
{
    use WithFileUploads;

    public $title;
    public $model;
    public $data;
    public $univKey;
    public $fullTechDescription;

    public function rules()
    {
        return [
            'model' => [
                'required',
                'mimes:pdf'
            ]
        ];
    }

    public function saveForm($data)
    {

        $this->validate();
        if ($this->fullTechDescription[$data]) {
            if (Storage::exists($this->fullTechDescription[$data])) {
                Storage::delete($this->fullTechDescription[$data]);
            }
        }


        $path = $this->model->store('public/tech-attachments');
        $this->fullTechDescription[$data] = $path;
        $this->fullTechDescription->save();
        $this->emit('reloadPage');

    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($title, $data, $fullTechDescription, $univKey)
    {
        $this->title = $title;
        $this->fullTechDescription = $fullTechDescription;
        $this->data = $data;
        $this->univKey = $univKey;

    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.fulltechdescription.add-full-tech-file');
    }
}
