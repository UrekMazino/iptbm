<div class="container-fluid">

    <table class="table  table-hover">
        <tbody class="table-primary">
        <tr >
            <th class="text-muted">
                Task Name
            </th>
            <th class="text-muted">
                Deadline
            </th>
            <th class="text-muted">
                Status
            </th>
            <th>
                Action
            </th>
        </tr>
        </tbody>
        <tbody>
        @if(isset($tasks))
            @foreach($tasks as $key=>$task)

                @if($key>0)
                    @if($tasks[$key-1]->task_status==='DONE')
                        <tr>
                            <td class="col-md-6">
                                {{$task->stage->stage_name}}
                            </td>
                            <td class="col-md-2">
                                @if($task->deadline)
                                    {{\Carbon\Carbon::parse($task->deadline)->format('d-M-Y || g:i:s A')}}
                                @else
                                    <div class="text-muted">
                                        Deadline not set
                                    </div>
                                @endif
                            </td>
                            <td class="col-md-2">
                                {{$task->task_status}}
                            </td>
                            <td class="col-md-2">

                                <a href="{{route("iptbm.staff.iptask.view",['id'=>$task->id,'name'=>str_replace('/','-',$task->stage->stage_name)])}}" class="btn btn-sm btn-primary me-2 bot-icon" role="button">
                                    <span class="fa-solid fa-eye "></span>
                                </a>
                                <a class="btn btn-sm btn-primary me-2 bot-icon"  role="button">
                                    <span class="fa-solid fa-trash "></span>
                                </a>
                            </td>
                        </tr>
                    @endif
                @else

                @endif
                <tr>
                    <td class="col-md-6">
                        {{$task->stage->stage_name}}
                    </td>
                    <td class="col-md-2">
                        @if($task->deadline)
                            {{\Carbon\Carbon::parse($task->deadline)->format('d-M-Y || g:i:s A')}}

                        @else
                            <div class="text-muted">
                                Deadline not set
                            </div>
                        @endif
                    </td>
                    <td class="col-md-2">
                        {{$task->task_status}}
                    </td>
                    <td class="col-md-2">

                        <a href="{{route("iptbm.staff.iptask.view",['id'=>$task->id,'name'=>str_replace('/','-',$task->stage->stage_name)])}}" class="btn btn-sm btn-primary me-2 bot-icon" role="button">
                            <span class="fa-solid fa-eye "></span>
                        </a>
                        <a class="btn btn-sm btn-primary me-2 bot-icon" role="button">
                            <span class="fa-solid fa-trash "></span>
                        </a>
                    </td>
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
</div>
