<?php

namespace App\Http\Livewire\Iptbm\Staff\Technology\Techtrans;

use App\Models\iptbm\IptbmDeploymentPathway;
use Illuminate\Validation\Rule;
use Livewire\Component;

class DeploymentModal extends Component
{

    public $modalName;
    public $technology;
    public $techId;

    public $adoptersName;
    public $adoptersAddress;

    public function saveForm()
    {
        $this->validate();
        $deployed = new IptbmDeploymentPathway([
            'adoptor_name' => $this->adoptersName,
            'address' => $this->adoptersAddress
        ]);
        $this->technology->deployment()->save($deployed);
        redirect()->route('iptbm.staff.deployment.deployed_tech', [
            'id' => $deployed->id
        ]);
    }

    public function rules()
    {
        return [
            'adoptersName' => [
                'required',
                Rule::unique(IptbmDeploymentPathway::class, 'adoptor_name')->where('technology_id', $this->techId)
            ],
            'adoptersAddress' => 'required',
        ];
    }

    public function resetForm()
    {
        $this->resetValidation([
            'adoptersName',
            'adoptersAddress'
        ]);
        $this->reset('adoptersName', 'adoptersAddress');
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function mount($modalName, $technology)
    {
        $this->modalName = $modalName;
        $this->technology = $technology;
        $this->techId = $technology->id;
    }

    public function render()
    {
        return view('livewire.iptbm.staff.technology.techtrans.deployment-modal');
    }
}
