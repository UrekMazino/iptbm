@extends('layouts.iptbm.staff')

@section('title')
    {{"| technology"}}
@endsection

@section('content')
    <div class="w-full">

        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="block md:flex  justify-between items-center">
                    <div class="me-4 p-4">
                        <a href="{{ route("addd.technology.details")}}"
                           class="bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 transition duration-300  font-medium rounded-lg text-sm px-5 py-2 text-center hover:bg-gray-300 dark:hover:bg-blue-700 "
                           type="button">
                            Add Technology
                        </a>

                    </div>
                    <div id="searchPan"
                         class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                        <div id="botNav">

                        </div>
                    </div>

                </div>

            </nav>

        </nav>
        <div class="px-4 mt-10">


            <x-header-label>
                My Technologies
            </x-header-label>

            <x-card>

                <div class="relative overflow-x-auto ">
                    <table id="technologies"
                           class="w-full display cell-border stripe table-auto md:table-fixed hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                        <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col"
                                class="w-1/2 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Date inserted
                            </th>
                            <th scope="col"
                                class="w-1/2 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Title
                            </th>
                            <th scope="col"
                                class="w-1/2 industry py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Industry
                            </th>

                            <th scope="col"
                                class="w-1/2 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Year Developed
                            </th>
                            <th scope="col"
                                class="w-1/2 description  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Description
                            </th>
                            <th scope="col"
                                class="w-1/2 inventor py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Generators
                            </th>
                            <th scope="col"
                                class="w-1/2 ipapplication py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                IP Application
                            </th>
                            <th scope="col"
                                class="w-1/2 pathway py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Pathways
                            </th>
                            <th scope="col"
                                class="px-6 action w-24 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                        <tr class="border-0 filters">
                            <th scope="col"
                                class="fil w-1/2 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Year
                            </th>

                            <th scope="col"
                                class="fil w-1/2 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Title
                            </th>
                            <th scope="col"
                                class="fil w-1/2 industry py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Industry
                            </th>
                            <th scope="col"
                                class="fil w-1/2 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Year
                            </th>
                            <th scope="col"
                                class="fil w-1/2   py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Description
                            </th>
                            <th scope="col"
                                class="fil w-1/2 inventor py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Generators
                            </th>
                            <th scope="col"
                                class="fil w-1/2 ipapplication py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                IP Application
                            </th>
                            <th scope="col"
                                class="fil w-1/2 pathway py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Pathways
                            </th>
                            <th scope="col"
                                class=" px-6   w-20 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </x-card>

        </div>

    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var table = $('#technologies').DataTable({


                    //     stateSave: true,
                    pagingType: 'full_numbers',

                    horizontalScroll: true,
                    dom: 'Bfrtip',
                    autoWidth: false,
                    orderCellsTop: true,
                    search: {
                        "smart": true,
                        className: 'bg-red-600'
                    },
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
                            text: 'Page Length',
                            className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',

                        },
                        {
                            extend: 'columnToggle',
                            text: 'Action',
                            className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
                            columns: '.action'

                        },


                        {
                            extend: 'colvis',
                            text: 'Visible Column',
                            className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
                            columns: ':not(.noVis)',
                        },
                        {
                            extend: 'collection',
                            text: 'Export',
                            className: ' text-blue-500 px-10 dark:bg-gray-700 dark:text-sky-500 border-0  hover:border-0',
                            buttons: [
                                {
                                    extend: 'excel',
                                    text: 'Excel',
                                    className: 'w-5',
                                    //    messageTop: 'PDF created by Buttons for DataTables.',
                                    exportOptions: {
                                        columns: ':visible' // Export only visible columns
                                    }
                                },

                                {
                                    extend: 'pdfHtml5',
                                    text: 'PDF',
                                    //   messageTop: 'PDF created by Buttons for DataTables.',
                                    exportOptions: {
                                        width: 'auto',
                                        columns: ':visible' // Export only visible columns
                                    },

                                },
                                {
                                    extend: 'print',
                                    text: 'Print',
                                    messageTop: 'PDF created by Buttons for DataTables.',
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
                table.buttons().container().appendTo('#botNav');
                $('.dataTables_filter input')
                    .addClass("font-normal text-base border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-950 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm ")
                    .appendTo('#searchPan').attr({placeHolder: 'Search'});
                $('.dataTables_filter').addClass('hidden')
                table.columns(['.inventor', '.industry', '.ipapplication', '.pathway','.description']).visible(false, false);

            })

        });
    </script>
@endsection
