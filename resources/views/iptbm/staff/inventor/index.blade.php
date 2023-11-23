@extends('layouts.iptbm.staff')

@section('title')
    {{"| inventors"}}
@endsection

@section('content')

    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">


            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="block md:flex  justify-between items-center">
                    <div class="me-4 p-4">
                        <!-- Modal toggle -->
                        <button data-modal-target="staticModal" data-modal-toggle="staticModal"
                                class="bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0  hover:border-0 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                            Add Inventor
                        </button>

                    </div>

                    <div id="searchPan"
                         class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                        <div id="botNav">

                        </div>
                    </div>


                </div>

            </nav>

        </nav>


        <!-- Main modal -->

        <livewire:iptbm.staff.inventor.add-inventor :agencies="$agencies"/>

        <div class="px-4 w-full mt-10">
            <x-header-label>
                Technology Generator
            </x-header-label>
            <x-card>
                <div class="relative overflow-x-auto  w-full p-2 ">
                    <table id="allProf"
                           class="w-full table-fixed text-sm cell-border stripe hover rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">

                        <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 w-20% border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Name
                            </th>


                            <th scope="col"
                                class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Agency Affiliated
                            </th>
                            <th scope="col"
                                class="px-6 w-20 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Status
                            </th>
                            <th scope="col"
                                class="tech px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Technologies
                            </th>
                            <th scope="col"
                                class="contact px-6  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Contact Details
                            </th>
                            <th scope="col"
                                class="px-6 action w-20 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                        <tr class="border-0 filters">
                            <th scope="col"
                                class="fil px-6 py-3 w-20% border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Name
                            </th>


                            <th scope="col"
                                class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Agency Affiliated
                            </th>
                            <th scope="col"
                                class="fil px-6 w-20 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Status
                            </th>
                            <th scope="col"
                                class="fil  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Technologies
                            </th>
                            <th scope="col"
                                class=" fil px-6  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Contact Details
                            </th>
                            <th scope="col"
                                class="px-6 action w-20 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($inventors as $key=>$inventor)

                            <tr>
                                <td class="col-3 p-2">
                                    {{ $inventor->name}} {{ $inventor->middle_name}} {{ $inventor->last_name}} {{ $inventor->suffixes}}
                                </td>
                                <td class="col-6">
                                    <ul>
                                        @foreach($inventor->latest_agency_affiliation as $agency)
                                            <li>
                                                {{$agency->latest_agency}}
                                            </li>
                                        @endforeach
                                    </ul>

                                </td>

                                <td class="col-1">
                                    {{$inventor->status}}
                                </td>
                                <td class="col-1">

                                    @if($inventor->technologies->count()>0)
                                        <ul>
                                            @foreach($inventor->technologies as $val)
                                                <li>
                                                    {{$val->technology->title}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td class="col-1">

                                    @if($inventor->contacts->where('type','mobile')->count()>0)
                                        <ul class="mt-2 ms-3 list-disc">
                                            <div class="text-gray-600 dark:text-gray-400">
                                                Mobile number:
                                            </div>
                                            @foreach($inventor->contacts->where('type','mobile') as $val)
                                                <li>
                                                    {{$val->contact}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if($inventor->contacts->where('type','phone')->count()>0)
                                        <ul class="mt-2 ms-3 list-disc">
                                            <div class="text-gray-600 dark:text-gray-400">
                                                Phone number:
                                            </div>
                                            @foreach($inventor->contacts->where('type','phone') as $val)
                                                <li>
                                                    {{$val->contact}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if($inventor->contacts->where('type','fax')->count()>0)
                                        <ul class="mt-2 ms-3 list-disc">
                                            <div class="text-gray-600 dark:text-gray-400">
                                                Fax number:
                                            </div>
                                            @foreach($inventor->contacts->where('type','fax') as $val)
                                                <li>
                                                    {{$val->contact}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if($inventor->contacts->where('type','email')->count()>0)
                                        <ul class="mt-2 ms-3 list-disc">
                                            <div class="text-gray-600 dark:text-gray-400">
                                                Email:
                                            </div>
                                            @foreach($inventor->contacts->where('type','email') as $val)
                                                <li>
                                                    {{$val->contact}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td>
                                    <div class="flex justify-start items-center gap-2">
                                        <x-link-button
                                            :url="route('iptbm.inventor.show.profile',['id'=>$inventor->id])">
                                            Open
                                        </x-link-button>

                                        <livewire:iptbm.staff.inventor.delete-inventor-popup :inventor="$inventor"
                                                                                             wire:key="{{$key}}"/>
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
    <script>
        $(function () {


            var table = $('#allProf').DataTable({
                // stateSave: true,
                pagingType: 'full_numbers',
                horizontalScroll: true,
                dom: 'Bfrtip',
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
            table.columns(['.tech', '.contact']).visible(false, false);

        });
    </script>
@endsection

