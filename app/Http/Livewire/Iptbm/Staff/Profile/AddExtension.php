<?php

namespace App\Http\Livewire\Iptbm\Staff\Profile;

use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class AddExtension extends Component
{

    public $projectYear;
    public $extensionDuration;
    public $extendedEndDate;


    public function updatedExtensionDuration(): void
    {
        $this->validateOnly('extensionDuration');
        $date = Carbon::parse($this->projectYear->date_implemented_end)->addMonths($this->extensionDuration)->subDay();

        $this->extendedEndDate = $date->format('F-d-Y');
    }

    public function saveExtension()
    {
        $this->validateOnly('extensionDuration');
        $this->projectYear->extended_duration = $this->extensionDuration;
        $this->projectYear->save();
        $this->emit('reloadPage');
    }

    public function rules(): array
    {
        return [
            'extensionDuration' => 'required|integer|min:1'
        ];
    }

    public function mount($projectYear): void
    {
        $this->projectYear = $projectYear;
    }

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.iptbm.staff.profile.add-extension');
    }
}
