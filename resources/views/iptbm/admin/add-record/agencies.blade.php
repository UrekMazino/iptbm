@extends('iptbm.admin.add-record.index')

@section('sub-content')
    <div class="container-fluid">
        <div class="relative overflow-x-auto my-4">
            <table class="w-100 text-sm border border-gray-500 rounded text-left text-gray-500 dark:text-gray-400"
                   id="agencyTable">
                <thead class="text-base text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">
                        Agency
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Region
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Agency Head
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        Silver
                    </td>
                </tr>
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


                let div = $('<div class="mb-3">');
                let headsDiv = $('<div>')
                $.each(d.head, function (index, data) {
                    headsDiv.append(
                        $('<div>').append(
                            $('<div class="fw-bold text-muted">').text('Agency Heads'),
                            $('<ul class="list-group w-auto">').append(
                                $('<li class="list-group-numbered text-center ">').append(
                                    $('<div class="row ms-5">').append(
                                        $('<div class="col-md-auto">').append(
                                            $('<div class="fw-bold border-bottom">').text(data.head),
                                            $('<div class="text-muted">').text(data.designation)
                                        ),
                                    ),
                                    $('<div class="row my-2 ms-5">').append(
                                        $('<div class="col-md-auto text-start">').append(
                                            $('<div class="text-muted fw-bold">').text('Contact Details'),
                                            $('<ul class="list-group ">').append(function () {
                                                let frag = $(document.createDocumentFragment())
                                                if (data.email) {
                                                    frag.append($('<li class="list-group-numbered">').append(
                                                        $('<span class="text-muted">').text("Email: "),
                                                        $('<span >').text(data.email)
                                                    ))

                                                }
                                                if (data.mobile) {
                                                    frag.append($('<li class="list-group-numbered">').append(
                                                        $('<span>').text("Mobile: "),
                                                        $('<span >').text(data.mobile)
                                                    ))

                                                }
                                                if (data.fax) {
                                                    frag.append($('<li class="list-group-numbered">').append(
                                                        $('<span>').text("Fax: "),
                                                        $('<span >').text(data.fax)
                                                    ))

                                                }
                                                if (data.tel) {
                                                    frag.append($('<li class="list-group-numbered">').append(
                                                        $('<span>').text("Phone: "),
                                                        $('<span >').text(data.tel)
                                                    ))

                                                }
                                                return frag
                                            })
                                        )
                                    )
                                )
                            )
                        )
                    )
                })

                return div.append(headsDiv)
            }

            var table = $('#agencyTable').DataTable({
                rowCallback: function (row, data) {
                    $(row).addClass('bg-gray-800 border-b text-base dark:bg-gray-800 dark:hover:text-gray-50 dark:border-gray-700 transition duration:300 hover:bg-gray-200 dark:hover:bg-gray-600');
                },
                ajax: '{{route("iptbm.admin.addrecord.get_agencies")}}',

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
                            window.location.href = "{{ route("iptbm.admin.addrecord.add_agency")}}"
                        }
                    }
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
                        className: 'py-3'
                    },
                    {data: 'region.name'},
                    {data: 'address'},

                    {
                        data: null,
                        render: function (data) {
                            return `<button class="btn btn-sm btn-outline-danger"><span class="fa-solid fa-trash-can"></span></button>`
                        }
                    }
                ],
                order: [[1, 'asc']],
            });

            // Add event listener for opening and closing details
            $('#agencyTable tbody').on('click', 'td.dt-control', function () {
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
