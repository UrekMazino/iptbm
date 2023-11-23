@extends('layouts.iptbm.admin')

@section('title')
    {{"| admin"}}
@endsection



@section('content')

    <livewire:iptbm.admin-dashboard.admin-dash-board/>

@endsection
@section('script')

    <script type="text/javascript">

        $(document).ready(function () {
            $('#ip_tbm').DataTable({
                // serverSide: true,
                stateSave: true,
                pagingType: 'full_numbers',
            });

        })

    </script>

@endsection
