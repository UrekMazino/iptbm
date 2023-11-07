<div class="modal bg-transparent fade" id="{{$modId}}" data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content bg-dark">

            <div class="modal-body text-center">
                <iframe class="rounded m-auto" style="height: 100%;width: 80%"
                        src="{{asset($file)}}"></iframe>
            </div>
            <button type="button"
                    class="btn btn-sm  position-absolute ms-2 mt-2  fs-4"
                    style="width: fit-content" data-bs-dismiss="modal"
                    aria-label="Close">
                <span class="fa-solid fa-xmark-circle text-secondary fs-1"></span>
            </button>
        </div>
    </div>
</div>
