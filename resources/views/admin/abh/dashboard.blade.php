<x-abh.admin.abh-admin-app>

    <div class=" md:px-4">
        <x-header-label class="mt-10">
            ABH Dashboard
        </x-header-label>
        <div class="space-y-4">
            <x-card-panel title="Established ABHs">
                <div id="line-chart"></div>
                <x-slot:footer>
                    <div class="my-4 text-sm font-medium text-gray-500">
                        The quantity of ticks (Y-axis) on the line graph adjusts according to the maximum count of
                        established IP-TBMs.
                    </div>
                </x-slot:footer>
            </x-card-panel>
            <x-card-panel title="nbvn">
                <x-slot:button>
                    <x-secondary-button>
                        Add ABH Button
                    </x-secondary-button>
                </x-slot:button>
                <div wire:ignore class="w-full  flex justify-content-center items-center my-4">
                    <div class="w-full h-full  relative">
                        <div wire:ignore id="map"
                             class="w-auto mt-2 z-30 m-auto aspect-video rounded-none md:rounded-lg"></div>
                    </div>
                </div>
            </x-card-panel>
        </div>

    </div>
    @push('scripts')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
              integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

        <script type="text/javascript">
            document.addEventListener('livewire:load', function () {
/*

                {{---

                let total =@this.
                countPerYear.map(function (d) {
                    return d.total
                })--}}

 */

                {{---------

                  let total=0;
                let max = Math.max.apply(null, total);
                let year =[2020,2021,2022,2023,2024,2025,2026];

                let year =@this.
                countPerYear.map(function (d) {
                    return d.year
                })

                let options = {
                    chart: {
                        height: "50%",
                        maxWidth: "100%",
                        type: "line",
                        fontFamily: "Inter, sans-serif",
                        dropShadow: {
                            enabled: false,
                        },
                        toolbar: {
                            show: true,
                            offsetX: 0,
                            offsetY: 0,
                        },
                        export: {
                            csv: {
                                filename: undefined,
                                columnDelimiter: ',',
                                headerCategory: 'category',
                                headerValue: 'value',
                                dateFormatter(timestamp) {
                                    return new Date(timestamp).toDateString()
                                }
                            },
                            svg: {
                                filename: undefined,
                            },
                            png: {
                                filename: undefined,
                            }


                        },
                    },
                    tooltip: {
                        enabled: true,
                        x: {
                            show: false,
                        },
                    },
                    dataLabels: {
                        enabled: true,
                        enabledOnSeries: [1]
                    },
                    stroke: {
                        width: 6,
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'dark',
                            type: "horizontal",
                            shadeIntensity: 0.5,
                            gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                            inverseColors: true,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 100],
                            colorStops: []
                        }
                    },
                    grid: {
                        show: true,
                        strokeDashArray: 6,
                        borderColor: '#58585e',

                        padding: {
                            left: 2,
                            right: 2,
                            top: -15
                        },
                    },
                    series: [
                        {
                            name: "Total of IPTBMs established  ",
                            data: total,
                            color: "#28a63b",
                        },

                    ],
                    legend: {
                        show: false
                    },
                    stroke: {
                        curve: 'straight'
                    },
                    markers: {
                        size: 5,

                    },
                    xaxis: {
                        categories: year,
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                            },
                        },
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: true,
                        },
                    },
                    yaxis: {
                        show: true,
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                            },
                            formatter: function (value) {
                                return Math.round(value); // Rounds the label value to the nearest whole number
                            }
                        },
                        type: 'category', // Specify that the X-axis type is "category"
                        min: 0,
                        max: max + 2,
                        tickAmount: max + 2, // Number of ticks on the X-axis
                        tickPlacement: 'on', // Places ticks between the bars/columns
                    },
                    subtitle: {
                        text: "Total number of established IP-TBMs annually.",
                        align: 'left',
                        margin: 10,
                        offsetX: 0,
                        offsetY: 0,
                        floating: false,
                        style: {
                            fontSize: '12px',
                            fontWeight: 'normal',
                            fontFamily: undefined,
                            color: '#9699a2'
                        },
                    }

                }
                --------}}

                {{----------
                 if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("line-chart"), options);
                    chart.render();
                }

                -------------}}
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
                {{------
                     @foreach($iptbm_location as $location)


                var latlng = [{{$location->long}}, {{$location->lat}}]

                myIcon = L.divIcon({
                    className: 'relative w-1',
                    html: `<div class="absolute -top-7 flex justify-start items-center">
        <svg class="w-7 h-7 text-blue-950" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
            <path d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
        </svg>
        <div class="bg-white text-sky-950 text-base  font-medium   backdrop-blur  shadow-lg shadow-black p-2 w-64 rounded-lg">
{{$location->profile->agency->name}}
                    </div>
                </div>`
                })


                template = `<div class="w-80 aspect-square border p-3 rounded-lg space-y-4">
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
                    <a href="{{route("iptbm.admin.iptbm_profiles.view-profile",["profile"=>$location->profile->id])}}">Go to</a
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
${val.profile.agency.name}
        </div>
    </div>`
                    })

                    let tmp = val.profile.logo.split('/');
                    let photo = tmp[tmp.length - 1]
                    let profileId = val.profile.id;
                    alert(val.profile.id)

                    let template = `<div class="w-80 aspect-square border p-3 rounded-lg space-y-4">
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
                    L.marker(latlng, {
                        icon: myIcon
                    }).addTo(map).bindPopup(template);
                })
                --------}}

            })


        </script>

    @endpush
</x-abh.admin.abh-admin-app>
