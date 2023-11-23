<?php

namespace App\Http\Livewire\Iptbm\Staff\Precom;

use App\Models\iptbm\IptbmCommercializationPrecom;
use App\Models\iptbm\IptbmPrecomTechVideo;
use App\Models\iptbm\IptbmTechnologyProfile;
use App\Rules\iptbm\ValueExistsInTable;
use Livewire\Component;

class AddTechPreCom extends Component
{
    public $technologies;

    public $techModel;

    public $techId;
    public $techNewName;
    protected $messages = [
        'techId.unique' => 'Technology duplication found. Please provide a unique Technology name to prevent duplication.',
    ];
    protected $validationAttributes = [
        'techId' => 'Technology'
    ];

    public function rules(): array
    {


        $tech = IptbmTechnologyProfile::where('title', $this->techModel)->first();
        if ($tech) {

            $this->techId = $tech->id;
        }

        return [
            'techModel' => [
                'required',
                'exists:iptbm_technology_profiles,title'
            ],
            'techId' => [
                'required',

            ],
            'techNewName' => [
                'nullable',
                'min:10',
            ]
        ];
    }

    public function savePrecomTech()
    {

        $this->validate([
            'techModel' => [
                'required',
                'exists:iptbm_technology_profiles,title'
            ],
            'techId' => [
                new ValueExistsInTable([
                    'iptbm_extension_pathways' => 'technology_id',
                    'iptbm_deployment_pathways' => 'technology_id',
                    //  'iptbm_commercialization_adopters'=>'technology_id',
                    //'iptbm_ip_alerts'=>'technology_id',
                ], 'Technology', "Unable to add technologies that are already in deployment and extension pathways.")
            ]
        ]);
        if (!$this->techNewName) {
            $this->validate([
                'techId' => 'unique:iptbm_commercialization_precoms,technology_id'
            ]);
        }

        $precom = IptbmCommercializationPrecom::create([
            'technology_id' => $this->techId,
            'pre_com_tech_name' => $this->techNewName
        ]);
        $precom->video()->save(new IptbmPrecomTechVideo([]));

        $this->emit('reloadPage');
    }

    public function updated($props)
    {
        $this->validateOnly($props);
    }

    public function render()
    {
        return view('livewire.iptbm.staff.precom.add-tech-pre-com');
    }
}
