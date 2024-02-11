@extends('layouts.iptbm.staff')

@section('title')
    {{"| Pathway-deployment"}}
@endsection

@section('content')
    <div class="w-full">

        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="block md:flex justify-between items-center">
                    <div class="me-4 p-4">
                        <button data-modal-target="addDeployedTech" data-modal-toggle="addDeployedTech"
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
        <livewire:iptbm.staff.deployment.add-deploed-technology :technologies="$profile->technologies"/>


        <div class="px-4 mt-10">

            <x-header-label>
                Deployed Technologies
            </x-header-label>
            <x-card>
                <div class="relative overflow-x-auto  w-full p-2">
                    <table id="technologies"
                           class="w-full table-fixed text-sm cell-border stripe hover rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                        <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="border-0">
                            <th scope="col"
                                class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Title
                            </th>
                            <th scope="col"
                                class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Name of Adopter
                            </th>
                            <th scope="col"
                                class="contact px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Contact Details
                            </th>

                            <th scope="col"
                                class="px-6 action w-44  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                        <tr class="border-0 filters">
                            <th scope="col"
                                class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Title
                            </th>
                            <th scope="col"
                                class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Name of Adopter
                            </th>
                            <th scope="col"
                                class="fil  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Contact Details
                            </th>

                            <th scope="col"
                                class=" px-6 action  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($deployedTechnologies as $data)
                            <tr>
                                <td>
                                    {{$data->technology->title}}
                                </td>
                                <td>
                                    {{$data->adoptor_name}}
                                </td>
                                <td class="space-y-2">
                                    @if($data->contacts->where('type','mobile')->count()>0)
                                        <div>
                                            Mobile Number
                                            <ul>
                                                @foreach($data->contacts->where('type','mobile') as $contact)
                                                    <li>
                                                        {{$contact->contact}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    @endif
                                    @if($data->contacts->where('type','phone')->count()>0)
                                        <div>
                                            Phone Number
                                            <ul>
                                                @foreach($data->contacts->where('type','phone') as $contact)
                                                    <li>
                                                        {{$contact->contact}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    @endif
                                    @if($data->contacts->where('type','fax')->count()>0)
                                        <div>
                                            Fax Number
                                            <ul>
                                                @foreach($data->contacts->where('type','fax') as $contact)
                                                    <li>
                                                        {{$contact->contact}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    @endif
                                    @if($data->contacts->where('type','email')->count()>0)
                                        <div>
                                            Email Address
                                            <ul>
                                                @foreach($data->contacts->where('type','email') as $contact)
                                                    <li>
                                                        {{$contact->contact}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    @endif
                                </td>
                                <td>
                                    <div class="h-full justify-start gap-4 flex">

                                        <x-link-button :url='route("iptbm.staff.deployment.deployed_tech",["id"=>$data->id])'>
                                            Details
                                        </x-link-button>
                                        <livewire:iptbm.staff.deployment.delete-deployed-tech wire:key="{{$data->id}}"
                                                                                              :technology="$data"/>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var table = $('#technologies').DataTable({

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
            table.columns([".contact"]).visible(false, false);
            table.columns.adjust().draw(false);


        })


    </script>
@endsection
