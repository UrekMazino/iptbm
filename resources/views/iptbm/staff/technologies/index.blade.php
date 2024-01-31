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
                                Year
                            </th>
                            <th scope="col"
                                class="w-1/2 industry py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Industry
                            </th>
                            <th scope="col"
                                class="w-1/2 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Title
                            </th>
                            <th scope="col"
                                class="w-1/2   py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                class="fil w-1/2 industry py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Industry
                            </th>
                            <th scope="col"
                                class="fil w-1/2 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Title
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
                            <td scope="col"
                                class="fil w-1/2 pathway py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Pathways
                            </td>
                            <th scope="col"
                                class=" px-6   w-20 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($technologies)

                            @foreach($technologies as $key=>$val)
                                <tr>
                                    <td>
                                        {{$val->year_developed}}
                                    </td>
                                    <td>
                                        <ul class="list-disc ms-3">
                                            @foreach($val->industries as $industry)
                                                <li>
                                                    {{$industry->industry->name}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        {{$val->title}}
                                    </td>
                                    <td>
                                        {{$val->tech_desc}}
                                    </td>
                                    <td>
                                        <ul class="list-decimal ms-3">
                                            @foreach($val->techgenerators as  $inventor)
                                                <li class="mb-1">
                                                    {{$inventor->inventor->name}}
                                                </li>
                                            @endforeach
                                        </ul>

                                    </td>
                                    <td>
                                        <ul class=" ms-3 divide-y divide-gray-400 dark:divide-gray-600">
                                            @foreach($val->ip_applications as  $application)
                                                <li class="my-2">
                                                    <div class="font-medium">
                                                        {{$application->ip_type->name}}
                                                    </div>
                                                    <div class="text-sm">
                                                        Date
                                                        filed: {{\Carbon\Carbon::parse($application->date_of_filing)->format('F-d-Y')}}
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ul>

                                    </td>
                                    <td>
                                        {{-------
                                        if pre commercialization
                                        ----}}
                                        <ul class="ms-3 list-disc">
                                            @if($val->pre_commercialization->count()>0)
                                                <li class="mb-1">
                                                    Commercialization <span class="text-sm ms-2">(Pre-Com)</span>
                                                </li>
                                            @endif
                                            @if($val->commercial_adopters->count()>0)
                                                <li class="mb-1">
                                                    Commercialization <span class="text-sm ms-2">(Adopter)</span>
                                                </li>
                                            @endif
                                            @if($val->deployment)
                                                <li class="mb-1">
                                                    Deployment
                                                </li>
                                            @endif
                                            @if($val->extension)
                                                <li class="mb-1">
                                                    Extension
                                                </li>
                                            @endif
                                        </ul>

                                    </td>
                                    <td class="">
                                        <div class="justify-evenly gap-2  flex items-center">

                                            <x-link-button :url="route('iptbm.staff.technology.show',['id'=>$val->id])">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                     viewBox="0 0 20 18">
                                                    <path
                                                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                                    <path
                                                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                                </svg>
                                            </x-link-button>

                                            @if($val->trashed())
                                                <livewire:iptbm.staff.technology.soft-delete-tech :technology="$val" wire:key="tech-del-{{$val->id}}" />

                                            @else
                                                <livewire:iptbm.staff.technology.delete-technology :technology="$val"/>
                                                <x-secondary-button data-modal-toggle="popup-modal-{{$val->id}}">
                                                    <svg class="w-4 h-4 text-sky-700" aria-hidden="true"
                                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                         viewBox="0 0 18 20">
                                                        <path
                                                            d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
                                                    </svg>
                                                </x-secondary-button>
                                            @endif

                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                        @endif
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
                table.columns(['.inventor', '.industry', '.ipapplication', '.pathway']).visible(false, false);

            })

        });
    </script>
@endsection
