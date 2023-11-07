@extends('admin.iptbm.layout.app')
@section('title')
    {{"| admin: profile title"}}
@endsection
@section('content')
    <div class="w-full">
        <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-end items-center">
                    <div id="searchPan" class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                        <div id="botNav" >

                        </div>
                    </div>

                </div>

            </nav>

        </nav>
        <div class="px-4 w-full mt-5">
            <x-header-label>
                IP-TBM's Project
            </x-header-label>
            <div class="relative overflow-x-auto  shadow-lg w-full p-4 bg-white dark:bg-gray-800 mt-2 rounded-lg text-gray-600 dark:text-white">
                <table id="profiletable" class="w-fit display cell-border stripe table-auto md:table-fixed hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="border-0">
                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Project Title
                        </th>
                        <th scope="col" class=" px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Agency
                        </th>

                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Project Leader
                        </th>
                        <th scope="col" class="empldate px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Approve Implementation date
                        </th>

                        <th scope="col" class="budget px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Budget per year
                        </th>
                        <th scope="col" class=" projects px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Total Budget
                        </th>

                        <th scope="col" class="action px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Actions
                        </th>
                    </tr>
                    <tr class="border-0 filters">
                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Project Title
                        </th>
                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Agency
                        </th>

                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Project Leader
                        </th>
                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Approve Implementation date
                        </th>
                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Budget per year
                        </th>
                        <th scope="col" class="fil  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Total Budget
                        </th>

                        <th scope="col" class="action px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)

                        <tr>
                            <td>
                                {{$project->project_name}}
                            </td>
                            <td>
                                {{$project->profile->agency->name}}
                            </td>
                            <td>
                                {{$project->project_leader}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::make($project->implementation_period)->format('F-d-Y')}}
                            </td>
                            <td>
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600">
                                    @foreach($project->projectDetails as $key=> $detail)
                                        <li>
                                            <div>
                                               <x-input-label value=" Year {{$key+1}}"/>
                                            </div>
                                            <div class="ps-4">
                                                <span class="fa-solid fa-peso-sign"></span>
                                                {{number_format($detail->year_budget,2)}}
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <span class="fa-solid fa-peso-sign"></span>
                                {{number_format($project->projectDetails->sum('year_budget'),2)}}
                            </td>
                            <td>
                                <livewire:iptbm.admin.project.project-control :project="$project" />
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var table = $('#profiletable').DataTable({

            pagingType: 'full_numbers',
            horizontalScroll:true,
            dom: 'Bfrtip',
            autoWidth:false,
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
                    extend:'pageLength',
                    text:'<i class="fa-regular fa-file-lines"></i> Page Length',
                    className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0'
                },
                {
                    extend: 'columnToggle',
                    className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
                    columns: '.action',
                    text:'Action'

                },
                {
                    className: 'bg-white reset text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
                    text:'<i class="fa-solid fa-arrow-rotate-right"></i> Reset'

                },

                {
                    extend:'colvis',
                    text:'<i class="fa-solid fa-table-columns"></i> Visible Column',
                    className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0'
                },
                {
                    extend: 'collection',
                    text: '<span class="fa-solid fa-download"></span> Export',
                    className: 'bg-white px-10 text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
                    buttons:[
                        {
                            extend:'excelHtml5',
                            text:'Excel',
                            className:'w-5',
                            messageTop:'IP-TBM Profiles',
                            //    messageTop: 'PDF created by Buttons for DataTables.',
                            exportOptions: {
                                columns: ':visible' // Export only visible columns
                            }
                        },
                        {
                            extend: 'collection',
                            text: 'PDF',
                            className: 'w-5',
                            buttons:[
                                {
                                    extend: 'pdfHtml5',
                                    text:'Landscape',
                                    //   messageTop: 'PDF created by Buttons for DataTables.',
                                    exportOptions: {
                                        width:'auto',
                                        columns: ':visible' // Export only visible columns
                                    },
                                    orientation: 'landscape',
                                    pageSize: 'LEGAL',
                                    messageTop:'IP-TBM Profiles',
                                },
                                {
                                    extend: 'pdfHtml5',
                                    text:'Portrait',
                                    //   messageTop: 'PDF created by Buttons for DataTables.',
                                    exportOptions: {
                                        width:'auto',
                                        columns: ':visible' // Export only visible columns
                                    },
                                    orientation: 'portrait',
                                    pageSize: 'LEGAL',
                                    messageTop:'IP-TBM Profiles',
                                },
                            ]
                        },


                        {
                            extend:'print',
                            text:'Print',
                            messageTop:'IP-TBM Profiles',
                            exportOptions: {
                                stripHtml: false,
                                columns: ':visible' ,// Export only visible columns,

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
            .appendTo('#searchPan').attr({placeHolder:'Search'});
        $('.dataTables_filter').addClass('hidden')
        table.buttons().container().appendTo('#botNav');
        table.columns( ['.empldate','.budget','.projects'] ).visible( false,false );


    </script>
@endsection
