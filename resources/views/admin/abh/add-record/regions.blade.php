@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: add record"}}
@endsection

@section('content')
    <div class="w-full">
        <livewire:iptbm.admin.region.add-region />
        <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="block md:flex justify-between items-center">
                    <div  class="me-4 p-4">
                        <x-secondary-button data-modal-toggle="addRegionMod" class="text-sky-600 dark:text-sky-600">
                            Add region
                        </x-secondary-button>
                    </div>
                    <div id="searchPan" class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                        <div id="botNav" >

                        </div>
                    </div>


                </div>
            </nav>

        </nav>
        <div class="px-4 w-full mt-5">
            <x-header-label>
                Regions
            </x-header-label>
            <div class="relative overflow-x-auto  shadow-lg w-full p-4 bg-white dark:bg-gray-800 mt-2 rounded-lg text-gray-600 dark:text-white">
                <table id="regTable" class="w-fit display cell-border stripe table-auto md:table-fixed hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="border-0">

                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Region
                        </th>
                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Consortium
                        </th>
                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Consortium Director
                        </th>
                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            rrdcc_chair
                        </th>
                        <th scope="col" class="agencies px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Agencies
                        </th>
                        <th scope="col" class="action px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Actions
                        </th>
                    </tr>
                    <tr class="border-0 filters">

                        <th scope="col" class="fil  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil   px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="   px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($regions as $region)
                        <tr>
                            <td>
                                {{$region->name}}
                            </td>
                            <td>
                                {{$region->consortium}}
                            </td>
                            <td>
                                {{$region->consortium_director}}
                            </td>
                            <td>
                                {{$region->rrdcc_chair}}
                            </td>
                            <td>
                                @if($region->agencies->count()>0)
                                    <div class="text-base font-medium">
                                        Agencies
                                    </div>
                                    <ul class="space-y-2">
                                        @forelse($region->agencies as $agency)
                                            <li >
                                                {{$agency->name}}
                                            </li>
                                        @empty
                                            No data available
                                        @endforelse
                                    </ul>
                                @endif

                            </td>
                            <td>
                                <div class="h-full w-full justify-start flex items-center">
                                    <a href="{{route("iptbm.admin.editregion.index",['id'=>$region->id])}}">
                                        <x-secondary-button >
                                            Update
                                        </x-secondary-button>
                                    </a>


                                </div>
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
    <script>
        $(function () {


            var table = $('#regTable').DataTable({
                stateSave: true,
                pagingType: 'full_numbers',
                colReorder: true,
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
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                    },
                    {
                        extend: 'columnToggle',
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                        columns: '.action',
                        text:'Action'

                    },
                    {
                        extend:'colvis',
                        text:'<i class="fa-solid fa-table-columns"></i> Visible Column',
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                    },
                    {
                        extend: 'collection',
                        text: '<span class="fa-solid fa-download"></span> Export',
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
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
            table.columns( ['.agencies'] ).visible( false,false );
            $('.reset').click( function (e) {
                table.colReorder.reset();
            } );
        });

    </script>
@endsection
