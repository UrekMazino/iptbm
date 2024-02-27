<div>
    <nav
        class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="flex justify-end items-center">
                <div id="searchPan"
                     class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                    <div id="botNav">

                    </div>
                </div>

            </div>

        </nav>

    </nav>

    <div class="px-4 w-full mt-5">
        <x-header-label>
            IP-TBM's Project
        </x-header-label>
        <div
            class="relative overflow-x-auto  shadow-lg w-full p-4 bg-white dark:bg-gray-800 mt-2 rounded-lg text-gray-600 dark:text-white">
            <table id="projectTable"
                   class="w-fit display cell-border stripe table-auto md:table-fixed hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="border-0">
                    <th scope="col"
                        class=" px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Agency
                    </th>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Project Title
                    </th>


                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Project Leader
                    </th>
                    <th scope="col"
                        class="empldate px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Approve Implementation date
                    </th>

                    <th scope="col"
                        class="budget px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Budget per year
                    </th>
                    <th scope="col"
                        class=" projects px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Total Budget
                    </th>

                    <th scope="col"
                        class="action w-24 px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Actions
                    </th>
                </tr>
                <tr class="border-0 filters">
                    <th scope="col"
                        class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Agency
                    </th>

                    <th scope="col"
                        class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Project Title
                    </th>

                    <th scope="col"
                        class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Project Leader
                    </th>
                    <th scope="col"
                        class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Approve Implementation date
                    </th>
                    <th scope="col"
                        class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Budget per year
                    </th>
                    <th scope="col"
                        class="fil  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Total Budget
                    </th>

                    <th scope="col"
                        class="action px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>
                            {{$project->abh_profile->agency->name}}
                        </td>
                        <td>
                            {{$project->project_name}}
                        </td>
                        <td>
                            {{$project->project_leader}}
                        </td>
                        <td>
                            {{\Carbon\Carbon::parse($project->implementation_period)->format('F-d-Y')}}
                        </td>
                        <td>
                           <ul class="list-disc list-inside ">
                               @foreach($project->year_implemented as $key=>$yearly)
                                   <li class="ps-5">
                                       Year {{$key+1}}

                                       <div class="flex gap-2">
                                           <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z"/>
                                           </svg>
                                           {{number_format($yearly->budget,2)}}
                                       </div>
                                   </li>
                               @endforeach
                           </ul>
                        </td>
                        <td>
                            <div class="flex gap-2">
                                <svg class="w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C46.3 32 32 46.3 32 64v64c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 32c-17.7 0-32 14.3-32 32s14.3 32 32 32l0 64v96c0 17.7 14.3 32 32 32s32-14.3 32-32V384h80c68.4 0 127.7-39 156.8-96H352c17.7 0 32-14.3 32-32s-14.3-32-32-32h-.7c.5-5.3 .7-10.6 .7-16s-.2-10.7-.7-16h.7c17.7 0 32-14.3 32-32s-14.3-32-32-32H332.8C303.7 71 244.4 32 176 32H64zm190.4 96H96V96h80c30.5 0 58.2 12.2 78.4 32zM96 192H286.9c.7 5.2 1.1 10.6 1.1 16s-.4 10.8-1.1 16H96V192zm158.4 96c-20.2 19.8-47.9 32-78.4 32H96V288H254.4z"/>
                                </svg>
                                {{number_format($project->year_implemented->sum('budget'),2)}}
                            </div>
                        </td>
                        <td>
                            <x-link-button :url="route('abh.admin.project.details',['project'=>$project->id])">
                                Details
                            </x-link-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@section('script')
    <script type="text/javascript">
        var table = $('#projectTable').DataTable({

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
                    className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0'
                },
                {
                    extend: 'columnToggle',
                    className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
                    columns: '.action',
                    text: 'Action'

                },


                {
                    extend: 'colvis',
                    text: '<i class="fa-solid fa-table-columns"></i> Visible Column',
                    className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0'
                },
                {
                    extend: 'collection',
                    text: '<span class="fa-solid fa-download"></span> Export',
                    className: 'bg-white px-10 text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
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
        table.columns(['.empldate', '.budget', '.projects']).visible(false, false);


    </script>
@endsection
