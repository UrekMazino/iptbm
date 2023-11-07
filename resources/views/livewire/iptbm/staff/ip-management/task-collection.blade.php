<div class="ps-5 space-y-2">
    @foreach($data as $key=>$val)
        <div>
            <div class="font-medium">
                {{$key}}
            </div>
            <ul class="list-disc">
                @foreach($val as $task)
                    <li>
                     {{$task->stage->stage_name}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
