<div>
    <div class="rounded-none md:rounded-lg bg-gradient-to-tr from-emerald-700 to-emerald-300 ">
        <x-pop-modal name="crypto-modal-techno" class="max-w-5xl max-h-screen" modal-title="Total IP-TBMs Technologies">
            <x-card>
                <div class="relative overflow-x-auto ">
                    <table id="TechnologyDash" style="width:100%"
                           class="w-fit display table-auto cell-border stripe table-auto  hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                        <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="border-0 ">
                            <th scope="col"
                                class="agenc w-fit whitespace-nowrap px-10 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Agency
                            </th>
                            <th scope="col"
                                class=" w-fit  px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                photo
                            </th>

                            <th scope="col"
                                class="w-full px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Title
                            </th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($technologies as $technology)
                            <tr>
                                <td class="w-fit">
                                    {{$technology->iptbmprofiles->agency->name}}
                                </td>
                                <td class="w-fit">
                                    <x-thumbnail-holder class="w-40" :url="$technology->tech_photo"/>

                                </td>
                                <td class="w-full">

                                    <a href="{{route("iptbm.staff.technology.show",['id'=>$technology])}}"
                                       class="font-medium hover:text-gray-900 hover:dark:text-white hover:underline">
                                        {{$technology->title}}
                                    </a>

                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </x-card>
        </x-pop-modal>
        <div class="p-2  grid grid-cols-4">
            <div class="col-span-3 text-gray-50">
                <h1 class="text-3xl font-bold">
                    {{$technologies->count()}}
                </h1>
                <div class=" font-medium">
                    Total number of Technologies
                </div>
            </div>
            <div class="justify-content-center flex items-center">
                <svg class="opacity-50 m-auto h-20 w-20" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" width="146.26" height="110.757"
                     viewBox="0 0 146.26 110.757">
                    <defs>
                        <clipPath id="clip-path">
                            <rect id="Rectangle_59416" data-name="Rectangle 59416" width="146.26" height="110.757"
                                  fill="none"/>
                        </clipPath>
                    </defs>
                    <g id="Technology-Icon--0oikef" transform="translate(0 0)">
                        <path id="Path_134884" data-name="Path 134884"
                              d="M59.312,32.678H86.952l.52,3.443H58.792Zm-34.277-9.69h96.19l3.886,6.65H21.153Zm48.1-4.361H14.576L0,38.025v7.093H146.26V38.025l-14.571-19.4Z"
                              transform="translate(0 65.637)"/>
                        <g id="Group_61427" data-name="Group 61427" transform="translate(0 0)">
                            <g id="Group_61426" data-name="Group 61426" clip-path="url(#clip-path)">
                                <path id="Path_134885" data-name="Path 134885"
                                      d="M120.342,79.723V2.348A2.346,2.346,0,0,0,117.994,0H5.572A2.35,2.35,0,0,0,3.22,2.348V81.723H120.342Zm-7.727-5.5H81.532V65.695a3.66,3.66,0,1,0-2.208,0v8.532H73.936V57.57l7.98-7.98h8.767a4.4,4.4,0,1,0,0-2.208H81.46a1.121,1.121,0,0,0-.783.321L72.05,56.335a1.1,1.1,0,0,0-.321.778V74.227H68.39V51.336l12.495-12.5H98.039a4.393,4.393,0,1,0,0-2.208H80.428a1.088,1.088,0,0,0-.778.326L66.5,50.1a1.1,1.1,0,0,0-.321.783V74.227h-3.04V21.357a4.4,4.4,0,1,0-2.208,0v52.87H57.9V50.879a1.106,1.106,0,0,0-.326-.783L44.432,36.955a1.106,1.106,0,0,0-.783-.326H26.038a4.4,4.4,0,1,0,0,2.208H43.192l12.5,12.5V74.227H52.349V57.113a1.084,1.084,0,0,0-.321-.778L43.4,47.7a1.121,1.121,0,0,0-.783-.321H33.394a4.4,4.4,0,1,0,0,2.208h8.767l7.98,7.98V74.227H44.753V65.695a3.66,3.66,0,1,0-2.208,0v8.532H10.956V7.469H112.615Z"
                                      transform="translate(11.347 -0.002)"/>
                                <path id="Path_134886" data-name="Path 134886"
                                      d="M11.726,12.477a4.379,4.379,0,0,0,2.226-.611l5.008,5.012a1.121,1.121,0,0,0,.783.321H32.215l2.633,2.628a4.334,4.334,0,0,0-.611,2.226,4.411,4.411,0,1,0,2.171-3.786l-2.954-2.95a1.106,1.106,0,0,0-.783-.326H20.2l-4.687-4.687a4.393,4.393,0,1,0-3.786,2.171"
                                      transform="translate(25.826 12.991)"/>
                                <path id="Path_134887" data-name="Path 134887"
                                      d="M21.621,26.45a4.386,4.386,0,0,0,3.786-6.618L28.036,17.2H40.513a1.1,1.1,0,0,0,.778-.321L46.3,11.865a4.318,4.318,0,0,0,2.221.611,4.395,4.395,0,1,0-4.393-4.393,4.318,4.318,0,0,0,.611,2.221l-4.687,4.687H27.579a1.106,1.106,0,0,0-.783.326l-2.95,2.954a4.334,4.334,0,0,0-2.226-.611,4.395,4.395,0,1,0,0,8.79"
                                      transform="translate(60.694 12.987)"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
        <div class="rounded-b-lg bg-emerald-900 bg-opacity-75 py-2 text-center">
            <button data-modal-target="crypto-modal-techno" data-modal-toggle="crypto-modal-techno"
                    class="text-center text-gray-300 font-medium text-lg hover:text-blue-400 duration-300 transition active:text-blue-600">
                View List
                <span class="fa-solid fa-circle-arrow-right"></span>
            </button>
        </div>
    </div>

</div>

@push('scripts')
    <script type="text/javascript">

        $(document).ready(function () {
            let table = $('#TechnologyDash').DataTable({
                // stateSave: true,
                pagingType: 'full_numbers',
                horizontalScroll: true,
                dom: 'Bfrtip',
                scrollY: true,
                scroller: {
                    rowHeight: 300
                },
                rowGroup: {
                    startRender: function (rows, group) {
                        return group + ' ( ' + rows.count() + ' Technologies )';
                    }
                },
                "columnDefs": [
                    {
                        'width': '10%',
                        'target': '0'
                    },
                    {
                        'width': '20%',
                        'target': '0'
                    },
                    {
                        'width': '60%',
                        'target': '0'
                    },
                ],
                buttons: [

                    {
                        extend: 'pageLength',
                        text: '<i class="fa-regular fa-file-lines"></i> Page Length',
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                    },


                    // Add more buttons here
                ],

            });
            table.columns(['.agenc']).visible(false, false);
        })
    </script>
@endpush
