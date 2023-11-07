@extends('layouts.iptbm.staff')

@section('title')
    {{"| add-profile"}}
@endsection
@section('content')
    <div class="tab-pane fade show active "
         id="ex1-tabs-2"
         role="tabpanel"
         aria-labelledby="ex1-tab-2">
        <div class="row sticky-md-top py-2 pt-3 border-bottom bg-light">
            <div class="col-md-auto">
                <a href="{{route("iptbm.staff.ipProfile")}}" class="link-primary">
                    <span class="fa-solid fa-house h4"></span>
                </a>

            </div>
            <div class="col-md-auto">
                <div class="form-label fw-bold">
                    Create IP-TBM Profile
                </div>
            </div>
        </div>
        <div class="container-fluid py-3">
            <form method="post" action="{{route("iptbm.addNewProfile")}}">
                @csrf
                <input type="hidden" value="{{$agency->id}}" name="agency_id">
                <input type="hidden" value="{{$region->id}}" name="region_id">
                <div class="card col-md-7 m-auto my-5 shadow">
                    <div class="card-header bg-dark bg-opacity-25">
                        <div class="fw-bold ">
                            IP-TBM Profile
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md">
                                <div class="form-label text-center">
                                    <div class="fw-bold text-uppercase">
                                        {{$agency->name}}
                                    </div>
                                    <div class="fw-bold text-muted">
                                        {{$region->name}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md">
                                <label class="form-label fw-bold mb-2 text-center col-md-7 text-uppercase" for="agHed">
                                    Agency Head
                                </label>
                                <ul class="list-group col-md-7 m-auto" id="agHed">
                                    @foreach($agency->heads as $val)
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-8 text-center m-auto">
                                                    <div class="fw-bold border-bottom  my-0">
                                                        {{$val->head}}
                                                    </div>
                                                    <div class="form-text text-muted fw-bold text-uppercase">
                                                        {{($val->designation)? :"N/A"}}
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>

                            </div>
                        </div>


                    </div>
                    <div class="card-footer text-end">

                        <button type="subnit" class="btn btn-primary">
                            Create Profile
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection

