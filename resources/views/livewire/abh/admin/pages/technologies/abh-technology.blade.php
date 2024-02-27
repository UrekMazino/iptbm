<div class="w-full">
    <nav wire:ignore
         class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-between items-center">
                <div class="ps-4 py-3">
                    <x-link-button :url="route('abh.admin.all_accounts')">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                        </svg>
                        Back to Technologies
                    </x-link-button>
                </div>
                <div id="searchPan"
                     class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                    <div id="botNav">

                    </div>
                </div>
            </div>
        </nav>
    </nav>
    <div class=" md:px-4">
        <x-header-label class="mt-16 mb-2">
           Technologies under IP Application
        </x-header-label>
        <x-card-panel class="relative overflow-x-auto w-full" wire:ignore>
            <table id="regTable"
                   class="w-fit display cell-border stripe table-auto  hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col"
                        class=" db_id px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        ID
                    </th>
                    <th scope="col"
                        class=" px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        IP Application
                    </th>
                    <th scope="col"
                        class=" px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        IP Number
                    </th>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Title
                    </th>
                    <th scope="col"
                        class="px-6 region py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Region
                    </th>
                    <th scope="col"
                        class="px-6 owner py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Owner
                    </th>

                    <th scope="col"
                        class="date_isert px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Date inserted
                    </th>
                    <th scope="col"
                        class="px-6 action w-24 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Actions
                    </th>
                </tr>
                <tr class="border-0 filters">
                    <th scope="col"
                        class="px-6 fil  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    </th>
                    <th scope="col"
                        class="px-6 fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    </th>
                    <th scope="col"
                        class="px-6 fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    </th>
                    <th scope="col"
                        class="px-6 fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    </th>
                    <th scope="col"
                        class="px-6 fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    </th>
                    <th scope="col"
                        class="px-6 fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    </th>
                    <th scope="col"
                        class="px-6 fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    </th>
                    <th scope="col"
                        class="px-6 action  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    </th>
                </tr>
                </thead>
                <tbody  >
                @foreach($ipApplications as $protection)
                    <tr>
                        <td>
                            {{$protection->technology->id}}
                        </td>
                        <td>
                            {{$protection->ip_type->name}}
                        </td>
                        <td>
                            {{$protection->application_number}}
                        </td>
                        <td>
                            {{$protection->technology->title}}
                        </td>
                        <td>
                            {{$protection->technology->iptbmprofiles->agency->region->name}}
                        </td>
                        <td>
                            {{$protection->technology->iptbmprofiles->agency->name}}
                        </td>
                        <td>
                            {{$protection->created_at->format('F-d-Y')}}
                        </td>
                        <td>
                            <x-link-button class="text-sky-500 dark:text-sky-500" :url="route('abh.admin.technology.details',['ipprotec'=>$protection])">
                                Details
                            </x-link-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-card-panel>
    </div>
</div>
@section('script')
    <script>

        $(document).ready(function(){
            var table = $('#regTable').DataTable({
                //  stateSave: true,
                pagingType: 'full_numbers',
               // colReorder: true,
                horizontalScroll: true,
                dom: 'Bfrtip',
                autoWidth: false,
                orderCellsTop: true,
                initComplete: function () {
                    var api = this.api();


                    api
                        .columns()
                        .eq(0)
                        .each(function (colIdx) {
                            var cell = $('.fil').eq($(api.column(colIdx).header()).index());
                            $(cell).html('<input  type="text" class="font-normal text-base border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full" placeholder="filter" />');
                            $('input',
                                $('.filters th').eq($(api.column(colIdx).header()).index())
                            )
                                .off('keyup change')
                                .on('keyup change', function (e) {
                                    console.log('askjdas');
                                    e.stopPropagation();
                                    $(this).attr('title', $(this).val());
                                    var regexr = '({search})'; //$(this).parents('th').find('select').val();


                                    var cursorPosition = this.selectionStart;
                                    api.column(colIdx).search(
                                        this.value !== ''
                                            ? regexr.replace('{search}', '(((' + this.value + ')))')
                                            : '',
                                        this.value !== '',
                                        this.value === ''
                                    )
                                        .draw();

                                    $(this)
                                        .focus()[0]
                                        .setSelectionRange(cursorPosition, cursorPosition);
                                });
                        });
                },
                buttons: [

                    {
                        extend: 'pageLength',
                        text: '<i class="fa-regular fa-file-lines"></i> Page Length',
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                    },
                    {
                        extend: 'columnToggle',
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                        columns: '.action',
                        text: 'Action'

                    },
                    {
                        extend: 'colvis',
                        text: '<i class="fa-solid fa-table-columns"></i> Visible Column',
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                    },
                    {
                        extend: 'collection',
                        text: '<span class="fa-solid fa-download"></span> Export',
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                        buttons: [
                            {
                                extend: 'excelHtml5',
                                text: 'Excel',
                                className: 'w-5',
                                messageTop: 'IP-TBM Profiles',
                                //    messageTop: 'PDF created by Buttons for DataTables.',
                                exportOptions: {
                                    columns: ':visible' // Export only visible columns
                                }
                            },
                            {
                                extend: 'collection',
                                text: 'PDF',
                                className: 'w-5',
                                buttons: [
                                    {
                                        extend: 'pdfHtml5',
                                        text: 'Landscape',
                                        //   messageTop: 'PDF created by Buttons for DataTables.',
                                        exportOptions: {
                                            width: 'auto',
                                            columns: ':visible' // Export only visible columns
                                        },
                                        orientation: 'landscape',
                                        pageSize: 'LEGAL',
                                        messageTop: 'IP-TBM Profiles',
                                    },
                                    {
                                        extend: 'pdfHtml5',
                                        text: 'Portrait',
                                        //   messageTop: 'PDF created by Buttons for DataTables.',
                                        exportOptions: {
                                            width: 'auto',
                                            columns: ':visible' // Export only visible columns
                                        },
                                        orientation: 'portrait',
                                        pageSize: 'LEGAL',
                                        messageTop: 'IP-TBM Profiles',
                                    },
                                ]
                            },


                            {
                                extend: 'print',
                                text: 'Print',
                                messageTop: 'IP-TBM Profiles',
                                exportOptions: {
                                    stripHtml: false,
                                    columns: ':visible',// Export only visible columns,

                                },

                            },
                        ]
                    },


                    // Add more buttons here
                ],

            });

            $.fn.dataTable.Buttons(table);
            $('.dataTables_filter input')
                .addClass("font-normal text-base border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-950 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm ")
                .appendTo('#searchPan').attr({placeHolder: 'Search'});
            $('.dataTables_filter').addClass('hidden')
            table.buttons().container().appendTo('#botNav');
            table.columns(['.db_id','.date_isert','.region','.owner']).visible(false, false);
            $('.reset').click(function (e) {
                table.colReorder.reset();
            });
        })
    </script>
@endsection
