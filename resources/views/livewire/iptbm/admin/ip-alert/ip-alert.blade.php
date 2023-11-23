<div class=" w-full">
    <livewire:iptbm.admin.component.ip-alert-nav/>
    <div class="px-4 text-gray-600 dark:text-gray-400">
        <div class="text-3xl mt-4 font-medium ">
            IP Applications
            <span class="text-xl">
                (Patent)
            </span>
        </div>
        <div class="w-full mt-4">
            <div class="relative overflow-x-auto bg-gray-50 dark:bg-gray-700 p-2 rounded-lg">
                <table id="iptbmIpAlertTable"
                       class="w-full rounded-lg p-4 border-l border-r border-t border-b border-gray-400 dark:border-gray-600 text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            IP Types
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date of Filing
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Application Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Technology
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ipAlert as $alert)

                        <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-gray-50">
                                {{$alert->ip_type->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$alert->date_of_filing}}
                            </td>
                            <td class="px-6 py-4">
                                {{$alert->application_number}}
                            </td>
                            <td class="px-6 py-4">
                                {{$alert->technology->title}}
                            </td>
                            <td class="px-6 py-4">
                                {{$alert->protectionStatus? $alert->protectionStatus->protection_status:"No data available"}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="">
                                    <svg class="w-6 h-6 text-gray-700 dark:text-gray-50" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                        <path
                                            d="M4.09 7.586A1 1 0 0 1 5 7h13V6a2 2 0 0 0-2-2h-4.557L9.043.8a2.009 2.009 0 0 0-1.6-.8H2a2 2 0 0 0-2 2v14c.001.154.02.308.058.457L4.09 7.586Z"/>
                                        <path
                                            d="M6.05 9 2 17.952c.14.031.281.047.424.048h12.95a.992.992 0 0 0 .909-.594L20 9H6.05Z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>

@push('scripts')
    <script type="text/javascript">

        var table = $('#iptbmIpAlertTable').DataTable({
            rowCallback: function (row, data) {
                $(row).addClass('bg-gray-800 border-b text-base dark:bg-gray-800 dark:border-gray-700 transition duration:300 dark:hover:text-gray-50 hover:bg-gray-200 dark:hover:bg-gray-600');
            },
            stateSave: true,
            pagingType: 'full_numbers',
            horizontalScroll: true,
            dom: 'Bfrtip',
            buttons: [

                {
                    extend: 'pageLength',
                    text: 'pageLength',
                    className: 'bg-gray-200 dark:bg-gray-700 text-blue-500 dark:text-gray-300 dark:hover:bg-gray-800'
                },
                {
                    extend: 'colvis',
                    text: 'Visible Column',
                    className: 'bg-gray-200 dark:bg-gray-700 text-blue-500 dark:text-gray-300 dark:hover:bg-gray-800'
                },
                {
                    extend: 'excel',
                    text: 'excel',
                    className: 'bg-gray-200 dark:bg-gray-700 text-blue-500 dark:text-gray-300 dark:hover:bg-gray-800'
                },

                {
                    extend: 'pdf',
                    text: 'pdf',
                    className: 'bg-gray-200 dark:bg-gray-700 text-blue-500 dark:text-gray-300 dark:hover:bg-gray-800'
                },
                {
                    text: '<span class="fa-solid fa-plus-square me-2"></span> new Record',
                    className: 'bg-gray-200 dark:bg-gray-700 text-blue-500 dark:text-gray-300 dark:hover:bg-gray-800',
                    action: function (e, dt, node, config) {
                        modal.toggle();
                    }
                }

                // Add more buttons here
            ],

        });
    </script>
@endpush

