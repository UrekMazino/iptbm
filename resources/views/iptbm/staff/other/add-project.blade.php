@extends("layouts.iptbm.staff")

@section('title')
    {{"| Agency-Add-project"}}
@endsection
@section('content')
    <div >

        <div
            class="sticky-top left-0 z-40 w-full h-16 bg-gray-50 border-t border-b drop-shadow border-gray-200 dark:bg-gray-800 dark:border-gray-600">
            <div class="grid h-full max-w-lg grid-cols-4  font-medium">
                <button class="">
                    <a href="{{route("iptbm.staff.ipProfile")}}" class="text-blue-500">
                        <span class="fa-solid fa-home"></span>
                        Profile
                    </a>
                </button>
            </div>
        </div>



        <form method="post" action="{{route("iptbm.staff.project.store")}}">
            @csrf
            <input type="hidden" name="profId" value="">
            <div class="container-fluid">
                <div class="card mt-3">
                    <div class="card-header bg-primary bg-opacity-10">
                        <div class="card-title">
                            <div class="h3 fw-bold">IP-TBM Project</div>
                        </div>
                    </div>
                </div>
                <div class="card p-5 my-2 shadow  border-bottom bg-gray-700">
                    <div class="col-md-8 m-auto">
                        <div class="row">

                            <div class="col-md-12 py-2 m-auto">

                                <div class="form-group">
                                    <label class="fw-bold" for="projTitle">
                                        Project Title
                                    </label>
                                    <textarea name="project_name" required  id="projTitle"class="form-control  @error('project_name') is-invalid @enderror" style="height: 8rem" placeholder="Enter text here"></textarea>
                                    @error('project_name')
                                    <div class="form-text">
                                        <span class="alert alert-danger alert-dismissible">
                                            {{$message}}
                                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </span>
                                    </div>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 py-2 m-auto ">
                                <div class="form-group">
                                    <label class="fw-bold" for="projTitle">
                                        Project Leader
                                    </label>
                                    <input id="projTitle" required type="text" name="project_leader" class="form-control @error('leader') is-invalid @enderror"  placeholder="Enter fullname">
                                    @error('project_leader')
                                    <div class="form-text">
                                        <small class="text-danger">Invalid input</small>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 py-2 m-auto ms-0">
                                <div class="form-group">

                                    <label class="fw-bold" for="datepicker">
                                        Approved Implementation Period
                                    </label>
                                    <input type='text' name="dateperiod" class="form-control ui-datepicker @error('dateperiod') is-invalid @enderror"  data-date-language="pt" id='datepicker' required  placeholder="date">

                                    @error('dateperiod')
                                    <div class="form-text">
                                        <small class="text-danger">Invalid Date</small>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-text">
                                @if(Session::has('success'))
                                    <span class="alert alert-success alert-dismissible h5">
                                            {{Session::get('success')}}
                                        </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-auto py-2 ms-auto me-0">
                                <input type="reset" value="Resit Fields" class="btn btn-secondary">
                            </div>
                            <div class="col-md-auto py-2 ms-2 me-0">
                                <input type="submit" value="Save Details" class="btn btn-primary">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#datepicker').datepicker({
                "format": "yyyy-mm-dd",
            });
        });
    </script>
@endsection
