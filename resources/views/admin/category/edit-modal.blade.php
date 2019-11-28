<div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update-category')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" value="{{$category->cat_name}}" name="cat_name" class="form-control" id="exampleInputEmail1" >
                        <input type="hidden" value="{{$category->id}}" name="id" class="form-control" id="exampleInputEmail1" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Description</label>
                        <textarea class="form-control" name="cat_desc" id="exampleInputEmail1" rows="3" cols="5">{{$category->cat_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Image</label>
                        <input type="file" name="cat_image" class="form-control" id="imgInp"  >
                        <img id="blah" src="{{asset($category->cat_image)}}" height="100px" width="80px"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Publications Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option value="1" {{($category->status==1? 'Selected':'')}}>Published</option>
                            <option value="0" {{($category->status==0? 'Selected':'')}}>Unpublished</option>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
