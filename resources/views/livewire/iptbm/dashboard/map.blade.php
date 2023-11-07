
<div class="mt-4">
    <div class="my-4">


        <div class="w-full  flex justify-content-center items-center ">

            <div class="w-full h-full  relative">
                <x-card class="shadow-lg">
                    <div class="flex justify-between items-center">
                        <div class="justify-start gap-5 flex items-center">

                            @if($location)
                                <x-pop-modal static="true" class="max-w-lg" name="updateLoc" modal-title="Update Map Location of IP-TBM Office">
                                    <form class="space-y-4" wire:submit.prevent="updateLocation">
                                        <div class="flex justify-start items-center">
                                            <x-sub-label>
                                                Get the location using
                                            </x-sub-label>

                                            <a href="https://www.google.com/maps?authuser=0" target="_blank" class="font-medium ms-1 text-blue-600 dark:text-blue-500 hover:underline">
                                                Google map
                                            </a>
                                            <svg class="w-5 h-5 ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92.3 132.3">
                                                <path fill="#1a73e8" d="M60.2 2.2C55.8.8 51 0 46.1 0 32 0 19.3 6.4 10.8 16.5l21.8 18.3L60.2 2.2z"/>
                                                <path fill="#ea4335" d="M10.8 16.5C4.1 24.5 0 34.9 0 46.1c0 8.7 1.7 15.7 4.6 22l28-33.3-21.8-18.3z"/>
                                                <path fill="#4285f4" d="M46.2 28.5c9.8 0 17.7 7.9 17.7 17.7 0 4.3-1.6 8.3-4.2 11.4 0 0 13.9-16.6 27.5-32.7-5.6-10.8-15.3-19-27-22.7L32.6 34.8c3.3-3.8 8.1-6.3 13.6-6.3"/>
                                                <path fill="#fbbc04" d="M46.2 63.8c-9.8 0-17.7-7.9-17.7-17.7 0-4.3 1.5-8.3 4.1-11.3l-28 33.3c4.8 10.6 12.8 19.2 21 29.9l34.1-40.5c-3.3 3.9-8.1 6.3-13.5 6.3"/>
                                                <path fill="#34a853" d="M59.1 109.2c15.4-24.1 33.3-35 33.3-63 0-7.7-1.9-14.9-5.2-21.3L25.6 98c2.6 3.4 5.3 7.3 7.9 11.3 9.4 14.5 6.8 23.1 12.8 23.1s3.4-8.7 12.8-23.2"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <x-input-label  value="Enter location"/>
                                            <x-text-input required wire:model="ordinate" placeholder="longitude,latitude" class="w-full"/>
                                            <x-input-error :messages="$errors->get('ordinate')"/>
                                            <x-input-error :messages="$errors->get('long')"/>
                                            <x-input-error :messages="$errors->get('lat')"/>
                                            <x-input-error :messages="$errors->get('valArry')"/>
                                        </div>

                                        <x-submit-button>
                                            Submit
                                        </x-submit-button>
                                    </form>
                                </x-pop-modal>

                                <x-secondary-button data-modal-toggle="updateLoc" >
                                    Update IP-TBM Location
                                </x-secondary-button>
                            @else
                                <x-pop-modal static="true" class="max-w-lg" name="addLoc" modal-title="Add Map Location of IP-TBM Office">
                                    <form class="space-y-4" wire:submit.prevent="saveNewLocation">
                                        <div class="flex justify-start items-center">
                                            <x-sub-label>
                                                Get the location using
                                            </x-sub-label>

                                            <a href="https://www.google.com/maps?authuser=0" target="_blank" class="font-medium ms-1 text-blue-600 dark:text-blue-500 hover:underline">
                                                Google map
                                            </a>
                                            <svg class="w-5 h-5 ms-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92.3 132.3">
                                                <path fill="#1a73e8" d="M60.2 2.2C55.8.8 51 0 46.1 0 32 0 19.3 6.4 10.8 16.5l21.8 18.3L60.2 2.2z"/>
                                                <path fill="#ea4335" d="M10.8 16.5C4.1 24.5 0 34.9 0 46.1c0 8.7 1.7 15.7 4.6 22l28-33.3-21.8-18.3z"/>
                                                <path fill="#4285f4" d="M46.2 28.5c9.8 0 17.7 7.9 17.7 17.7 0 4.3-1.6 8.3-4.2 11.4 0 0 13.9-16.6 27.5-32.7-5.6-10.8-15.3-19-27-22.7L32.6 34.8c3.3-3.8 8.1-6.3 13.6-6.3"/>
                                                <path fill="#fbbc04" d="M46.2 63.8c-9.8 0-17.7-7.9-17.7-17.7 0-4.3 1.5-8.3 4.1-11.3l-28 33.3c4.8 10.6 12.8 19.2 21 29.9l34.1-40.5c-3.3 3.9-8.1 6.3-13.5 6.3"/>
                                                <path fill="#34a853" d="M59.1 109.2c15.4-24.1 33.3-35 33.3-63 0-7.7-1.9-14.9-5.2-21.3L25.6 98c2.6 3.4 5.3 7.3 7.9 11.3 9.4 14.5 6.8 23.1 12.8 23.1s3.4-8.7 12.8-23.2"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <x-input-label  value="Enter location"/>
                                            <x-text-input required wire:model="ordinate" placeholder="longitud,latitud" class="w-full"/>
                                            <x-input-error :messages="$errors->get('ordinate')"/>
                                            <x-input-error :messages="$errors->get('long')"/>
                                            <x-input-error :messages="$errors->get('lat')"/>
                                            <x-input-error :messages="$errors->get('valArry')"/>

                                        </div>

                                        <x-submit-button>
                                            Submit
                                        </x-submit-button>
                                    </form>
                                </x-pop-modal>

                                <x-secondary-button data-modal-toggle="addLoc">
                                    Add IP-TBM Location
                                </x-secondary-button>
                            @endif



                        </div>
                        <div>
                            <x-pop-modal modal-title="Geo location tutorial" name="helpMod" class="max-w-4xl">
                                <ul class="space-y-4">
                                    <li>
                                        <x-item-header>
                                            Step 1:
                                        </x-item-header>
                                        <p class="mb-3 text-gray-500 dark:text-gray-400">
                                            Click the
                                            <x-secondary-button readonly>
                                                Add IP-TBM Location
                                            </x-secondary-button>
                                        </p>
                                        <x-card class="shadow-lg bg-white dark:bg-gray-950">
                                            <img  class="m-auto" src="{{asset('assets/images/tutorial/Picture1.png')}}" alt="pic 1">
                                        </x-card>
                                    </li>
                                    <li>
                                        <x-item-header>
                                            Step 2:
                                        </x-item-header>
                                        <p class="mb-3 text-gray-500 dark:text-gray-400 inline-block">
                                            Using the Google map, locate the longitude and latitude coordinates

                                        </p>
                                        <x-card class="shadow-lg bg-white dark:bg-gray-950">
                                            <img class="m-auto" src="{{asset('assets/images/tutorial/Picture2.png')}}" alt="pic 1">
                                        </x-card>
                                    </li>
                                    <li>
                                        <x-item-header>
                                            Step 3:
                                        </x-item-header>
                                        <p class="mb-3 text-gray-500 dark:text-gray-400 inline-block">
                                            On the Google map Tab,
                                            right-click on the map area
                                            where in the location of IP-TBM office found.
                                            Then left-click on the ordinates to copy.
                                        </p>
                                        <x-card class="shadow-lg bg-white dark:bg-gray-950">
                                            <img class="m-auto" src="{{asset('assets/images/tutorial/Picture6.png')}}" alt="pic 1">
                                        </x-card>
                                    </li>
                                    <li>
                                        <x-item-header>
                                            Step 4:
                                        </x-item-header>
                                        <p class="mb-3 text-gray-500 dark:text-gray-400 inline-block">
                                            Paste the coordinates on the input field provided. Click <x-submit-button>Submit</x-submit-button>

                                        </p>
                                        <x-card class="shadow-lg bg-white dark:bg-gray-950">
                                            <img class="m-auto" src="{{asset('assets/images/tutorial/Picture4.png')}}" alt="pic 1">
                                        </x-card>
                                    </li>
                                    <li>
                                        <x-item-header>
                                            Step 5:
                                        </x-item-header>
                                        <p class="mb-3 text-gray-500 dark:text-gray-400 inline-block">
                                            For update of location, just repeat the process.<br>
                                            <x-item-header>
                                                Thank you.
                                            </x-item-header>
                                        </p>

                                    </li>
                                </ul>
                            </x-pop-modal>
                            <button data-modal-toggle="helpMod">
                                <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 3.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </button>
                        </div>


                    </div>
                    <div wire:ignore id="map" class="w-auto mt-2 z-30 m-auto aspect-video rounded-lg"></div>
                </x-card>
            </div>

        </div>
    </div>



