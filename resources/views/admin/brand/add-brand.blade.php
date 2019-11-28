<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('brand')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Description</label>
                        <textarea class="form-control" name="brand_desc" id="exampleInputEmail1" rows="3" cols="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Image</label>
                        <input type="file" name="brand_image" class="form-control" id="imgInp"  >
                        <img id="blah" src="" height="100px" width="80px"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Publications Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Brand</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
