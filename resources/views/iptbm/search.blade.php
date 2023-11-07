@extends('layouts.iptbm.admin')

@section('title')
    {{"| search"}}
@endsection

@section('content')
    <div class="container-fluid">
        @foreach($search as $key=>$item)
            <div class="row my-2">
                <div class="col-md-12">
                    something
                </div>
            </div>
        @endforeach
    </div>
@endsection
