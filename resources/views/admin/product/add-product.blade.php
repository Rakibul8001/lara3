<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('products')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name" >
                        <input type="hidden" name="id" class="form-control" id="exampleInputEmail1"s>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                       {{--  <input type="text" name="cat_name" class="form-control" id="exampleInputEmail1" >--}}
                        <select name="cat_id[]" multiple class="form-control">
                            <option>--Select Category--</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        {{--<input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" >--}}
                        <select name="brand_id" class="form-control">
                            <option>--Select Brands--</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Short Description</label>
                        <textarea class="form-control" name="product_short_desc" id="exampleInputEmail1" rows="2" cols="5" placeholder="Enter short desc.."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Long Description</label>
                        <textarea class="form-control" name="product_long_desc" id="editor1" rows="5" cols="5" placeholder="Enter Long desc.."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Discount Price</label>
                        <input type="text" name="discount_price" class="form-control" id="exampleInputEmail1" placeholder="Discount Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product price</label>
                        <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Product Price" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Image</label>
                        <input type="file" name="product_image" class="form-control-file" id="imgInp"  >
                        <img id="blah" src=""  width="100px"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product multiple Image</label>
                        <input type="file" name="multiple_image[]" multiple class="form-control-file" id="imgInp"  >
                        <img id="blah" src=""  width="100px"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="text" name="quantity" class="form-control" id="exampleInputEmail1" placeholder="Quantity" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Size</label>
                        {{--<input type="text" name="size" class="form-control" id="exampleInputEmail1" >--}}
                        <select name="size" class="form-control">
                            <option value="">--Select Product Size--</option>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="xl">XL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Publications Status</label>
                        <select class="form-control" name="status" id="exampleFormControlSelect1">
                            <option>--Select--</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

