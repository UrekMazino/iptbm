<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology\Fulltechdescription;

use App\Models\iptbm\IptbmFullTechOtherDocs;
use Livewire\Component;
use Livewire\WithFileUploads;

class OtherDocs extends Component
{
    use WithFileUploads;

    public $fulltechdescription;
    public $fileModel;
    public $fileDescription;
    public $documents;

    public function deleteDocs(IptbmFullTechOtherDocs $docs)
    {
        $docs->delete();
        $this->emit('reloadPage');
    }

    public function saveFile()
    {
        $this->validate();
        $path = $this->fileModel->store('public/tech-other-docs');
        $this->fulltechdescription->other_documents()->save(new IptbmFullTechOtherDocs([
            'file_description' => $this->fileDescription,
            'file' => $path
        ]));
        $this->emit('reloadPage');
    }

    public function rules()
    {
        return [
            'fileModel' => 'required|max:2048',
            'fileDescription' => 'required|max:100'
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
        $this->documents = IptbmFullTechOtherDocs::latest()->where('full_descriptions_id', $this->fulltechdescription->id)->get();

        return view('livewire.iptbm.staff.technology.fulltechdescription.other-docs')->with([
            'documents' => $this->documents
        ]);
    }
}
