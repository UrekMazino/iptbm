@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: IP-Application"}}
@endsection

@section('content')
    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="block md:flex justify-end items-center">
                    <div id="searchPan"
                         class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                        <div id="botNav">

                        </div>
                    </div>


                </div>

            </nav>

        </nav>
        <div class="px-4 w-full mt-10">
            <x-header-label>
                IP-Application {{$ip_name}}
            </x-header-label>
            <x-card>
                <div class="relative overflow-x-auto ">
                    <table id="patentTable" style="width:100%"
                           class="w-fit display cell-border stripe table-auto  hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                        <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="border-0 ">
                            <th scope="col"
                                class=" whitespace-nowrap px-10 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Date of filling
                            </th>

                            <th scope="col"
                                class="  px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Application Number
                            </th>
                            <th scope="col"
                                class=" task  px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Application Task
                            </th>
                            <th scope="col"
                                class="  px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Technology Title
                            </th>
                            <th scope="col"
                                class="  px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Protection Status
                            </th>
                            <th scope="col"
                                class=" abstract px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Abstract
                            </th>
                            <th scope="col"
                                class=" expenses px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Expenses
                            </th>
                            <th scope="col"
                                class=" agent px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Agent
                            </th>
                            <th scope="col"
                                class=" action px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                        <tr class="border-0 filters">
                            <th scope="col"
                                class="fil border border-gray-300 dark:border-gray-600   bg-gray-50 dark:bg-gray-700 ">

                            </th>

                            <th scope="col"
                                class="fil  border border-gray-300 dark:border-gray-600   bg-gray-50 dark:bg-gray-700 ">

                            </th>
                            <th scope="col"
                                class="fil border border-gray-300 dark:border-gray-600   bg-gray-50 dark:bg-gray-700 ">

                            </th>
                            <th scope="col"
                                class=" fil border border-gray-300 dark:border-gray-600   bg-gray-50 dark:bg-gray-700 ">

                            </th>
                            <th scope="col"
                                class="fil  border border-gray-300 dark:border-gray-600   bg-gray-50 dark:bg-gray-700 ">

                            </th>
                            <th scope="col"
                                class="fil  border border-gray-300 dark:border-gray-600   bg-gray-50 dark:bg-gray-700 ">

                            </th>
                            <th scope="col"
                                class=" fil border border-gray-300 dark:border-gray-600   bg-gray-50 dark:bg-gray-700 ">

                            </th>
                            <th scope="col"
                                class=" fil border border-gray-300 dark:border-gray-600   bg-gray-50 dark:bg-gray-700 ">

                            </th>
                            <th scope="col"
                                class="   border border-gray-300 dark:border-gray-600   bg-gray-50 dark:bg-gray-700 ">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applications as $protection)
                            <tr>
                                <td>
                                    {{\Carbon\Carbon::make($protection->date_of_filing)->format('F-d-Y')}}
                                </td>
                                <td>
                                    {{$protection->application_number}}
                                </td>
                                <td>
                                    <div class="space-y-4">
                                        @foreach(collect($protection->ip_task->load('stage'))->groupBy('task_group_name') as $key=>$collection)
                                            <div>
                                                <x-input-label :value="$key"/>
                                                <ul class="divide-y divide-gray-400 dark:divide-gray-600">
                                                    @foreach($collection as $task)
                                                        <li class="py-2">
                                                            <div>
                                                                <a class="hover:text-sky-600 dark:hover:text-gray-100 transition duration-300"
                                                                   href="{{route("iptbm.admin.ip-application-report.task-details",['task'=>$task->id])}}">
                                                                    {{$task->stage->stage_name}}
                                                                </a>

                                                            </div>
                                                            <div class="text-xs font-medium">
                                                                Status: {{$task->task_status}}
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    {{$protection->technology->title}}
                                </td>
                                <td>
                                    @if($protection->protectionStatus)
                                        {{$protection->protectionStatus->protection_status}}
                                    @endif

                                </td>
                                <td>
                                    {{$protection->abstract}}
                                </td>
                                <td>
                                    <ul class="divide-y divide-gray-400 dark:divide-gray-600">
                                        @foreach($protection->expenses as $expense)
                                            <li class="py-2">
                                                <div>
                                                    {{$expense->description}}
                                                    <div class="mt-1">
                                                        <i class="fa-solid fa-peso-sign"></i>
                                                        {{number_format($expense->amount,2)}}
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        <li>
                                            <x-input-label value="Total"/>
                                            <div>
                                                <i class="fa-solid fa-peso-sign"></i>
                                                {{number_format($protection->expenses->sum('amount'),2)}}
                                            </div>
                                        </li>


                                    </ul>
                                </td>
                                <td>
                                    <div class="space-y-4">
                                        <ul>
                                            @foreach($protection->patent_agent as $agent)
                                                <li>
                                                    <x-input-label :value="$agent->name"/>
                                                    {{$agent->address}}
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <a href="{{route("iptbm.admin.ip-application-report.task",['task'=>$protection->ip_type->id])}}">
                                            <x-secondary-button class="text-sky-600 dark:text-sky-600">
                                                Task
                                            </x-secondary-button>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </x-card>


        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var table = $('#patentTable').DataTable({
            // stateSave: true,
            pagingType: 'full_numbers',
            horizontalScroll: true,
            dom: 'Bfrtip',
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
        table.columns(['.abstract', '.expenses', '.task', '.agent']).visible(false, false);
        $('.reset').click(function (e) {
            table.colReorder.reset();
        });


    </script>
@endsection
