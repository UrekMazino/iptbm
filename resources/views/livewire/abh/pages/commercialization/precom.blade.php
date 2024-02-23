<div>
    <x-slot name="pagetitle">
        Pre Commercialization
    </x-slot>
    <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-between items-center">
                <div class="ms-2">

                    <x-secondary-button data-modal-toggle="addAbhTech">
                        Add Technology
                    </x-secondary-button>
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
        <x-header-label class="mb-2 mt-16">
            Pre Commercialization
        </x-header-label>
        <x-card-panel class="relative overflow-x-auto w-full">
            <table id="precomTab"
                   class="w-fit display cell-border stripe table-auto  hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col"
                        class="id_db px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        ID
                    </th>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Technology
                    </th>
                    <th scope="col"
                        class="new_tech_name px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        New Technology name
                    </th>
                    <th scope="col"
                        class=" px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Owner
                    </th>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Starting Capital
                    </th>
                    <th scope="col"
                        class="cost  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Estimated Cost
                    </th>
                    <th scope="col"
                        class="roi px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Return of investment
                    </th>
                    <th scope="col"
                        class="com_mode px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Commercialization Mode
                    </th>
                    <th scope="col"
                        class="dated_insert px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Date Inserted
                    </th>
                    <th scope="col"
                        class="date_update px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Date Updated
                    </th>
                    <th scope="col"
                        class="action px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Action
                    </th>
                </tr>
                <tr class="border-0 filters">
                    <th scope="col"
                        class="id_db fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        ID
                    </th>
                    <th scope="col"
                        class=" fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Technology
                    </th>
                    <th scope="col"
                        class=" fil new_tech_name px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        New Technology name
                    </th>
                    <th scope="col"
                        class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        New Technology name
                    </th>
                    <th scope="col"
                        class=" fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Starting Capital
                    </th>
                    <th scope="col"
                        class=" fil cost  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Estimated Cost
                    </th>
                    <th scope="col"
                        class=" fil roi px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Return of investment
                    </th>
                    <th scope="col"
                        class=" fil com_mode px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Commercialization Mode
                    </th>
                    <th scope="col"
                        class=" fil dated_insert px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Date Inserted
                    </th>
                    <th scope="col"
                        class=" fil date_update px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Date Updated
                    </th>
                    <th scope="col"
                        class="action px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($precom_tech as $precom)
                    <tr>
                        <td>
                            {{$precom->technology->id}}
                        </td>
                        <td>
                            {{$precom->technology->title}}
                        </td>
                        <td>
                            {{$precom->technology->pre_com_tech_name}}
                        </td>
                        <td>
                            {{$precom->technology->iptbmprofiles->agency->name}}
                        </td>
                        <td>
                            {{$precom->starting_capital}}
                        </td>
                        <td>
                            {{$precom->estimated_acquisition_cost}}
                        </td>
                        <td>
                            {{$precom->return_of_investment}}
                        </td>
                        <td>
                            {{$precom->commercialization_mode}}
                        </td>
                        <td>
                            {{$precom->created_at}}
                        </td>
                        <td>
                            {{$precom->updated_at}}
                        </td>
                        <td>
                            <x-link-button :url="route('abh.staff.commercialization.precom.details',[
                            'precom'=>$precom->id
                            ])" >
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

        $(function () {
            var table = $('#precomTab').DataTable({
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
                        text: 'pageLength',
                        className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0'
                    },
                    {
                        extend: 'colvis',
                        text: 'Visible Column',
                        className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0'
                    },
                    {
                        extend: 'collection',
                        text: 'Export',
                        className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
                        buttons: [
                            {
                                extend: 'excel',
                                text: 'Excel',
                                className: 'w-5',
                                messageTop: 'Technologies under Pre Commercialization',
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
                                        messageTop: 'Technologies under Pre Commercialization',
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
                                        messageTop: 'Technologies under Pre Commercialization',
                                    },
                                ]
                            },


                            {
                                extend: 'print',
                                text: 'Print',
                                messageTop: 'Technologies under Pre Commercialization',
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
            table.columns(['.id_db','.new_tech_name','.cost','.roi','.com_mode','.dated_insert','.date_update']).visible(false, false);

        });
    </script>
@endsection
