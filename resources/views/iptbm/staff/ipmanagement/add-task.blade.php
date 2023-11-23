@extends('layouts.iptbm.staff')

@section('title')
    {{"| IP-task"}}
@endsection

@section('meta_data')
    <meta name="ip-alert-task" content="IP task">
@endsection

@section('content')
    <div class="tab-pane fade show active "
         id="ex1-tabs-1"
         role="tabpanel"
         aria-labelledby="ex1-tab-1">
        <div class="row bg-light pt-2 sticky-md-top shadow-sm">
            <div class="col-md-auto  d-flex py-2 ms-3">
                <div class="m-auto">
                    <a href="{{route("iptbm.staff.ip-management")}}" class="text-decoration-none me-2">
                        <span class="fa-solid fa-house me-2 h4"></span>
                    </a>
                    <a href="{{route("iptbm.staff.ip-alert.task",['id'=>$ip_alert->id])}}" class="text-decoration-none">
                        <span class="fa-solid fa-caret-left me-2"></span><strong>{{$ip_alert->ip_type->name}}
                            Task</strong>
                    </a>
                </div>
            </div>
            <div class="col-md-auto  d-flex">
                <span class="m-auto fw-bold  text-secondary">: Add new Task
                </span>
            </div>
        </div>
        <div class="card my-5">
            <div class="card-header bg-primary">
                <strong class="text-light">Add New Task</strong>
            </div>
            <div class="card-body">
                <form method="post" action="{{route("iptbm.staff.ip-alert.task.store",['id'=>$ip_alert->id])}}">
                    @csrf
                    <ul class="list-group mt-3">
                        @foreach($tasks as $key=>$task)
                            <li class="list-group-item ">
                                <div class="form-check">
                                    <input id="list{{$key}}" type="radio" name="task_id" value="{{$task->id}}"
                                           class="form-check-input listTask">
                                    <label for="list{{$key}}" style="cursor: pointer">
                                        {{$task->task_name}}
                                    </label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="selStage" class="text-muted">
                                <strong>Select Task</strong>
                            </label>
                            <select id="selStage" class="form-select" name="stage_id">
                            </select>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">
                                <span class="fa-solid fa-floppy-disk me-2 fs-4"></span><strong>Submit</strong>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section("script")
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.listTask').click(function (val) {
                let option = (data) => {
                    return $('<option>').attr({
                        value: data.id,
                    }).append(data.stage_name)
                }
                const form = new FormData();
                form.append('task_id', val.target.value);
                form.append('ip_type_id', "{{$ip_alert->ip_type->id}}")
                $.ajax({
                    method: 'POST',
                    data: form,
                    url: "{{route('iptbm.staff.ip-alert.task.get_stages')}}",
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);

                        $('#selStage').empty().append($('<option disabled>').text("- - Select - -").attr({
                            disable: true,
                            selected: true
                        }))
                        data.stages.forEach(function (val) {
                            $('#selStage').append(option(val))
                        })

                    }
                })
            })


        })

    </script>
@endsection
