
@extends('admin.master')
@section('body')
    <section class="content-header">
        <div class="container-fluid">
            @if(Session::get('message'))
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{Session::get('message')}}</strong>
                </div>
                @endif

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="h4">Category List</span>
                        <button class="btn btn-primary float-right " data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Category Image</th>
                                <th>Publications Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$category->cat_name}}</td>
                                <td>{{$category->cat_desc}}</td>
                                <td><img src="{{asset($category->cat_image)}}" alt="" height="100px" width="80px"></td>
                                <td>{{$category->status==1? 'Published':'Unpublished'}}</td>
                                <td>
                                    @if($category->status==1)
                                        <a href="{{route('unpub-category',['id'=>$category->id])}}" class="btn btn-primary">
                                        <span><li class="fa fa-arrow-up"></li></span>
                                    </a>
                                    @else
                                         <a href="{{route('pub-category',['id'=>$category->id])}}" class="btn btn-danger">
                                            <span><li class="fa fa-arrow-down"></li></span>
                                        </a>
                                    @endif
                                    <a href="#editModal{{$category->id}}" class="btn btn-secondary" data-toggle="modal">
                                        <span><li class="fa fa-edit"></li></span>
                                    </a>
                                    <a href="{{route('delete-category',['id'=>$category->id])}}" class="btn btn-warning">
                                        <span><li class="fa fa-trash"></li></span>
                                    </a>

                                </td>
                            </tr>
                            @include('admin.category.edit-modal')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    @include('admin.category.modal')
    @endsection