</div>
@push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        document.addEventListener("livewire:load", function(event) {


            var philippinesBounds = L.latLngBounds(
                L.latLng(4.6413, 116.6895), // Southwest corner (latitude, longitude)
                L.latLng(21.9283, 126.5983) // Northeast corner (latitude, longitude)
            );

// Initialize the map with the specified bounds and zoom levels
            var map = L.map('map', {
                maxBounds: philippinesBounds, // Restrict map view to the Philippines bounds
                maxBoundsViscosity: 1.0, // Elastic edges (0.0 for rigid)
                maxZoom: 18, // Maximum zoom level
                minZoom: 6,  // Minimum zoom level
            });

// Set the initial view to the center of the Philippines
            map.setView([13.4128, 122.5650], 5);

// Create a tile layer for the map (e.g., OpenStreetMap)
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            let myIcon='';
            let  template='';
            @foreach($iptbm_location as $location)


            var latlng = [{{$location->long}},{{$location->lat}}]

             myIcon=L.divIcon({
                className:'relative w-1',
                html:`<div class="absolute -top-7 flex justify-start items-center">
        <svg class="w-7 h-7 text-blue-950" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
            <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
        </svg>
        <div class="bg-white text-sky-950 text-base  font-medium   backdrop-blur  shadow-lg shadow-black p-2 w-64 rounded-lg">
{{$location->profile->agency->name}}
        </div>
    </div>`
            })



             template=`<div class="w-80 aspect-square border p-3 rounded-lg space-y-4">
        <div class="w-full aspect-square shadow-lg mx-auto justify-center flex items-center">
            <img src="{{\Illuminate\Support\Facades\Storage::url($location->profile->logo)}}" class="w-auto h-auto ">
        </div>
        <div class="text-gray-900 mt-4">
            {{$location->profile->agency->region->name}}
        </div>
 <div class="text-gray-900 mt-4">
           {{$location->profile->office_address}}
        </div>
<div class="text-gray-900 mt-4">
            <a href="{{route("iptbm.staff.viewProfile",["id"=>$location->profile->id])}}">Go to</a
        </div>
    </div>`
            L.marker(latlng,{
                icon:myIcon
            }).addTo(map).bindPopup(template);
            @endforeach





















            @this.iptbm_location.forEach(val=>{

                var latlng = [val.long,val.lat]

                let myIcon=L.divIcon({
                    className:'relative w-1',
                    html:`<div class="absolute -top-7 flex justify-start items-center">
        <svg class="w-7 h-7 text-blue-950" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
            <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
        </svg>
        <div class="bg-white text-sky-950 text-lg  font-medium   backdrop-blur  shadow-lg shadow-black p-2 w-64 rounded-lg">
${val.profile.agency.name}
        </div>
    </div>`
                })

                let tmp=val.profile.logo.split('/');
                let photo=tmp[tmp.length-1]
                let profileId=val.profile.id;
                alert(val.profile.id)

                let template=`<div class="w-80 aspect-square border p-3 rounded-lg space-y-4">
        <div class="w-full aspect-square shadow-lg mx-auto justify-center flex items-center">
            <img src="/storage/profile/${photo}" class="w-auto h-auto ">
        </div>
        <div class="text-gray-900 mt-4">
            ${val.profile.region.name}
        </div>
 <div class="text-gray-900 mt-4">
            ${val.profile.office_address}
        </div>
<div class="text-gray-900 mt-4">
            <a href="{{route("iptbm.staff.viewProfile",["id"=>11])}}">Go to</a
        </div>
    </div>`
                L.marker(latlng,{
                    icon:myIcon
                }).addTo(map).bindPopup(template);
            })


        });
    </script>
@endpush
