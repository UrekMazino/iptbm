<div class="row text-start">
    <div class="col-md-12">
        <label for="selStages" class="text-muted fw-bold">Task Stages</label>
        <select class="form-select" id="selStages" name="{{$name}}">
            <option value="" disabled selected>- - Select - -</option>
            @if(isset($stages))
                @foreach($stages as $stage)
                    <option value="{{$stage->id}}">{{$stage->stage_name}}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
