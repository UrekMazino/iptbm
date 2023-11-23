<div class="rounded-none md:rounded-lg  bg-gradient-to-tr from-yellow-800 to-yellow-300">
    <x-pop-modal name="crypto-modal-techProtocol" class="max-w-5xl max-h-screen"
                 modal-title="Total IP-TBMs Technologies">
        <x-card>
            <div class="relative overflow-x-auto ">
                <table id="techProtocol" style="width:100%"
                       class="w-fit display table-auto cell-border stripe table-auto  hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="border-0 ">
                        <th scope="col"
                            class="region whitespace-nowrap px-10 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Region
                        </th>
                        <th scope="col"
                            class=" w-fit px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Agency
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($techProtocol as $profile)
                        <tr>
                            <td>
                                {{$profile->agency->region->name}}

                            </td>
                            <td>
                                <a href="{{route("iptbm.staff.viewProfile",['id'=>$profile])}}"
                                   class="font-medium hover:text-gray-900 hover:dark:text-white hover:underline">
                                    {{$profile->agency->name}}
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
                {{$techProtocol->count()}}
            </h1>
            <div class=" font-medium">

                Tech Transfer Protocols in place
            </div>
        </div>
        <div class="justify-content-center flex items-center">

            <svg class="opacity-50 m-auto h-20 w-20 p-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 16 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4.828 10h6.239m-6.239 4h6.239M6 1v4a1 1 0 0 1-1 1H1m14-4v16a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2Z"/>
            </svg>
        </div>
    </div>
    <div class="rounded-b-lg bg-yellow-800 bg-opacity-75 py-2 ">

        <div class="text-center w-full">
            <button data-modal-target="crypto-modal-techProtocol" data-modal-toggle="crypto-modal-techProtocol"
                    class="text-center text-gray-300 font-medium text-lg m-auto ">
                View List
                <span class="fa-solid fa-circle-arrow-right"></span>
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            let table = $('#techProtocol').DataTable({
                // stateSave: true,
                pagingType: 'full_numbers',
                horizontalScroll: true,
                dom: 'Bfrtip',

                rowGroup: {
                    startRender: function (rows, group) {
                        return group + ' ( ' + rows.count() + ' Tech transfer Protocol )';
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
            table.columns(['.region']).visible(false, false);
        })
    </script>
@endpush
