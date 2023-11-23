@extends('layouts.iptbm.staff')

@section('title')
    {{"| IP-task view"}}
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
                    <a href="{{route("iptbm.staff.ip-management.application.index",['id'=>$ip_task->ip_alert->id])}}"
                       class="text-decoration-none me-3">
                        <span class="fa-solid fa-caret-left me-2"></span><strong>IP-Management</strong>
                    </a>
                    <a href="{{route("iptbm.staff.ip-alert.task",['id'=>$ip_task->ip_alert->id])}}"
                       class="text-decoration-none">
                        <span
                            class="fa-solid fa-caret-left me-2"></span><strong>{{$ip_task->ip_alert->ip_type->name}} </strong>
                    </a>
                    <strong class="text-muted ms-3">
                        Task:
                    </strong>
                    {{$name}}
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-11 m-auto">
                <form method="post" action="{{route("iptbm.staff.iptask.notifications_update",['id'=>$ip_task->id])}}">
                    @csrf
                    <div class="card shadow">
                        <div class="card-header bg-primary d-flex">
                            <div class="text-light">
                                Notification Settings
                            </div>
                            <div class="me-0 ms-auto">
                                <span class="text-light">Deadline : </span>
                                <span class="text-info">
                                {{\Carbon\Carbon::parse($ip_task->deadline)->format('d-M-Y || g:i:s A')}}
                            </span>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                @foreach($errors->all() as $message)
                                    <div class="row my-2">
                                        <div class="col-md-12">
                                            <div class="alert-danger alert">
                                                {{$message}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="text-muted fw-bold" id="desc">
                                        Event name / Notification details
                                    </label>
                                    <textarea id="desc" class="form-control mt-1" rows="4"
                                              name="notification_description">{{$ip_task->ip_task_stage_notifications->notification_details}}</textarea>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12">
                                    <label class="text-muted fw-bold">
                                        Frequency
                                    </label>
                                    <div class="d-flex mt-1 gap-5">
                                        <div class="form-check">
                                            <input name="frequency"
                                                   @if($ip_task->ip_task_stage_notifications->frequency==='weekly') checked
                                                   @endif type="radio" value="weekly" class="form-check-input"
                                                   id="weekly">
                                            <label for="weekly" class="form-check-label">Weekly</label>
                                        </div>
                                        <div class="form-check">
                                            <input name="frequency"
                                                   @if($ip_task->ip_task_stage_notifications->frequency==='daily') checked
                                                   @endif type="radio" value="daily" class="form-check-input"
                                                   id="daily">
                                            <label for="daily" class="form-check-label">Daily</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-md-12" id="schedContainer">

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"> Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
@push('additional_scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@endpush
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#weekly').click(function () {
                $('#schedContainer').empty().append(
                    $('<div class="input-group my-1">').append(
                        $('<label for="selFrec" class="input-group-text">').text("Day of the week"),
                        $('<select id="selFrec" name="weekly_notif_day" class="form-select">').append(
                            $('<option value="">').text("- - Select - -"),
                            $('<option @if($ip_task->ip_task_stage_notifications->day_of_week==='Monday') selected @endif value="Monday">').text("Monday"),
                            $('<option @if($ip_task->ip_task_stage_notifications->day_of_week==='Tuesday') selected @endif value="Tuesday">').text("Tuesday"),
                            $('<option @if($ip_task->ip_task_stage_notifications->day_of_week==='Wednesday') selected @endif value="Wednesday">').text("Wednesday"),
                            $('<option @if($ip_task->ip_task_stage_notifications->day_of_week==='Thursday') selected @endif value="Thursday">').text("Thursday"),
                            $('<option @if($ip_task->ip_task_stage_notifications->day_of_week==='Friday') selected @endif value="Friday">').text("Friday"),
                            $('<option @if($ip_task->ip_task_stage_notifications->day_of_week==='Saturday') selected @endif value="Saturday">').text("Saturday"),
                            $('<option @if($ip_task->ip_task_stage_notifications->day_of_week==='Sunday') selected @endif value="Sunday">').text("Sunday"),
                        )
                    ),
                    $('<div class="input-group my-1">').append(
                        $('<label class="input-group-text">').text("Hour of the day"),
                        $('<input id="inpH" name="notif_hour" type="datetime-local" class="form-control">').val("@if($ip_task->ip_task_stage_notifications->time_of_day) {{$ip_task->ip_task_stage_notifications->time_of_day}}  @endif"),
                    )
                )
                flatpickr("input[type=datetime-local]", {
                    enableTime: true,
                    disableMobile: true,
                    noCalendar: true,
                    dateFormat: "h:i K", // Format to display the selected time
                    time_24hr: false,
                    input: true
                });
            })
            $("#daily").click(function () {
                $('#schedContainer').empty().append(
                    $('<div class="input-group my-1">').append(
                        $('<label for="inpH" class="input-group-text">').text("Hour of the day"),
                        $('<input id="inpH" name="notif_hour" type="datetime-local" class="form-control">')
                    )
                )
                flatpickr("input[type=datetime-local]", {
                    enableTime: true,
                    disableMobile: true,
                    noCalendar: true,
                    dateFormat: "h:i K", // Format to display the selected time
                    time_24hr: false,
                    input: true
                });
            })
            flatpickr("input[type=datetime-local]", {
                enableTime: true,
                disableMobile: true,
                noCalendar: true,
                dateFormat: "h:i K", // Format to display the selected time
                time_24hr: false,
                input: true
            });
            @if($ip_task->ip_task_stage_notifications->frequency)
            @if($ip_task->ip_task_stage_notifications->frequency==='weekly')
            $('#weekly').trigger('click');
            @elseif($ip_task->ip_task_stage_notifications->frequency==='daily')
            $('#daily').trigger('click');
            @endif
            $("#inpH").val("{{\Carbon\Carbon::parse($ip_task->ip_task_stage_notifications->time_of_day)->format('g:i A')}}")
            @endif
        })

    </script>
@endsection
