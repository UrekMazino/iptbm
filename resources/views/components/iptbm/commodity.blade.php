<div class="modal fade" id="commo{{$indusId}}" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="indusLab" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{route($route,["id"=>$indusId])}}">
                @csrf
                <div class="modal-header bg-dark">
                    <div class="modal-title text-light" id="indusLab">
                        <div>
                            Industry/Sector: {{$sector}}
                        </div>
                        Select Commodity
                    </div>
                    <button type="button" class="btn-close btn-close-white"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group fw-bold">
                        <label for="catSelect">
                            Commodity
                        </label>
                        <select class="form-select mb-2" id="catSelect" name="commodity">
                            <option value="0" disabled selected>
                                - - Select Commodity - -
                            </option>
                            @foreach($commodities as $val)
                                <option value="{{$val->id}}">{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>
