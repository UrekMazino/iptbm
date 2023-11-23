@extends('layouts.iptbm.staff')

@section('title')
    {{"| Pre Commercialization"}}
@endsection

@section('meta_data')
    <meta name="pre-commercialization" content="Technology pre-commercialization">
@endsection

@section('content')
    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between items-center">
                    <div class="me-4 p-4">
                        <button data-modal-target="addPrecomBot" data-modal-toggle="addPrecomBot"
                                class="bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0  hover:border-0 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                            Add Technology
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


        <div class="px-4 w-full mt-10">
            <livewire:iptbm.staff.precom.add-tech-pre-com wire:key="precom" :technologies="$technologies"/>
            <x-header-label>
                Technologies for Pre Commercialization
            </x-header-label>
            <x-card>
                <div class="relative overflow-x-auto  w-full p-2 ">
                    <table id="techPrecomTab"
                           class="w-fit display cell-border stripe table-auto md:table-fixed hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                        <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col"
                                class=" px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Technology
                            </th>
                            <th scope="col"
                                class="newTitle px-6 py-3  break-words border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                New Technology title
                            </th>
                            <th scope="col"
                                class="w-min px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Technology Owner
                            </th>
                            <th scope="col"
                                class="capital w-min px-6 py-3 break-words  border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Starting Capital
                            </th>
                            <th scope="col"
                                class="cost w-min px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Estimated Cost
                            </th>
                            <th scope="col"
                                class="income  w-min px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Income Generated
                            </th>
                            <th scope="col"
                                class="roi  w-min px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Return of Investment
                            </th>
                            <th scope="col"
                                class="mode  px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Commercialization Mode
                            </th>
                            <th scope="col"
                                class="create px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Date Created
                            </th>
                            <th scope="col"
                                class="update  px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Last Update
                            </th>

                            <th scope="col"
                                class="w-min px-6 action py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Action
                            </th>
                        </tr>
                        <tr class="border-0 filters">

                            <th scope="col"
                                class="fil px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Technology
                            </th>
                            <th scope="col"
                                class="fil  px-6 py-3  break-words border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                New Technology title
                            </th>
                            <th scope="col"
                                class="fil w-min px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Technology Owner
                            </th>
                            <th scope="col"
                                class="fil  w-min px-6 py-3 break-words  border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Starting Capital
                            </th>
                            <th scope="col"
                                class="fil  w-min px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Estimated Cost
                            </th>
                            <th scope="col"
                                class="fil   w-min px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Income Generated
                            </th>
                            <th scope="col"
                                class="fil   w-min px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Return of Investment
                            </th>
                            <th scope="col"
                                class="fil   px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Commercialization Mode
                            </th>
                            <th scope="col"
                                class="fil  px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Date Created
                            </th>
                            <th scope="col"
                                class="fil   px-6 py-3 border break-words  border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Last Update
                            </th>

                            <th scope="col"
                                class="w-min px-6 action py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pre_coms as $key=> $pre_com)
                            <tr class="">
                                <td class="py-2 ">
                                    {{$pre_com->technology->title}}
                                </td>
                                <td class="break-words">
                                    {{$pre_com->pre_com_tech_name}}
                                </td>
                                <td>
                                    {{$pre_com->technology->tech_owner->name}}
                                </td>
                                <td class="text-sm">
                                    @if($pre_com->starting_capital)
                                        <span class="fa-solid fa-peso-sign"></span>
                                        {{number_format($pre_com->starting_capital,2)}}
                                    @endif

                                </td>
                                <td class="text-sm">
                                    @if($pre_com->estimated_acquisition_cost)
                                        <span class="fa-solid fa-peso-sign"></span>
                                        {{number_format($pre_com->estimated_acquisition_cost,2)}}
                                    @endif

                                </td>

                                <td class="text-sm">
                                    @if($pre_com->income_gen_trans)
                                        <span class="fa-solid fa-peso-sign"></span>
                                        {{number_format($pre_com->income_gen_trans,2)}}
                                    @endif

                                </td>
                                <td class="text-sm">
                                    {{$pre_com->return_of_investment}}
                                </td>
                                <td>
                                    @if($pre_com->modes->count())
                                        <ul class="list-decimal ms-5">
                                            @foreach($pre_com->modes as $mode)
                                                <li>
                                                    {{$mode->commercialization_mode}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </td>
                                <td>
                                    {{$pre_com->created_at->format('F-d-Y')}}
                                </td>
                                <td>
                                    {{$pre_com->updated_at->format('F-d-Y')}}
                                </td>
                                <td>
                                    <div class="h-full justify-start gap-4 flex">
                                        <x-link-button :url="route('iptbm.staff.precom.details',['id'=>$pre_com->id])">
                                            <span class="fa-solid fa-folder-open"></span>
                                        </x-link-button>


                                        <livewire:iptbm.staff.precom.delete-precom wire:key="{{$pre_com->id}}"
                                                                                   :precom="$pre_com"/>
                                        <x-secondary-button data-modal-toggle="popup-modal-precom-{{$pre_com->id}}">
                                            <span class="fa-solid fa-trash text-red-500"></span>
                                        </x-secondary-button>

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
        $(document).ready(function () {


            var table = $('#techPrecomTab').DataTable({

                //  stateSave: true,
                pagingType: 'full_numbers',
                //   colReorder: true,
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
                                extend: 'excel',
                                text: 'Excel',
                                className: 'w-5',
                                messageTop: 'Technologies under Commercialization Adopter',
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
                                        messageTop: 'Technologies under Commercialization Adopter'
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
                                        messageTop: 'Technologies under Commercialization Adopter'
                                    },
                                ]
                            },


                            {
                                extend: 'print',
                                text: 'Print',
                                messageTop: 'Technologies under Commercialization Adopter',
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
            table.columns([".newTitle", ".create", ".update", ".roi", ".cost", ".income", ".capital", ".mode"]).visible(false, false);
            table.columns.adjust().draw(false);

        })
    </script>
@endsection

