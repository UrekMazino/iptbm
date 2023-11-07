
@extends('layouts.iptbm.admin')

@section('title')
    {{"| admin: add record"}}
@endsection

@section('content')
    <div class="container-fluid my-3">
        <div class="row my-2 mb-2">
            <div class="col-md-12 p-4">
                <table class="w-100  border border-gray-500 rounded text-left text-gray-500 dark:text-gray-400" id="iptbmprof">
                    <thead class="text-base text-gray-700 uppercase bg-gray-400 dark:bg-gray-700 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Project Leader
                        </th>
                        <th scope="col" class="px-6 py-3">
                            IP-TBM Manager
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Agency
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
                console.log(d);
                return $(`<div>`).html(`<div class="card">
      <div class="card-header">
        <h5 class="mb-0">Profile Information</h5>
      </div>
      <div class="card-body">
 <div class="contact-info">
          <i class="fas fa-user mr-2"></i><span class="fw-bold text-muted">Region: </span>${(d.agency.region.name)? d.agency.region.name:"No data available"}
        </div>
        <div class="contact-info">
          <i class="fas fa-user mr-2"></i><span class="fw-bold text-muted">RRDCC Chair: </span>${(d.agency.region.rrdcc_chair)? d.agency.region.rrdcc_chair:"No data available"}
        </div>
        <div class="contact-info">
          <i class="fas fa-user mr-2"></i><span class="fw-bold text-muted">Consortium Director:</span>${(d.consortium_dir)? d.consortium_dir:"No data available"}
        </div>
        <div class="contact-info">
          <i class="fas fa-building mr-2"></i><span class="fw-bold text-muted">Agency:</span>${(d.agency.name)? d.agency.name:"No data available"}
        </div>
        <div class="contact-info">
          <i class="fas fa-user-tie mr-2"></i><span class="fw-bold text-muted">Agency Head: </span>${(d.agency.head)? d.agency.head[0].head:"No data available"}
        </div>

      </div>
    </div>`)
            }
            var table = $('#iptbmprof').DataTable({

                ajax: '{{route("iptbm.admin.iptbm-profile.get-list")}}',

                pagingType: 'full_numbers',
                horizontalScroll:true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend:'pageLength',
                        text:'pageLength',
                        className: 'bg-gray-700 dark:bg-gray-600'
                    },
                    {
                        extend:'colvis',
                        text:'Visible Column',
                        className: 'bg-gray-700 dark:bg-gray-600'
                    },
                    {
                        extend:'excel',
                        text:'excel',
                        className: 'bg-gray-700 dark:bg-gray-600'
                    },

                    {
                        extend:'pdf',
                        text:'pdf',
                        className: 'bg-gray-700 dark:bg-gray-600'
                    },
                    {
                        text: '<span class="fa-solid fa-plus-square me-2"></span> new Record',
                        className: 'bg-gray-700 dark:bg-gray-600',
                        action: function ( e, dt, node, config ) {
                            window.location.href="{{ route("iptbm.admin.addrecord.add_agency")}}"
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
                        data: 'project_leader',
                        render: function(data, type, row) {
                            if (data === null) {
                                return 'No data available'; // Change the returned value for null data
                            }
                            return data;
                        }
                    },
                    {
                        data: 'manager',
                        render: function(data, type, row) {
                            if (data === null) {
                                return 'No data available'; // Change the returned value for null data
                            }
                            return data;
                        }
                    },
                    {
                        data:'agency.name',
                        className: 'py-2',
                    },



                    {
                        data: null,
                        render: function (data) {
                            let id = data.id;
                            let href = "{{ route('iptbm.admin.iptbm_profiles.profiles-details', ['id' => 'id_holder']) }}";

                            let dynamicHref = href.replace('id_holder', id);

                            return $('<div>').append(
                                $('<a class="btn btn-sm btn-outline-primary" role="button">').attr('href', dynamicHref).append(
                                    $('<span class="fa-solid fa-edit"></span>')
                                ),
                                /*
                                 $('<button class="btn btn-sm btn-outline-danger ms-2">').append(
                                     $('<span class="fa-solid fa-trash-can"></span>')
                                 )
                                 */
                            ).html();
                        }
                    }
                ],
                order: [[1, 'asc']],
            });

            // Add event listener for opening and closing details
            $('#iptbmprof tbody').on('click', 'td.dt-control', function () {
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
