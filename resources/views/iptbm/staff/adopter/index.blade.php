@extends('layouts.iptbm.staff')

@section('title')
    {{"| dashboard"}}
@endsection

@section('content')
    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between items-center">
                    <div class="me-4 p-4">
                        <button data-modal-target="addAdopter" data-modal-toggle="addAdopter"
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


        <livewire:iptbm.staff.adopter.add-adopter-tech :technologies="$profile->technologies"/>

        <div class="px-4 mt-10">

            <div class="text-3xl px-2 font-medium text-gray-700 dark:text-white">
                Technologies for Commercialization Adopter
            </div>

            <div
                class="relative overflow-x-auto  shadow-lg w-full p-4 bg-white dark:bg-gray-800 mt-2 rounded-lg text-gray-600 dark:text-white">
                <table id="techAdopter"
                       class="w-full display cell-border stripe table-auto md:table-fixed hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 break-words border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Technology
                        </th>
                        <th scope="col"
                            class="px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Company
                        </th>
                        <th scope="col"
                            class="px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Address
                        </th>
                        <th scope="col"
                            class="compDes px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Company Description
                        </th>
                        <th scope="col"
                            class="businessStruc px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Business Structure
                        </th>
                        <th scope="col"
                            class="businessReg px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Business Registration
                        </th>
                        <th scope="col"
                            class="mode px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Acquisition Mode
                        </th>
                        <th scope="col"
                            class="incubation px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            For Incubation?
                        </th>
                        <th scope="col"
                            class="contact px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Contact Details
                        </th>
                        <th scope="col"
                            class="px-6 action py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Action
                        </th>
                    </tr>
                    <tr class="border-0 filters">
                        <th scope="col"
                            class="fil px-6 py-3 break-words border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Technology
                        </th>
                        <th scope="col"
                            class="fil px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Company
                        </th>
                        <th scope="col"
                            class="fil px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Address
                        </th>
                        <th scope="col"
                            class="fil  px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Company Description
                        </th>
                        <th scope="col"
                            class="fil  px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Business Structure
                        </th>
                        <th scope="col"
                            class="fil  px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Business Registration
                        </th>
                        <th scope="col"
                            class="fil  px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Acquisition Mode
                        </th>
                        <th scope="col"
                            class="fil  px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            For Incubation?
                        </th>
                        <th scope="col"
                            class="fil contact px-6 py-3 border break-words border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Contact Details
                        </th>
                        <th scope="col"
                            class="px-6 action py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($technologies as $tech)
                        <tr>
                            <td class="p-2 break-words">
                                <a href="{{route("iptbm.staff.technology.show",['id'=>$tech->technology->id])}}"
                                   class="text-blue-400 text-decoration-none">
                                    {{$tech->technology->title}}
                                </a>

                            </td>
                            <td class="break-words">
                                {{$tech->company_name}}
                            </td>
                            <td class="break-words">
                                {{$tech->address}}
                            </td>
                            <td class="break-words">
                                {{$tech->company_description}}
                            </td>
                            <td class="break-words">
                                {{$tech->business_structures}}
                            </td>
                            <td class="break-words">
                                {{$tech->business_registration}}
                            </td>
                            <td class="break-words">
                                {{$tech->acquisition_model}}
                            </td>
                            <td class="break-words">
                                {{$tech->for_incubation}}
                            </td>
                            <td class="break-words">
                                @if($tech->contacts->where('type','mobile')->count()>0)
                                    <div class="ms-5">
                                        <div class="font-medium">
                                            Mobile
                                        </div>
                                        <ul>
                                            @foreach($tech->contacts->where('type','mobile') as $contact)
                                                <li>
                                                    {{$contact->contact}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                @endif
                            </td>
                            <td class="break-words">
                                <div class="flex justify-start items-center gap-4">
                                    <x-link-button
                                        :url="route('iptbm.staff.commercialization.adoptedTech',['id'=>$tech->id])">
                                        <span class="fa-solid fa-edit w-4 h-4"></span>
                                    </x-link-button>

                                    <livewire:iptbm.staff.adopter.delete-adopter wire:key="{{$tech->id}}"
                                                                                 :adopter="$tech"/>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#techPrecomTab').DataTable({
                // serverSide: true,
                stateSave: true,
                pagingType: 'full_numbers',
            });

            var table = $('#techAdopter').DataTable({
                rowCallback: function (row, data) {
                    $(row).addClass('bg-gray-800 border-b text-base dark:bg-gray-800 dark:border-gray-700 transition duration:300 dark:hover:text-gray-50 hover:bg-gray-200 dark:hover:bg-gray-600');
                },
                pagingType: 'full_numbers',
                colReorder: true,
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
            table.columns([".compDes", ".businessStruc", ".businessReg", ".mode", ".incubation", ".contact"]).visible(false, false);
            table.columns.adjust().draw(false);

        })
    </script>
@endsection
