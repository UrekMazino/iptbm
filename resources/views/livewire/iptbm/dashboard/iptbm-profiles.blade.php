<div class="rounded-none md:rounded-lg bg-gradient-to-tr from-sky-700 to-sky-300 ">
    <x-pop-modal name="crypto-modal-iptbmProf" class="max-w-5xl" modal-title="Total IP-TBMs Profiles">
        <x-card>
            <div class="relative overflow-x-auto ">
                <table id="patentTableDash" style="width:100%"
                       class="w-fit display cell-border stripe table-auto  hover text-sm  rounded text-left text-gray-500  border-gray-300 dark:border-gray-600  dark:text-gray-400">
                    <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="border-0 ">


                        <th scope="col"
                            class="  px-6 py-3 border border-gray-300 dark:border-gray-600 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Agency
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($iptbmProfiles->iptbms as $profile)

                        <tr>
                            <td class="w-full">

                                @if($profile->agency)
                                    <a href="{{route("iptbm.staff.viewProfile",['id'=>$profile->id])}}"
                                       class="font-medium hover:text-gray-900 hover:dark:text-white hover:underline">
                                        {{$profile->agency->name}}
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </x-card>
    </x-pop-modal>
    <div class="p-2  grid grid-cols-4">
        <div class="col-span-3 text-gray-50">
            <h1 class="text-3xl font-bold">
                {{$iptbmProfiles->iptbms->count()}}
            </h1>

            <div class=" font-medium">

                Total number of IP-TBMs
            </div>
        </div>
        <div class="justify-content-center flex items-center">

            <svg class="opacity-50 m-auto h-20 w-20 p-2" xmlns="http://www.w3.org/2000/svg" height="1em"
                 viewBox="0 0 576 512">
                <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path
                    d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
            </svg>
        </div>
    </div>
    <div class="rounded-b-lg bg-sky-900 bg-opacity-75 py-2 text-center">

        <button data-modal-target="crypto-modal-iptbmProf" data-modal-toggle="crypto-modal-iptbmProf"
                class="text-center text-gray-300 font-medium text-lg hover:text-blue-400 duration-300 transition active:text-blue-600">
            View List
            <span class="fa-solid fa-circle-arrow-right"></span>
        </button>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#patentTableDash').DataTable({
                pagingType: 'full_numbers',
                horizontalScroll: true,
                dom: 'Bfrtip',

                buttons: [
                    {
                        extend: 'pageLength',
                        text: '<i class="fa-regular fa-file-lines"></i> Page Length',
                        className: 'bg-white text-blue-500  dark:bg-gray-700 dark:text-sky-500 w-full md:w-fit border-0 my-1 md:my-3  hover:border-0',
                    },


                    // Add more buttons here
                ],

            });

        })
    </script>
@endpush
