<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology;

use Livewire\Component;

class SoftDeleteTech extends Component
{
    public $technology;
    public function mount($technology): void
    {
        $this->technology=$technology;
    }

    public function restore_tech(): void
    {
        $this->technology->restore();
        $this->emit('reloadPage');
    }
    public function force_delete()
    {
        $this->technology->forceDelete();
        $this->emit('reloadPage');
    }
    public function render()
    {
        return view('livewire.iptbm.staff.technology.soft-delete-tech');
    }
}
