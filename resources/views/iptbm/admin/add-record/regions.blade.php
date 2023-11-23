@extends('iptbm.admin.add-record.index')

@section('sub-content')
    <div class="container-fluid">

        <div class="relative overflow-x-auto my-4">
            <table class="w-100 text-sm border border-gray-500 rounded text-left text-gray-500 dark:text-gray-400"
                   id="regTable">
                <thead class="text-base text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">
                        Region
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Consortium
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Consortium Director
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>


    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function format(d) {


                let div = $('<div class="mb-5">');
                let list = $('<ul class="list-group my-2 mb-3 ms-3">')
                if (d.agencies.length > 0) {
                    div.append($('<span class="text-muted fw-bold">').text("Agencies:"))
                    $.each(d.agencies, function (index, agency) {
                        list.append($('<li class="list-group-numbered">').append(
                            $('<a  href="#" class="link-primary text-decoration-none">').text(agency.name)
                        ))
                    })
                    div.append(list)
                    div.append($('<a class="btn btn-sm btn-outline-primary" href="#">').append(
                        $('<span class="fa-solid fa-plus-square me-2">'),
                        $('<span class="">').text("Add new Agency")
                    ))
                }

                return div
            }

            var table = $('#regTable').DataTable({
                rowCallback: function (row, data) {
                    $(row).addClass('bg-gray-800 border-b text-base dark:bg-gray-800 dark:border-gray-700 transition duration:300 dark:hover:text-gray-50 hover:bg-gray-200 dark:hover:bg-gray-600');
                },
                ajax: '{{route("iptbm.admin.addrecord.get_regions")}}',
                stateSave: true,
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
                        extend: 'pdf',
                        text: 'pdf',
                        className: 'bg-gray-700 dark:bg-gray-600'
                    },

                    {
                        text: '<span class="fa-solid fa-plus-square me-2"></span> new Record',
                        className: 'bg-gray-700 dark:bg-gray-600',
                        action: function (e, dt, node, config) {
                            window.location.href = "{{ route("iptbm.admin.addrecord.add_region")}}"
                        }
                    }
                    // Add more buttons here
                ],
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '',
                    },
                    {
                        data: 'name',
                        className: 'py-2'
                    },
                    {data: 'consortium'},
                    {data: 'consortium_director'},
                    {
                        data: null,
                        render: function (data) {
                            return $('<div>').append(
                                $('<a href="{{route("iptbm.admin.editregion.index")}}" class="btn btn-sm btn-outline-primary me-2">').append(
                                    $('<span class="fa-solid fa-pen-square">')
                                ),
                                $('<a href="#" class="btn btn-sm btn-outline-danger">').append(
                                    $('<span class="fa-solid fa-trash-can">')
                                ),
                            ).html();

                        }
                    }
                ],
                order: [[1, 'asc']],
            });
            // Add event listener for opening and closing details

            $('#regTable tbody').on('click', 'td.dt-control', function () {

                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
        });
    </script>
@endsection
