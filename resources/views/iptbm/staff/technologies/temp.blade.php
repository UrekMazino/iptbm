@extends('layouts.iptbm.staff')

@section('title')
    {{"| additional-details"}}
@endsection

@section('content')
    <div class="tab-pane fade show active"
         id="ex1-tabs-2"
         role="tabpanel"
         aria-labelledby="ex1-tab-2">

        <div class="row bg-light pt-2 sticky-md-top border-bottom">
            <div class="col-md-auto  d-flex py-2 ms-3">
                <div class="m-auto">
                    <a href="{{route("iptbm.staff.technology")}}">
                        <span class="fa-solid fa-house h4"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="form-group mt-3 px-2 h5 fw-bold text-primary mt-5 mb-3">
            Add new IP-TBM Technology
        </div>
        <div class="container-fluid mt-2">
            <!--
            Modal for industry
            --->
            <div class="modal fade" id="indusAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="indusLab" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="post" action="{{route("technology.store.industry")}}">
                            @csrf
                            <div class="modal-header bg-dark">
                                <h1 class="modal-title fs-5 text-light" id="indusLab">Add new Industry</h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="sample"
                                           name="name_indus" value="{{old("name_indus")}}">
                                    <label for="floatingInput">Industry Name</label>

                                </div>
                            </div>
                            <div class="modal-footer bg-dark">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!--
          Modal for category
          --->
            <div class="modal fade" id="techCatmod" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="indusLab" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="post" action="{{route("technology.store.category")}}">
                            @csrf
                            <div class="modal-header bg-dark">
                                <h1 class="modal-title fs-5 text-light" id="indusLab">Add new Technology Category</h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group fw-bold">
                                    <label for="catSelect">
                                        Industry
                                    </label>
                                    <select class="form-select mb-2" id="catSelect" name="indus_name">
                                        <option value="0" disabled selected>
                                            - - Select Industry - -
                                        </option>
                                        @foreach($industries as $val)
                                            <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="sample"
                                           name="name_cat" value="{{old("name_cat")}}">
                                    <label for="floatingInput">Category Name</label>
                                </div>
                            </div>
                            <div class="modal-footer bg-dark">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <!--
                Modal for commodities
             --->
            <div class="modal fade" id="techCommod" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="indusLab" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="post" action="{{route("technology.store.commodity")}}">
                            @csrf
                            <div class="modal-header bg-dark">
                                <h1 class="modal-title fs-5 text-light" id="indusLab">Add new Technology Commodity</h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group fw-bold">
                                    <label for="catSelect">
                                        Industry
                                    </label>
                                    <select class="form-select mb-2" id="catSelect" name="indus_name">
                                        <option value="0" disabled selected>
                                            - - Select Industry - -
                                        </option>
                                        @foreach($industries as $val)
                                            <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" placeholder="sample"
                                           name="name_com" value="{{old("name_com")}}">
                                    <label for="floatingInput">Commodity Name</label>

                                </div>
                            </div>
                            <div class="modal-footer bg-dark">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <form method="post" action="{{route("iptbm.technology.store")}}" class="needs-validation">
                @csrf
                <div class="form-group">
                    <label for="title" class="fw-bolder">
                        Technology Title
                    </label>
                    <textarea rows="10" class="form-control @error("title") is-invalid @enderror" name="title"
                              id="title" rows="3">{{old('title')}}</textarea>
                    @error('title')
                    <span class="text-danger" role="alert">
                    {{$message}}
                </span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="industry" class="fw-bolder">
                        Industry
                    </label>
                    <select class="form-control @error("industry")is-invalid @enderror" name="industry" id="industry"
                            value="{{old("industry")}}">
                        <option value="" selected>Select</option>
                        @foreach($industries as $industry)
                            <option value="{{$industry->id}}" @if(old('industry')==$industry->id)selected @endif>
                                {{$industry->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('industry')
                    <span class="text-danger" role="alert">
                    {{$message}}
                    </span>
                    @enderror
                    @error('industry_name')
                    <div class="form-text text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    @if(Session::has('success-adIndus'))
                        <div class="form-text text-success">
                            {{Session::get('success-adIndus')}}
                        </div>
                    @endif
                    <div class="col-md-auto mt-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#indusAdd">
                            <span class="fa-solid fa-plus-square me-2"></span>Add new type of Industry
                        </button>
                    </div>

                </div>
                <div class="form-group mt-3">
                    <label for="techCat" class="fw-bolder">
                        Technology Category
                    </label>
                    <select class="form-control @error("techCat") is-invalid @enderror" name="techCat" id="techCat"
                            value="{{old("techCat")}}">
                        <option value="" selected disabled>Select</option>
                    </select>
                    @error('techCat')
                    <div class="form-text text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    @error('category_name')
                    <div class="form-text text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    @error('nam_indus')
                    <div class="form-text text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    @if(Session::has('success-cat'))
                        <div class="form-text text-success">
                            {{Session::get('success-cat')}}
                        </div>
                    @endif
                    <div class="col-md-auto mt-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#techCatmod">
                            <span class="fa-solid fa-plus-square me-2" aria-hidden="true"></span>Add new Technology
                            Category
                        </button>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="como" class="fw-bolder">
                        Commodity
                    </label>
                    <select class="form-control @error("techCom") is-invalid @enderror" name="techCom" id="como"
                            value="{{old("techCom")}}">
                        <option value="" selected disabled>Select</option>
                    </select>
                    @error('techCom')
                    <div class="form-text text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    @error('commodity_name')
                    <div class="form-text text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    @error('name_com')
                    <div class="form-text text-danger">
                        {{$message}}
                    </div>
                    @enderror
                    @if(Session::has('success-com'))
                        <div class="form-text text-success">
                            {{Session::get('success-com')}}
                        </div>
                    @endif
                    <div class="col-md-auto mt-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#techCommod">
                            <span class="fa-solid fa-plus-square me-2" aria-hidden="true"></span>Add new Technology
                            Commodity
                        </button>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="row">
                        <div class="col-md-auto me-0 ms-auto">
                            <button type="submit" class="btn btn-primary">
                                <span class="fa-solid fa-floppy-disk me-2"></span>Save Technology
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#myTech').DataTable({
                    // serverSide: true,
                    stateSave: true,
                    pagingType: 'full_numbers',
                    horizontalScroll: true
                });
                $("#industry").change(function (eve) {

                    const form = new FormData();
                    form.append('id', this.value);
                    $.ajax({
                        url: "{{route('technology.commodity')}}",
                        method: 'POST',
                        dataType: 'json',
                        data: form,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (response) {
                            $('#como').empty();
                            $("#techCat").empty();
                            console.log(response);
                            response.data.commodities.forEach(function (item) {

                                $('#como').append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }))
                            })
                            response.data.techcategory.forEach(function (item) {

                                $('#techCat').append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }))
                            })
                        }
                    })
                })

            })

        });
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('is-valid')
                }, false)
            })
        })()
    </script>
@endsection
