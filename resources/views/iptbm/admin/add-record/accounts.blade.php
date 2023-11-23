@extends('iptbm.admin.add-record.index')

@section('sub-content')
    <div class="container-fluid">
        <div class="relative overflow-x-auto my-4">
            <table class="w-100 text-sm border border-gray-500  rounded text-left text-gray-500 dark:text-gray-400"
                   id="accountTable">
                <thead class="text-base text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Agency
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
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
                            {{$user->role}}
                        </td>
                        <td class="py-2 px-2">
                            {{$user->profile->agency->name}}
                        </td>
                        <td class="py-2 px-2">
                            <a href="{{route("iptbm.admin.addrecord.editaccount",['id'=>$user->id])}}">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z"/>
                                </svg>
                            </a>
                        </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            var table = $('#accountTable').DataTable({
                rowCallback: function (row, data) {
                    $(row).addClass('bg-gray-800 p border-b text-base dark:bg-gray-800 dark:border-gray-700 transition dark:hover:text-gray-50 duration:300 hover:bg-gray-200 dark:hover:bg-gray-600');
                },


                pagingType: 'full_numbers',
                horizontalScroll: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pageLength',
                        text: 'pageLength',
                        className: 'bg-gray-700 dark:bg-gray-600'
                    },
                    {
                        extend: 'colvis',
                        text: 'Visible Column',
                        className: 'bg-gray-700 dark:bg-gray-600'
                    },
                    {
                        extend: 'excel',
                        text: 'excel',
                        className: 'bg-gray-700 dark:bg-gray-600'
                    },
                    {
                        extend: 'csv',
                        text: 'csv',
                        className: 'bg-gray-700 dark:bg-gray-600'
                    },
                    {
                        extend: 'pdf',
                        text: 'pdf',
                        className: 'bg-gray-700 dark:bg-gray-600'
                    },

                    {
                        text: '<span class="fa-solid fa-plus-square me-2"></span> new Record',
                        className: 'bg-gray-700 dark:bg-gray-600',
                        action: function (e, dt, node, config) {
                            window.location.href = "{{ route("iptbm.admin.addrecord.add_account")}}"
                        }
                    }
                ],
                order: [[1, 'asc']],
            });


        })
    </script>
@endsection
