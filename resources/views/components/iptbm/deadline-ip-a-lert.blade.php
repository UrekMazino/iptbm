<div class="container-fluid">
    @if(isset($tasks))
        @foreach($tasks as $ip_type)

            @foreach($ip_type->tasks as $task)
                <h5>
                    {{$task->task_name}}
                </h5>
                @foreach($task->stages as $stage)

                    <div>
                        {{$stage->stage_name}}
                    </div>
                    <ul>
                        @foreach($stage->applications as $application)
                            <li>
                                dfsgdgdfgdf
                            </li>
                        @endforeach
                    </ul>
                @endforeach

            @endforeach
        @endforeach
    @endif

</div>
