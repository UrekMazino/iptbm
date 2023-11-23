<div class="modal fade" id="{{$modalId}}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollabl @if(isset($classModal)) {{$classModal}} @endif">
        <div class="modal-content">
            <form method="Post" action="{{route($route,["id"=>$routeData])}}" enctype="multipart/form-data"
                  @if(isset($multiple)) @if($multiple) multiple @endif @endif>
                @csrf
                <div class="modal-header  text-light @if(isset($classHead)) {{$classHead}} @endif "
                     style="background-color: #2d3748">
                    <h6 class="modal-title " id="staticBackdropLabel"><strong>@if(isset($title))
                                {{$title}}
                            @endif</strong></h6>
                    <button type="button"
                            class="btn-close btn-close-white @if(isset($classClose)) {{$classClose}} @endif "
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{$slot}}
                </div>
                <div class="modal-footer" style="background-color: #2d3748">
                    <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">
                        <span class="fa-solid fa-floppy-disk me-1"></span> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
