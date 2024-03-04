<div class="flex justify-center items-center">
    <div class="w-full ">
        <div class="text-3xl font-bold text-white">
            34
        </div>
        <div class="text-white font-medium text-md">
            Total number of ABH Tech Transfer
        </div>
    </div>
    <div class="justify-center">
        <svg class="opacity-50 m-auto h-20 w-20 p-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.828 10h6.239m-6.239 4h6.239M6 1v4a1 1 0 0 1-1 1H1m14-4v16a.97.97 0 0 1-.933 1H1.933A.97.97 0 0 1 1 18V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2Z"></path>
        </svg>
    </div>
    <x-pop-modal class="max-w-4xl" name="{{$modal_id}}">
        <div class="relative overflow-x-auto text-gray-700 dark:text-gray-50">
            <table id="totalTechTransAd" style="width:100%"
                   class="w-fit display cell-border stripe table-auto  hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class="border-0 ">
                    <th scope="col"
                        class=" whitespace-nowrap px-10 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Region
                    </th>

                    <th scope="col"
                        class="  px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Agency
                    </th>
                </tr>

                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </x-pop-modal>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#totalTechTransAd').DataTable({

                pagingType: 'full_numbers',
                horizontalScroll: true,
                dom: 'Bfrtip',
                rowGroup: {
                    startRender: function (rows, group) {
                        return group + ' ( ' + rows.count() + ' IP-TBMs Profile )';
                    }
                },

                scroller: {
                    rowHeight: 300
                },
                buttons: [

                    {
                        extend: 'pageLength',
                        text: '<i class="fa-regular fa-file-lines"></i> Page Length',
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                    },


                    // Add more buttons here
                ],

            });
            table.columns(['.abstract']).visible(false, false);
        })
    </script>
@endpush
