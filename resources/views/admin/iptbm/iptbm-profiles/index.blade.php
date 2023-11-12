
@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: add record"}}
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
        <div class="px-4 w-full mt-5">
            <x-header-label>
                IP-TBM Profiles
            </x-header-label>
            <div class="relative overflow-x-auto  shadow-lg w-full p-4 bg-white dark:bg-gray-800 mt-2 rounded-lg text-gray-600 dark:text-white">
                <table id="profiletable" class="w-fit display cell-border stripe table-auto md:table-fixed hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="border-0">

                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Profile photo
                        </th>
                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Region
                        </th>
                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Agencies
                        </th>
                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Accounts
                        </th>
                        <th scope="col" class="contact px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Contacts
                        </th>
                        <th scope="col" class=" projects px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Projects
                        </th>
                        <th scope="col" class=" technology px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Technologies
                        </th>
                        <th scope="col" class="action px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Actions
                        </th>
                    </tr>
                    <tr class="border-0 filters">

                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil contact px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil  projects px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil  technology px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil action px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td >
                                <x-thumbnail-holder :url="$profile->logo?? null" class="w-36 rounded-lg p-2 mx-auto" />
                            </td>
                            <td>
                                {{$profile->agency->region->name}}
                            </td>
                            <td>
                                {{$profile->agency->name}}
                            </td>
                            <td>
                                <ul class="divide-y divide-gray-400 dark:divide-gray-600 ">
                                    @foreach($profile->users as $user)
                                        <li class="py-2 break-words">

                                            <a href="{{route("iptbm.admin.addrecord.editaccount",['id'=>$user->id])}}" class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                                                <div>
                                                    {{$user->name}}
                                                </div>
                                                {{$user->email}}
                                            </a>

                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @if($profile->contact->count() > 0)
                                    <x-item-header>
                                        Contact Details
                                    </x-item-header>
                                    @if($profile->contact->where('contact_type','mobile')->count()>0)
                                        <x-input-label class="mt-5" value="Mobile"/>
                                        <ul class="divide-y divide-gray-400 dark:divide-gray-600 ">
                                            @foreach($profile->contact->where('contact_type','mobile') as $contact)
                                                <li class="py-2">
                                                    <div class="font-medium">
                                                        {{$contact->contact}}
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if($profile->contact->where('contact_type','phone')->count()>0)
                                        <x-input-label class="mt-5" value="Phone"/>
                                        <ul class="divide-y divide-gray-400 dark:divide-gray-600 ">
                                            @foreach($profile->contact->where('contact_type','phone') as $contact)
                                                <li class="py-2">
                                                    <div class="font-medium">
                                                        {{$contact->contact}}
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if($profile->contact->where('contact_type','fax')->count()>0)
                                        <x-input-label class="mt-5" value="Fax"/>
                                        <ul class="divide-y divide-gray-400 dark:divide-gray-600 ">
                                            @foreach($profile->contact->where('contact_type','Fax') as $contact)
                                                <li class="py-2">
                                                    <div class="font-medium">
                                                        {{$contact->contact}}
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if($profile->contact->where('contact_type','email')->count()>0)
                                        <x-input-label class="mt-5" value="Email"/>
                                        <ul class="divide-y divide-gray-400 dark:divide-gray-600 ">
                                            @foreach($profile->contact->where('contact_type','email') as $contact)
                                                <li class="py-2">
                                                    <div class="font-medium">
                                                        {{$contact->contact}}
                                                    </div>

                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if($profile->projects->count() > 0)
                                   <x-input-label value=" Project names" />
                                    <ul class="divide-y divide-gray-400 dark:divide-gray-600 ">
                                        @foreach($profile->projects as $project)
                                            <li class="py-2">
                                                <div class="font-medium">

                                                    <a href="{{route("iptbm.admin.iptbm_profiles.profile-projects.view",['project'=>$project->id])}}" class="font-medium text-sky-600 dark:text-sky-500 hover:underline">
                                                        {{$project->project_name}}
                                                    </a>
                                                </div>
                                                <div class="mt-2">
                                                    Total Budget :
                                                   <div>
                                                    <span class="fa-solid fa-peso-sign"></span>   {{number_format($project->projectDetails->sum('year_budget'),2)}}
                                                   </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif

                            </td>
                            <td>
                                <ul class="list-disc divide-y divide-gray-400 dark:divide-gray-600">
                                    @foreach($profile->technologies as $technology)
                                        <li class="list-item ms-4 py-4">
                                            {{$technology->title}}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <div class="w-full h-full flex justify-start gap-4 items-center">
                                    <a href="{{ route('iptbm.admin.iptbm_profiles.view-profile',['profile'=>$profile->id]) }}">
                                        <x-secondary-button class="text-sky-600 dark:text-sky-600">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                                <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                                <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                            </svg>
                                        </x-secondary-button>
                                    </a>

                                    <x-danger-button>
                                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                        </svg>
                                    </x-danger-button>
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
        var table = $('#profiletable').DataTable({

            pagingType: 'full_numbers',
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
                    className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0'
                },
                {
                    extend: 'columnToggle',
                    className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
                    columns: '.action',
                    text:'Action'

                },
                {
                    className: 'bg-white reset text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
                    text:'<i class="fa-solid fa-arrow-rotate-right"></i> Reset'

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
        table.columns( ['.agencies','.projects','.contact','.technology'] ).visible( false,false );


    </script>
@endsection
