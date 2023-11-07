
@extends('layouts.iptbm.admin')

@section('title')
    {{"| admin: add record"}}
@endsection

@section('content')
    <div class="sticky-md-top dark:bg-gray-800 py-2">
        <nav class="navbar navbar-expand-lg ">
            <div class="container ms-0 me-auto">
                <h4>Report Generator</h4>
            </div>
        </nav>
    </div>
    <div class="container my-3">
        <div class="row my-2 mb-2">
            <div class="col-md-12 p-4">
                <table class="table table-bordered bg-amber-50 table-striped" id="Report">
                    <thead>
                    <tr>
                       <th>
                       </th>
                        <th>
                            asdasd
                        </th>
                        <th>
                            asdasd
                        </th>
                        <th>
                            asdasd
                        </th>
                        <th>
                        </th>
                        <!-- Add more table headers here -->
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Populate table rows with filtered data using JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            var table = $('#Report').DataTable({
                ajax: '{{route("iptbm.admin.addrecord.get_regions")}}',
                stateSave: true,
                pagingType: 'full_numbers',
                horizontalScroll:true,
                dom: 'Bfrtip',
                searchPanes: {
                    layout: 'columns-2'
                },
                buttons: [
                    'pageLength',
                    'colvis',
                    'excel',
                    'pdf',
                    {
                        text: '<span class="fa-solid fa-plus-square me-2"></span> new Record',
                        class:'blue',
                        action: function ( e, dt, node, config ) {
                            window.location.href="{{ route("iptbm.admin.addrecord.add_region")}}"
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
                    { data: 'name' },
                    {
                        data: 'consortium',
                    },
                    { data: 'consortium_director' },
                    {
                        data: null,
                        render:function (data){
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
        })
    </script>
@endsection
