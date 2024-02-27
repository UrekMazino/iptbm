<div class="w-full">
    <nav
        class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-end items-center">
                <div id="searchPan"
                     class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                    <div id="botNav">

                    </div>
                </div>
            </div>

        </nav>

    </nav>
    <div class=" md:px-4">
        <x-header-label class="mt-10">
            ABH Profiles
        </x-header-label>
        <x-card-panel class="relative overflow-x-auto w-full">
            <table id="allProf"
                   class="w-fit display cell-border stripe table-auto  hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Region
                    </th>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Agency
                    </th>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Accounts
                    </th>
                    <th scope="col"
                        class="px-6 contact py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Contact
                    </th>
                    <th scope="col"
                        class="px-6 project py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Projects
                    </th>
                    <th scope="col"
                        class="px-6 technology py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Pre Commercialized Technologies
                    </th>
                    <th scope="col"
                        class="px-6  w-24 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Actions
                    </th>
                </tr>
                <tr class="border-0 filters">
                    <th scope="col"
                        class="px-6 fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Region
                    </th>
                    <th scope="col"
                        class="px-6 fil  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Agency
                    </th>
                    <th scope="col"
                        class="px-6 fil  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Accounts
                    </th>
                    <th scope="col"
                        class="px-6  fil contact py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Contact
                    </th>
                    <th scope="col"
                        class="px-6 fil  project py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Projects
                    </th>
                    <th scope="col"
                        class="px-6 fil  technology py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Pre Commercialized Technologies
                    </th>
                    <th scope="col"
                        class="px-6  w-24 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($profiles as $profile)
                    <tr>
                        <td>

                            <a href="{{route('abh.admin.all_regions.details',['region'=>$profile->agency->region->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{$profile->agency->region->name}}
                            </a>

                        </td>
                        <td>

                            <a href="{{route('abh.admin.all_agencies.updates',['agency'=>$profile->agency->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                {{$profile->agency->name}}
                            </a>


                        </td>
                        <td>
                            <ul class="list-inside">
                                @foreach($profile->users as $user)
                                    <li>
                                        <a href="{{route('abh.admin.all_accounts_details',['account'=>$user->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                            <div>
                                                {{$user->name}}
                                            </div>
                                            <div>
                                                {{$user->email}}
                                            </div>
                                        </a>

                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            @if($profile->contacts_mobiles->count()>0)
                                <ul class="list-inside">
                                    @foreach($profile->contacts_mobiles as $contact)
                                        <li>
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if($profile->contacts_phones->count()>0)
                                <ul class="list-inside">
                                    @foreach($profile->contacts_phones as $contact)
                                        <li>
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if($profile->contacts_faxes->count()>0)
                                <ul class="list-inside">
                                    @foreach($profile->contacts_faxes as $contact)
                                        <li>
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if($profile->contacts_emails->count()>0)
                                <ul class="list-inside">
                                    @foreach($profile->contacts_emails as $contact)
                                        <li>
                                            {{$contact->contact}}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        </td>
                        <td>
                            <ul>
                                @foreach($profiles as $profile)
                                    <li>
                                        {{$profile->project_name}}
                                    </li>
                                @endforeach
                            </ul>

                        </td>
                        <td>
                            <ul>
                                @foreach ($profile->agency->profiles->technologies as $technology)
                                    <li>
                                        {{$technology->title}}
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <x-link-button :url="route('abh.admin.my_profile.details',['profile'=>$profile->id])">
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
            var table = $('#allProf').DataTable({

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
                        text: '<i class="fa-regular fa-file-lines"></i> Page Length',
                        className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0'
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
                                extend: 'excelHtml5',
                                text: 'Excel',
                                className: 'w-5',
                                messageTop: 'ABH Profiles',
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
                                        messageTop: 'ABH Profiles',
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
                                        messageTop: 'ABH Profiles',
                                    },
                                ]
                            },


                            {
                                extend: 'print',
                                text: 'Print',
                                messageTop: 'ABH Profiles',
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
            table.columns(['.contact', '.technology', '.project']).visible(false, false);
        });
    </script>
@endsection
