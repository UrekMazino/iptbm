<div class="w-full">

    <x-pop-modal name="addAgencyAbh" class="max-w-xl" static="true" modal-title="Add new user account">
        <form class="space-y-6" wire:submit.prevent="save_form">
            <div class="space-y-4">
                <div>
                    <x-input-label value="Agency"/>
                    <x-text-input wire:model="agency_model" list="agencyList" type="search" class="w-full" placeholder="enter text here" required/>
                    <x-data-list id="agencyList">
                        @foreach($agencies as $agency)
                            <option value="{{$agency->name}}"></option>
                        @endforeach
                    </x-data-list>
                    <x-input-error :messages="$errors->get('agency_model')"/>

                </div>
                <div>
                    <x-input-label value="Full name"/>
                    <x-text-input wire:model.lazy="full_name" class="w-full" placeholder="Enter full name here" required/>
                    <x-input-error :messages="$errors->get('full_name')"/>
                </div>
                <div>
                    <x-input-label value="Email Address"/>
                    <x-text-input wire:model.lazy="email" class="w-full" type="email" placeholder="Enter email here" required/>
                    <x-input-error :messages="$errors->get('email')"/>
                </div>
            </div>

            @if(session()->has('message'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div wire:ignore wire:poll="count_down">
                        <span class="font-medium">Success alert!</span> {{session('message')}} {{$countdown}}
                    </div>
                </div>
            @endif

            <div>
                <x-submit-button class="min-w-full" wire:target="save_form" wire:loading.attr="disabled">
                    <div class="w-full text-center p-2" wire:loading.remove wire:target="save_form">
                        Submit
                    </div>
                    <div class="w-full text-center p-2" wire:loading wire:target="save_form">
                        Processing...
                    </div>
                </x-submit-button>
            </div>
        </form>
    </x-pop-modal>
    <nav wire:ignore
         class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-between items-center">
                <div class="ps-4">
                    <x-secondary-button data-modal-toggle="addAgencyAbh" class="text-sky-700 dark:text-sky-500">
                        Add new User Account
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

    <div class=" md:px-4">
        <x-header-label class="mt-10">
            ABH User accounts
        </x-header-label>
        <x-card-panel   wire:ignore>
            <table id="regTable"
                   class="w-fit display cell-border stripe table-auto  hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Agency
                    </th>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Updated
                    </th>
                    <th scope="col"
                        class="px-6 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                       Status
                    </th>
                    <th scope="col"
                        class="px-6 action w-44 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                        Actions
                    </th>
                </tr>
                <tr class="border-0 filters">
                    <th scope="col"
                        class="px-6 fil  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    </th>
                    <th scope="col"
                        class="px-6 fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    </th>
                    <th scope="col"
                        class="px-6 fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    </th>
                    <th scope="col"
                        class="px-6 fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    </th>
                    <th scope="col"
                        class="px-6 fil py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                    </th>
                    <th scope="col"
                        class="px-6 action w-44 py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    </th>
                </tr>
                </thead>

                <tbody  >
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->abh_profile->agency->name}}
                        </td>
                        <td>
                            {{$user->updated_at->format('F-d-Y')}}
                        </td>
                        <td>
                            <div class="divide-y mx-auto w-fit divide-gray-200 dark:divide-gray-600">
                                <div>
                                    @if($user->trashed())
                                        <div class="text-red-600 text-xl font-medium">
                                            Disabled
                                        </div>
                                    @else
                                        <div class="text-green-600 text-xl font-medium">
                                            Active
                                        </div>

                                    @endif
                                </div>
                                <div>
                                    @if($user->trashed())
                                        {{$user->deleted_at->format('F-d-Y')}}
                                    @else
                                        {{$user->updated_at->format('F-d-Y')}}
                                    @endif

                                </div>
                            </div>
                        </td>
                        <td>
                            <x-link-button :url="route('abh.admin.all_accounts_details',['account'=>$user->id])">
                                Update
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

        $(document).ready(function(){
            var table = $('#regTable').DataTable({
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
            table.columns(['.id','.user_account','.cate_created']).visible(false, false);
            $('.reset').click(function (e) {
                table.colReorder.reset();
            });
        })
    </script>
@endsection
