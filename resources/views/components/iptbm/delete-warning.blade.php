<div class="modal fade" id="{{$modId}}"
     data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post"
                  action="{{route($route)}}">
                @csrf
                <input type="hidden" value="{{$itemId}}"
                       name="{{$hiddenName}}">
                <div class="modal-header bg-dark">
                    <h1 class="modal-title fs-5 text-danger alert-heading"
                        id="staticBackdropLabel">
                        <span class="fa-solid fa-warning me-2"></span>{{$title}}
                    </h1>
                    <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <div class="form-label ">
                            Are you sure you want to delete
                            <span class="fw-bold">"{{$itemName}}"</span>?
                        </div>
                        <div class="form-text text-danger">
                            This item will be deleted
                            immediately. You can't undo this
                            action.
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button"
                            class="btn btn-secondary "
                            data-bs-dismiss="modal">Cancel
                    </button>
                    <button type="submit"
                            class="btn btn-primary">Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
