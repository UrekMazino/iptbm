<?php

namespace App\Http\Livewire\Iptbm\Staff\Precom;

use Livewire\Component;
use Storage;

class FileHolder extends Component
{
    public $file;
    public $univId;

    public function deleteFile()
    {
        $this->removeFile($this->file->file);
        $this->file->delete();
        $this->emit('reloadPage');
    }

    public function removeFile($path)
    {
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }

    public function mount($file, $univId)
    {
        $this->file = $file;
        $this->univId = $univId;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.precom.file-holder');
    }
}
