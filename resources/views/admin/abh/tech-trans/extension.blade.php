
@extends('admin.iptbm.layout.app')

@section('title')
    {{"| Tech trans extension: admin"}}
@endsection

@section('content')
    <div class="w-full">
        <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="block md:flex justify-end items-center">
                    <div id="searchPan" class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                        <div id="botNav" >

                        </div>
                    </div>


                </div>

            </nav>

        </nav>
        <div class="px-4 w-full mt-10">
            <x-header-label>
                Technologies for Deployment
            </x-header-label>
            <x-card>
                <div class="relative overflow-x-auto ">
                    <table id="extensionTable" style="width:100%" class="w-fit display cell-border stripe table-auto md:table-fixed hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                        <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="border-0 ">
                            <th scope="col" class="  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Technology
                            </th>
                            <th scope="col" class=" px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Adopter
                            </th>
                            <th scope="col" class="  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Tech Owner
                            </th>
                            <th scope="col" class=" dateCreated px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Date Created
                            </th>
                            <th scope="col" class=" dateUpdated px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Last Update
                            </th>
                        </tr>
                        <tr class="border-0 filters">

                            <th scope="col" class="filter-col  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Technology
                            </th>
                            <th scope="col" class="filter-col px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Adopter
                            </th>
                            <th scope="col" class="filter-col  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Tech Owner
                            </th>
                            <th scope="col" class=" filter-col px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Date Created
                            </th>
                            <th scope="col" class=" filter-col px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Last Update
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($extensions as $extension)
                            <tr>
                                <td>
                                    <a href="{{route("iptbm.admin.technology.view-tech",['technology'=>$extension->technology])}}" class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                                        {{$extension->technology->title}}
                                    </a>


                                </td>
                                <td>
                                    {{$extension->adoptor_name}}
                                </td>
                                <td>
                                    <a href="{{route("iptbm.admin.view-agency",['agency'=>$extension->technology->iptbmprofiles->agency])}}" class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                                        {{$extension->technology->iptbmprofiles->agency->name}}
                                    </a>

                                </td>
                                <td>
                                    {{\Carbon\Carbon::parse($extension->date_created)->format('F-d-Y')}}
                                </td>
                                <td>
                                    {{\Carbon\Carbon::parse($extension->date_updated)->format('F-d-Y')}}
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
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            var table = $('#extensionTable').DataTable({

                pagingType: 'full_numbers',
                colReorder: true,
                horizontalScroll:true,
                dom: 'Bfrtip',
                autoWidth:false,
                orderCellsTop: true,
                initComplete: function () {
                    var api = this.api();
                    api.columns().eq(0).each(function (colIdx) {
                        var cell = $('.filter-col').eq($(api.column(colIdx).header()).index());
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
            table.columns( ['.dateCreated','.dateUpdated','.compDesc','.busiStruct','.busiReg','.acquis','.incub','.contact'] ).visible( false,false );
            $('.reset').click( function (e) {
                table.colReorder.reset();
            } );
        });
        $(document).ready(function(){

        })
    </script>
@endpush
