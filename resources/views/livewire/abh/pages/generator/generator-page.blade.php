<div class="w-full">
    <livewire:abh.generator.add-abh-generator />
    <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">
        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-between items-center">
                <div class="ms-2 pt-2 md:pt-0">
                    <x-secondary-button class="text-sky-500 dark:text-sky-500 " data-modal-toggle="addAbhGenerator">
                        Add Generator
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
    <x-header-label class="mt-10">
        Technology Generators
    </x-header-label>
    <div class=" md:px-4">
        <x-card-panel class="relative overflow-x-auto w-full">
            <table id="generator"
                   class="w-fit display cell-border stripe table-auto  hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
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
                        class="expertise px-6  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Expertise
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
                        class=" fil px-6  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Expertise
                    </th>
                    <th scope="col"
                        class="px-6 action w-20 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    </th>
                </tr>
                </thead>

                <tbody>
                @foreach($generators as $generator)
                    <tr>
                        <td>
                            {{$generator->first_name}} {{($generator->middle_name)? $generator->middle_name.'.':''}} {{$generator->last_name}} {{$generator->suiffix}}
                        </td>
                        <td>
                            {{$generator->profile->agency->name}}
                        </td>
                        <td>

                        </td>
                        <td>
                            <ul>
                                @forelse($generator->technologies as $technology)

                                @empty
                                    No data available
                                @endforelse
                            </ul>

                        </td>
                        <td>

                        </td>
                        <td>
                            <ul>
                                @forelse($generator->expertise as $field)
                                    <li>
                                        {{$field}}
                                    </li>
                                @empty
                                    No data available
                                @endforelse
                            </ul>
                        </td>
                        <td>
                            <div class="justify-evenly w-fit items-center flex gap-2">
                                <div>
                                    <x-link-button :url="route('abh.staff.generator_details',['generator'=>$generator->id])">
                                        Open
                                    </x-link-button>
                                </div>
                                <div>
                                    <x-pop-modal name="delete-Gen-{{$generator->id}}" class="max-w-md">
                                        <form  wire:submit.prevent="delete_generator({{$generator->id}})">
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this data?</h3>
                                                <button  type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                    Confirm
                                                </button>
                                                <button data-modal-hide="delete-Gen-{{$generator->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                                            </div>
                                        </form>
                                    </x-pop-modal>
                                    <x-secondary-button data-modal-toggle="delete-Gen-{{$generator->id}}">
                                        Delete
                                    </x-secondary-button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </x-card-panel>
    </div>
    @section('script')
        <script>
            $(function () {


                var table = $('#generator').DataTable({
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
                table.columns(['.tech', '.contact','.expertise']).visible(false, false);

            });
        </script>
    @endsection
</div>
