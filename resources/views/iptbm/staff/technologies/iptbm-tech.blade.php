@extends('layouts.iptbm.staff')

@section('title')
    {{"| technology"}}
@endsection

@section('content')
    <div class="w-full">
        <nav
            class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">


            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-end mx-auto p-4">

                    <div id="searchPan"
                         class="me-0 md:me-4 gap-4 justify-end items-center pb-4 md:pb-0 px-2 md:px-0  md:flex grid grid-cols-1 md:grid-cols-2">
                        <div id="botNav">

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
                <div class="relative p-2 overflow-x-auto w-full ">
                    <table id="allTech"
                           class="w-full table-fixed text-sm cell-border stripe hover rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                        <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col"
                                class=" py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Date Inserted
                            </th>
                            <th scope="col"
                                class=" py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Title
                            </th>

                            <th scope="col"
                                class=" py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Tech Owner
                            </th>
                            <th scope="col"
                                class="coOwn py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Co Owner
                            </th>
                            <th scope="col"
                                class="techYear py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Year
                            </th>
                            <th scope="col"
                                class="action w-fit py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Actions
                            </th>
                        </tr>
                        <tr class="border-0 filters">
                            <th class="fil  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Year
                            </th>
                            <th class="fil  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Title
                            </th>
                            <th class="fil   py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Agency
                            </th>
                            <th class="fil   py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Agency
                            </th>

                            <th class="fil  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                Year
                            </th>
                            <th class="  py-3 border border-gray-300 dark:border-gray-600 text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">


                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($technologies as $technology)
                            <tr>
                                <td>
                                    {{$technology->created_at->format('F-d-Y')}}
                                </td>

                                <td>
                                    {{$technology->title}}
                                </td>
                                <td>
                                    {{$technology->iptbmprofiles->agency->name}}
                                </td>
                                <td>

                                    <ul class="divide-y divide-gray-400 dark:divide-gray-600">
                                        @forelse($technology->owner as $agency)
                                            <li>
                                                {{$agency->agency->name}}
                                            </li>
                                        @empty
                                            No data available
                                        @endforelse

                                    </ul>
                                </td>
                                <td>
                                    {{$technology->year_developed}}
                                </td>
                                <td>
                                    <x-link-button
                                        :url="route('iptbm.staff.tech.public-view',['id'=>$technology->id])">
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 18 18">
                                            <path
                                                d="M0 6v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6H0Zm13.457 6.707-2.5 2.5a1 1 0 0 1-1.414-1.414l.793-.793H5a1 1 0 0 1 0-2h5.336l-.793-.793a1 1 0 0 1 1.414-1.414l2.5 2.5a1 1 0 0 1 0 1.414ZM9.043.8a2.009 2.009 0 0 0-1.6-.8H2a2 2 0 0 0-2 2v2h11.443L9.043.8Z"/>
                                        </svg>
                                    </x-link-button>
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
    <script>
        $(document).ready(function () {


            var table = $('#allTech').DataTable({


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
                        text: 'pageLength',
                        className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-1 hover:border-0',
                    },
                    {
                        extend: 'colvis',
                        text: 'Visible Column',
                        className: 'bg-white text-blue-500 dark:bg-gray-700 dark:text-sky-500 border-0 my-1 hover:border-0'
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
            table.columns(['.coOwn','.techYear']).visible(false, false);
        })

    </script>
@endsection
