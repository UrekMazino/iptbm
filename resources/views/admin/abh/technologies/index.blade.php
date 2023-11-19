
@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: technologies"}}
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
                IP-TBM Technologies
            </x-header-label>
            <x-card>
                <div class="relative overflow-x-auto ">
                    <table id="iptbmtech" style="width:100%" class="w-fit display cell-border stripe table-auto  hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                        <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="border-0 ">

                            {{------------
                             <th scope="col" class=" px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                 Technology Photo
                             </th>
                            -----------------}}
                            <th scope="col" class=" px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Title
                            </th>
                            <th scope="col" class=" descrp px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Description
                            </th>
                            <th scope="col" class=" industry px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Industry
                            </th>
                            <th scope="col" class=" commodity px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Commodity
                            </th>
                            <th scope="col" class=" category px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Category
                            </th>
                            <th scope="col" class=" px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Tech Owner
                            </th>
                            <th scope="col" class=" px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Inventor
                            </th>
                            <th scope="col" class=" research  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Researches
                            </th>
                            <th scope="col" class=" ipapp  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                IP Application
                            </th>
                            <th scope="col" class=" techStat  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Tech Status
                            </th>
                            {{---------
                            <th scope="col" class=" delete  px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Delete Request
                            </th>
                            -----------}}
                            <th scope="col" class=" action px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                        <tr class="border-0 filters">
                            {{------
                            <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            </th>
                            ----}}
                            <th scope="col" class="fil border border-gray-300 dark:border-gray-600  bg-gray-50 dark:bg-gray-700 ">
                                Title
                            </th>
                            <th scope="col" class="fil  border border-gray-300 dark:border-gray-600  bg-gray-50 dark:bg-gray-700 ">
                                Description
                            </th>
                            <th scope="col" class=" fil  border border-gray-300 dark:border-gray-600  bg-gray-50 dark:bg-gray-700 ">
                                Industry
                            </th>
                            <th scope="col" class="fil   border border-gray-300 dark:border-gray-600  bg-gray-50 dark:bg-gray-700 ">
                                Commodity
                            </th>
                            <th scope="col" class="fil   border border-gray-300 dark:border-gray-600  bg-gray-50 dark:bg-gray-700 ">
                                Category
                            </th>
                            <th scope="col" class=" fil  border border-gray-300 dark:border-gray-600  bg-gray-50 dark:bg-gray-700 ">
                                Tech Owner
                            </th>
                            <th scope="col" class="fil   border border-gray-300 dark:border-gray-600  bg-gray-50 dark:bg-gray-700 ">
                                Inventor
                            </th>
                            <th scope="col" class="fil  border border-gray-300 dark:border-gray-600  bg-gray-50 dark:bg-gray-700 ">
                                Researches
                            </th>
                            <th scope="col" class="fil  border border-gray-300 dark:border-gray-600  bg-gray-50 dark:bg-gray-700 ">
                                IP Application
                            </th>

                            <th scope="col" class="fil  border border-gray-300 dark:border-gray-600  bg-gray-50 dark:bg-gray-700 ">
                                Tech Status
                            </th>


                            <th scope="col"  class="read-only  border border-gray-300 dark:border-gray-600  bg-gray-50 dark:bg-gray-700 ">

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($technologies as $technology)
                            <tr>
                                {{--
                                 <td>
                                     <x-thumbnail-holder :url="$technology->tech_photo?? null" class="w-36 rounded-lg p-2 mx-auto" />
                                 </td>
                                --}}

                                <td>
                                    {{$technology->title}}
                                </td>
                                <td>
                                    {{$technology->tech_desc}}
                                </td>
                                <td>
                                    <ul class="list-disc">
                                        @foreach($technology->industries as $val)
                                            <li class="list-item ms-4 py-2">
                                                {{$val->industry->name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-disc">
                                        @foreach($technology->industries()->whereHas('commodities')->get() as $val)
                                            <li class="list-item ms-4 py-2">
                                                {{$val->industry->name}}
                                                <ul>
                                                    @foreach($val->commodities as $value)
                                                        <li>
                                                            {{$value->commodity}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-disc">
                                        @foreach($technology->industries()->whereHas('categories')->get() as $val)
                                            <li class="list-item ms-4 py-2">
                                                {{$val->industry->name}}
                                                <ul>
                                                    @foreach($val->categories as $value)
                                                        <li>
                                                            {{$value->category}}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-disc">
                                        @foreach($technology->owner as $val)
                                            <li class="list-item ms-4 py-2">
                                                {{$val->agency->name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-disc">
                                        @foreach($technology->techgenerators as $generator)
                                            <li class="list-item ms-4 py-2">
                                                {{$generator->inventor->name." ".(($generator->inventor->middle_name)? $generator->inventor->middle_name.".":" ")." ".$generator->inventor->last_name." ".$generator->inventor->suffixes }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="break-words">
                                    <ul class="divide-y divide-gray-400 dark:divide-gray-600" >
                                        @foreach($technology->researchprojects as $val)
                                            <li class="py-4">
                                                <div class="space-y-2">

                                                    <x-input-label :value="$val->title"/>
                                                    <div>
                                                        Funding Agencies
                                                        <ul class="list-disc ps-4 mb-2">
                                                            @foreach($val->funder as $fund)
                                                                <li>
                                                                    {{$fund->agency->name}}
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        Amount Invested
                                                        <div class="flex">
                                                        <span class="fa-solid fa-peso-sign me-2">
                                                        </span>
                                                            <x-input-label :value="number_format($val->amount,2)"/>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        Industry Partner
                                                        <ul class="list-disc ps-4">
                                                            @foreach($val->researchpartners as $partner)
                                                                <li>
                                                                    <x-input-label :value="$partner->industry_name"/>
                                                                    <div>
                                                                        {{$partner->address}}
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-disc">
                                        @foreach($technology->ip_applications as $application)
                                            <li class="list-item ms-4 py-2">

                                                <a href="{{route("iptbm.admin.ip-application-report.task",['task'=>$application->ip_type->id])}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                    {{$application->ip_type->name}}
                                                </a>

                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul class="list-disc">
                                        @foreach($technology->statuses as $status)
                                            <li class="list-item ms-4 py-2">
                                                {{$status->status}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                              {{-------------
                                <td>
                                    <div class="w-fit flex justify-center items-center m-auto p-0">
                                        <div id="deleteModal-confirm-{{$technology->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                                <!-- Modal content -->
                                                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal-confirm-{{$technology->id}}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                    <p class="mb-4 text-gray-500 dark:text-gray-300">A User request to delete this technology. This will be permanently removed from the system</p>
                                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>
                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button data-modal-toggle="deleteModal-confirm-{{$technology->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                            Cancel
                                                        </button>
                                                        <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                            confirm
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <x-secondary-button class=" m-auto w-fit" data-modal-toggle="deleteModal-confirm-{{$technology->id}}">
                                            Delete Request
                                        </x-secondary-button>
                                    </div>
                                </td>
                              -----------}}
                                <td>
                                    <livewire:iptbm.admin.technology.technology-control wire:key="tech-admin-del-{{$technology->id}}" :technology="$technology" />
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
        var table = $('#iptbmtech').DataTable({
           // stateSave: true,
            pagingType: 'full_numbers',
            horizontalScroll:true,
            dom: 'Bfrtip',
            orderCellsTop: true,
            search: {
                "smart": true,
                className:'bg-red-600'
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
                    extend:'pageLength',
                    text:'<i class="fa-regular fa-file-lines"></i> Page Length',
                    className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                },
                {
                    extend: 'collection',
                    text: '<i class="fa-solid fa-circle-check"></i> Toggle',
                    className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                    buttons: [
                        {
                            extend: 'columnToggle',
                            className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
                            columns: '.action',
                            text:'Action'

                        },

                        {
                            extend: 'columnToggle',
                            className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-3 hover:border-0',
                            columns: '.delete',
                            text:'Delete Request'

                        },
                    ]
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
        table.columns( ['.agencies','.projects','.contact','.technology','.industry','.commodity','.category','.descrp','.research','.ipapp'] ).visible( false,false );


    </script>
@endsection
