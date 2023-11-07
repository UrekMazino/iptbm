<div class="modal fade" id="addCat" data-bs-backdrop="static" data-bs-keyboard="false"
     tabindex="-1" aria-labelledby="indusLab" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{route('technology.store.category')}}">
                @csrf
                <div class="modal-header bg-dark">
                    <div class="modal-title text-light" id="indusLab">
                        <div>
                            Industry/Sector:
                        </div>
                        Add new Category
                    </div>
                    <button type="button" class="btn-close btn-close-white"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-title">
                        <small>This will be added to the pre-listed Technology Categories</small>
                    </div>
                    <div class="form-group fw-bold">
                        <div class="form-floating mb-3">
                            <input type="hidden" name="indus_name" value="{{$industry_id}}">
                            <input type="text" class="form-control" id="floatingInput"
                                   placeholder="sample" name="name_cat" value="{{old("nam_cat")}}">
                            <label for="floatingInput">Category Name</label>
                        </div>
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
