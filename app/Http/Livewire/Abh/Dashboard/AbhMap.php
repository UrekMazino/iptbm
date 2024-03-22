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
    /**
     * Controller for managing location-related actions.
     * - Defines validation attributes for latitude and longitude.
     * - Specifies custom error messages for validation failures.
     * - Provides methods for saving and updating locations.
     * - Implements validation rules for location data.
     * - Handles property updates and validation during user interactions.
     * - Initializes location data during component initialization.
     */

    public $validationAttributes = [
        'lat' => 'Latitude point',
        'long' => 'Longitude point',
    ];

    protected $messages = [
        'valArry.array' => 'Invalid pair of coordinates.'
    ];

    /**
     * Method for saving a new location.
     * - Validates input data.
     * - Saves the new location associated with the authenticated user's profile.
     * - Emits a 'reloadPage' event to trigger a page reload.
     *
     * @return void
     */
    public function saveNewLocation()
    {
        $this->validate();
        Auth::user()->abh_profile->map_location()->save(new AbhMapLocation([
            'lat' => $this->lat,
            'long' => $this->long
        ]));
        $this->emit('reloadPage');
    }

    /**
     * Method for updating a location.
     * - Validates input data.
     * - Updates the latitude and longitude of the specified location.
     * - Emits a 'reloadPage' event to trigger a page reload.
     *
     * @return void
     */
    public function updateLocation()
    {
        $this->validate();
        $this->location->lat = $this->lat;
        $this->location->long = $this->long;
        $this->location->save();
        $this->emit('reloadPage');
    }

    /**
     * Defines validation rules for location data.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'ordinate' => 'required',
            'lat' => 'min:115.5|max:127|numeric',
            'long' => 'min:4.5|max:19|numeric',
            'valArry' => 'array'
        ];
    }

    /**
     * Updates latitude and longitude based on ordinate input.
     * Validates properties after each update.
     *
     * @param string $props
     * @return void
     */
    public function updated($props)
    {
        $this->valArry = explode(',', $this->ordinate);
        if (sizeof($this->valArry) === 2) {
            $this->long = $this->valArry[0];
            $this->lat = $this->valArry[1];
        }

        $this->validateOnly($props);
    }

    /**
     * Initializes component data during mount.
     *
     * @return void
     */
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
