<?php

namespace App\Http\Livewire\Iptbm\Dashboard;

use App\Models\iptbm\IptbmMapLocation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Map extends Component
{

    public $ordinate;
    public $lat;
    public $long;
    public $location;
    public $valArry;
    public $iptbm_location;


    public function saveNewLocation()
    {

        $this->validate();
        Auth::user()->profile->map_location()->save(new IptbmMapLocation([
            'lat'=>$this->lat,
            'long'=>$this->long
        ]));
        $this->emit('reloadPage');

    }

    public function updateLocation()
    {
        $this->validate();
        $this->location->lat=$this->lat;
        $this->location->long=$this->long;
        $this->location->save();
        $this->emit('reloadPage');
    }

    public function rules(): array
    {

        return[
            'ordinate' =>'required',
            'lat'=>'min:115.5|max:127|numeric',
            'long'=>'min:4.5|max:19|numeric',
            'valArry'=>'array'
        ];
    }
    public function updated($props)
    {
        $this->valArry=explode(',',$this->ordinate);
        if(sizeof($this->valArry)===2)
        {
            $this->long=$this->valArry[0];
            $this->lat=$this->valArry[1];
        }

        $this->validateOnly($props);
    }

    public $validationAttributes=[
        'lat' =>'Latitude point',
        'long'=>'Longitude point',
    ];
    protected $messages=[
        'valArry.array' =>'Invalid pair of coordinates.'
    ];


    public function mount(): void
    {

        $this->iptbm_location=IptbmMapLocation::with('profile','profile.agency.region')->get();
        $this->location=IptbmMapLocation::where('iptbm_profiles_id',Auth::user()->profile->id)->first();

    }
    public function render()
    {
        return view('livewire.iptbm.dashboard.map');
    }
}
