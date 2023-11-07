@extends('admin.iptbm.layout.app')
@section('title')
    {{__("| admin: Accounts")}}
@endsection

@section('content')
    <div class="w-full">

        <livewire:iptbm.admin.account.add-account />
        <nav class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="block md:flex justify-between items-center">
                    <div  class="me-4 p-4">
                        <x-secondary-button data-modal-toggle="addAccount" class="text-sky-600 dark:text-sky-600">
                            <div class="flex justify-start items-center">
                                <svg class="w-5 me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512">
                                    <path d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
                                </svg>
                                <div>
                                    Add new Users Account
                                </div>
                            </div>
                        </x-secondary-button>
                    </div>
                    <div id="searchPan" class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                        <div id="botNav" >

                        </div>
                    </div>


                </div>



            </nav>

        </nav>
        <div class="px-4 w-full mt-5">
            <x-header-label>
                IPTBM Users Account
            </x-header-label>
            <div class="relative overflow-x-auto  shadow-lg w-full p-4 bg-white dark:bg-gray-800 mt-2 rounded-lg text-gray-600 dark:text-white">
                <table id="accountTable" class="w-fit display cell-border stripe table-auto md:table-fixed hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    <tr>
                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            Agency
                        </th>
                        <th scope="col" class="action px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                            Action
                        </th>
                    </tr>
                    <tr class="border-0 filters">
                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        </th>
                        <th scope="col" class="fil px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                        <th scope="col" class=" px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="py-2 px-2">
                                {{$user->email}}
                            </td>
                            <td class="py-2 px-2">
                                {{$user->name}}
                            </td>
                            <td class="py-2 px-2">
                                {{$user->profile->agency->name}}
                            </td>
                            <td class="py-2 px-2">
                                <a href="{{route("iptbm.admin.addrecord.editaccount",['id'=>$user->id])}}">
                                   <x-secondary-button>
                                       Update
                                   </x-secondary-button>
                                </a>

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
        $(document).ready(function(){
            var table = $('#accountTable').DataTable({
                stateSave: true,
                pagingType: 'full_numbers',
                colReorder: true,
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
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                    },
                    {
                        extend: 'columnToggle',
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                        columns: '.action',
                        text:'Action'

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


            $('.reset').click( function (e) {
                table.colReorder.reset();
            } );
        })
    </script>
@endsection
