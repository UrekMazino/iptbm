<div class="mt-4">
    <div class="my-4">


        <div class="w-full  flex justify-content-center items-center ">

            <div class="w-full h-full  relative">
                <x-card class="shadow-lg">
                    <div wire:ignore id="map" class="w-auto mt-2 z-30 m-auto aspect-video rounded-lg"></div>
                </x-card>
            </div>

        </div>
    </div>


</div>
@push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        $(document).ready(function(){

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

            let myIcon = '';
            let template = '';
            @foreach($iptbm_location as $location)


            var latlng = [{{$location->long}}, {{$location->lat}}]



            myIcon = L.divIcon({
                className: 'relative w-1',
                html: `<div class="absolute -top-7 flex justify-start items-center">
        <svg data-popover-target="openAgenName-{{$location->abh_profile->id}}" data-popover-placement="right" class="w-7 h-7 hover:scale-150 transition duration-300 text-blue-950 border-transparent outline-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
            <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
        </svg>

    <div data-popover id="openAgenName-{{$location->abh_profile->id}}" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-900 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg shadow-black dark:shadow-black opacity-70 dark:opacity-80  dark:text-gray-200 dark:border-gray-600 dark:bg-gray-800">
            <div class="p-4 font-bold">
                {{$location->abh_profile->agency->name}}
                </div>
                <div data-popper-arrow></div>
            </div>
                </div>`
            })


            template = `<div class="w-80 aspect-square border p-3 rounded-lg space-y-4">
        <div class="w-full aspect-square shadow-lg mx-auto justify-center flex items-center">
            <img src="{{\Illuminate\Support\Facades\Storage::url($location->abh_profile->logo)}}" class="w-auto h-auto ">
        </div>
        <div class="text-gray-900 mt-4">
            {{$location->abh_profile->agency->region->name}}
            </div>
     <div class="text-gray-900 mt-4">
{{$location->abh_profile->office_address}}
            </div>
    <div class="text-gray-900 mt-4">
                <a href="{{route("abh.staff.profile.public-view",["profile"=>$location->abh_profile->id])}}">Go to</a
        </div>
    </div>`
            L.marker(latlng, {
                icon: myIcon
            }).addTo(map).bindPopup(template);
            @endforeach

            @this.
            iptbm_location.forEach(val => {

                var latlng = [val.long, val.lat]

                let myIcon = L.divIcon({
                    className: 'relative w-1',
                    html: `<div class="absolute -top-7 flex justify-start items-center">
        <svg class="w-7 h-7 text-blue-950" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
            <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
        </svg>
        <div class="bg-white text-sky-950 text-lg  font-medium   backdrop-blur  shadow-lg shadow-black p-2 w-64 rounded-lg">
${val.abh_profile.agency.name}
        </div>
    </div>`
                })

                let tmp = val.abh_profile.logo.split('/');
                let photo = tmp[tmp.length - 1]
                let profileId = val.abh_profile.id;
                alert(val.abh_profile.id)

                let template = `<div class="w-80 aspect-square border p-3 rounded-lg space-y-4">
        <div class="w-full aspect-square shadow-lg mx-auto justify-center flex items-center">
            <img src="/storage/profile/${photo}" class="w-auto h-auto ">
        </div>
        <div class="text-gray-900 mt-4">
            ${val.abh_profile.region.name}
        </div>
 <div class="text-gray-900 mt-4">
            ${val.abh_profile.office_address}
        </div>
<div class="text-gray-900 mt-4">
            <a href="{{route("abh.staff.profile.public-view",["profile"=>11])}}">Go to</a
        </div>
    </div>`
                L.marker(latlng, {
                    icon: myIcon
                }).addTo(map).bindPopup(template);
            })

        })
        document.addEventListener("livewire:load", function (event) {



        });
    </script>
@endpush
