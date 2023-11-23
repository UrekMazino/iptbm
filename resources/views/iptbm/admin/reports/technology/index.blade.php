@extends('iptbm.admin.reports.index')

@section('sub-content')
    <div class="container">
        <div class="my-3">

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
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
                ajax: '{{route("iptbm.admin.addrecord.get_regions")}}',
                stateSave: true,
                pagingType: 'full_numbers',
                horizontalScroll: true,
                dom: 'Bfrtip',

                buttons: [
                    'pageLength',
                    'colvis',
                    'excel',
                    'pdf',
                    {
                        text: '<span class="fa-solid fa-plus-square me-2"></span> new Record',
                        class: 'blue',
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
                    {data: 'name'},
                    {
                        data: 'consortium',
                        visible: false
                    },
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
