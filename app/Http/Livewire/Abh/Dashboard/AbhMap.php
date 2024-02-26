<?php

namespace App\Http\Livewire\Abh\Dashboard;

use App\Models\abh\AbhMapLocation;
use App\Models\iptbm\IptbmMapLocation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AbhMap extends Component
{

    public $ordinate;
    public $lat;
    public $long;
    public $location;
    public $valArry;
    public $iptbm_location;
    public $validationAttributes = [
        'lat' => 'Latitude point',
        'long' => 'Longitude point',
    ];
    protected $messages = [
        'valArry.array' => 'Invalid pair of coordinates.'
    ];

    public function saveNewLocation()
    {

        $this->validate();
        Auth::user()->abh_profile->map_location()->save(new AbhMapLocation([
            'lat' => $this->lat,
            'long' => $this->long
        ]));
        $this->emit('reloadPage');

    }

    public function updateLocation()
    {
        $this->validate();
        $this->location->lat = $this->lat;
        $this->location->long = $this->long;
        $this->location->save();
        $this->emit('reloadPage');
    }

    public function rules(): array
    {

        return [
            'ordinate' => 'required',
            'lat' => 'min:115.5|max:127|numeric',
            'long' => 'min:4.5|max:19|numeric',
            'valArry' => 'array'
        ];
    }

    public function updated($props)
    {
        $this->valArry = explode(',', $this->ordinate);
        if (sizeof($this->valArry) === 2) {
            $this->long = $this->valArry[0];
            $this->lat = $this->valArry[1];
        }

        $this->validateOnly($props);
    }

    public function mount(): void
    {

        $this->iptbm_location = AbhMapLocation::with('abh_profile', 'abh_profile.agency.region')->get();
        $this->location = AbhMapLocation::where('abh_profiles_id', Auth::user()->abh_profile->id)->first();

    }
    public function render()
    {
        return view('livewire.abh.dashboard.abh-map');
    }
}
