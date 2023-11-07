@extends('layouts.iptbm.staff')

@section('title')
    {{"| IP-management"}}
@endsection

@section('meta_data')
    <meta name="description" content=" Technologies under IP protection application">
@endsection

@section('content')
    <div class="w-full">
        <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="flex justify-between items-center">
                    <div  class="me-4 p-4">
                        <button data-modal-target="addIpman" data-modal-toggle="addIpman" class="bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0  hover:border-0 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            New Application
                        </button>

                    </div>
                    <div id="searchPan" class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                        <div id="botNav" >

                        </div>
                    </div>

                </div>


            </nav>
        </nav>


        <div class="px-4 w-full mt-10">

            <livewire:iptbm.staff.ip-management.add-ip-tech :technologies="$technologies"/>
            <x-header-label>
                Technologies under IP protection application
            </x-header-label>
           <x-card>
               <div class="relative overflow-x-auto  p-2 w-full ">
                   <table id="iptbmIpAlertTable" class="w-fit display cell-border stripe table-auto md:table-fixed hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                       <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                       <tr class="border-0 ">
                           <th scope="col" class=" py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                               Date of Filing
                           </th>
                           <th scope="col" class="py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                               IP Type
                           </th>
                           <th scope="col" class="py-3 agent border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                               Agent Name
                           </th>
                           <th scope="col" class="py-3 ipstatus border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                               Protection Status
                           </th>
                           <th scope="col" class="py-3 abstract border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                               Abstract
                           </th>

                           <th scope="col" class="py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                               Technology
                           </th>


                           <th scope="col" class="py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                               Application #
                           </th>




                           <th scope="col" class=" task py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                               Tasks
                           </th>



                           <th scope="col" class="py-3 totalcost border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                               Total Cost
                           </th>


                           <th scope="col" class="action py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                               Actions
                           </th>
                       </tr>
                       <tr class="border-0 filters">
                           <th scope="col" class="fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                           </th>
                           <th scope="col" class="fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                           </th>
                           <th scope="col" class="fil py-3 agent border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                           </th>
                           <th scope="col" class="fil py-3 ipstatus border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                           </th>
                           <th scope="col" class="fil py-3 abstract border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                           </th>

                           <th scope="col" class="fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                           </th>


                           <th scope="col" class="fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                           </th>




                           <th scope="col" class="fil  task py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                           </th>



                           <th scope="col" class="fil py-3 totalcost border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                           </th>


                           <th scope="col" class="read-only  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                           </th>
                       </tr>
                       </thead>


                       <tbody>

                       @foreach($tech as $item)

                           @if($item->ip_applications )
                               @foreach($item->ip_applications as $val)
                                   <tr>
                                       <td class="py-2 ">
                                           <div class="whitespace-nowrap">
                                               {{\Carbon\Carbon::parse($val->date_of_filing)->format('F-d-Y')}}
                                           </div>

                                       </td>
                                       <td>
                                           {{$val->ip_type->name}}
                                       </td>
                                       <td>
                                           <ul class="ms-3 list-disc">
                                               @foreach($val->patent_agent as $agent)
                                                   <li>
                                                       {{$agent->name}}
                                                   </li>
                                               @endforeach
                                           </ul>

                                       </td>
                                       <td>
                                           @if($val->protectionStatus)
                                               {{$val->protectionStatus->protection_status}}
                                           @endif

                                       </td>
                                       <td>
                                           {{$val->abstract}}

                                       </td>
                                       <td>
                                           <a class="link-primary text-decoration-none" href="{{route("iptbm.staff.technology.show",["id"=>$item->id])}}">
                                               {{$item->title}}
                                           </a>
                                       </td>

                                       <td>
                                           {{$val->application_number}}
                                       </td>
                                       <td>
                                           <livewire:iptbm.staff.ip-management.task-collection wire:key="taskcollection-{{$val->id}}" :alert="$val" />
                                       </td>
                                       <td>
                                           <x-input-label>
                                               <span class="fa-solid ms-2 fa-peso-sign"></span>
                                               {{number_format($val->expenses->sum('amount'),2)}}
                                           </x-input-label>

                                       </td>
                                       <td class="py-2 ">
                                           <div class=" w-fit flex justify-evenly items-center">
                                               <div id="applicationDetail" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-800">
                                                   View Details
                                                   <div class="tooltip-arrow" data-popper-arrow></div>
                                               </div>


                                               <a data-tooltip-target="applicationDetail"  href="{{route("iptbm.staff.ip-management.application.index",["id"=>$val->id])}}"
                                                  class="ms-4">
                                                   <span class="fa-solid fa-eye"></span>
                                               </a>

                                               <div id="taskList" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-800">
                                                   IP Tasks
                                                   <div class="tooltip-arrow" data-popper-arrow></div>
                                               </div>

                                               <a  data-tooltip-target="taskList"  href="{{route("iptbm.staff.ip-alert.task",['id'=>$val->id])}}"
                                                   class="ms-4 me-4">
                                                   <span class="fa-solid fa-list-check"></span>
                                               </a>
                                               <livewire:iptbm.staff.ip-management.delete-ip-tech :ipAlert="$val"/>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach
                           @endif
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
        $(document).ready(function(){


            var table = $('#iptbmIpAlertTable').DataTable({


                pagingType: 'full_numbers',

                horizontalScroll:true,
                dom: 'Bfrtip',
                autoWidth:false,
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
                                extend:'excel',
                                text:'Excel',
                                className:'w-5',
                                messageTop:'Technologies under Commercialization Adopter',
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
                                        messageTop:'Technologies under Commercialization Adopter'
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
                                        messageTop:'Technologies under Commercialization Adopter'
                                    },
                                ]
                            },


                            {
                                extend:'print',
                                text:'Print',
                                messageTop:'Technologies under Commercialization Adopter',
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
            table.columns( ['.ipstatus','.agent','.abstract','.totalcost','.task'] ).visible( false,false );



        });


    </script>
@endsection
