@extends('layouts.lp')

@section('page_css')

@endsection

@section('content')
<div class="container">

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">All System Posts
                    <span class="d-block text-muted pt-2 font-size-sm">
                        List Of all the Posts in the system
                    </span></h3>
            </div>
            <div class="card-toolbar">
                <!-- Button trigger modal-->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalPopovers">
                        Add Post
                    </button>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" /><span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                    </div>
                </div>
            </div>
            <!--end::Search Form-->
            <!--end: Search Form-->
            <!--begin: Datatable-->
            <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
                <thead>
                <tr>
                    <th title="Field #1">Category Name</th>
                    <th title="Field #3">Posts</th>

                    <th >Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $post)
                    <tr>
                        <td>{{$post->name}}</td>
                        <td>
                            {{count($post->posts)}}
                        </td>

                        
                        <td>
                            <a href="#" class="btn btn-success btn-sm mr-3" data-toggle="modal" data-target="#edit-{{$post->id}}">
                                <i class="fa fa-pen"></i>
                                Edit
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                               data-target="#delete_category_{{$post->id}}">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
</div>


<div class="modal fade" id="exampleModalPopovers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('save_category')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category Name
                            <span class="text-danger">*</span></label>
                        <input required type="text" name="name" class="form-control" placeholder="eg. Skin Lotion">
                        <span class="form-text text-muted">Full category name</span>
                    </div>

                    
                    <div class="form-group">
                        <label>Image<span class="text-danger">*</span></label>
                        <input required type="file" accept="image/*" name="photo" class="form-control" placeholder="eg. Skin Lotion">
                        <span class="form-text text-muted">Category Wide image</span>
                    </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>

{{--Delete Category--}}
@foreach($categories as $categ_del)
<div class="modal fade" id="delete_category_{{$categ_del->id}}" tabindex="-1"
 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel">Delete Category</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i aria-hidden="true" class="ki ki-close"></i>
            </button>
        </div>
        <div class="modal-body">
            <h4 style="text-align: center">Are you sure you want to Delete!</h4>
            <h1 style="color: red;text-align: center">{{$categ_del->name}}</h1>
            <br>
            <p style="text-align: center">This action is irreversible.<br> All associated data will be lost.</p>
            <div class="modal-footer" >
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                <a href="{{route('delete_category',[$categ_del->id])}}" class="btn btn-danger font-weight-bold">Yes Delete</a>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach

@foreach($categories as $categ)
<div class="modal fade" id="edit-{{$categ->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit {{$categ->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('update_category',[$categ->id])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category Name
                            <span class="text-danger">*</span></label>
                        <input value="{{$categ->name}}" required type="text" name="name" class="form-control" placeholder="eg. Skin Lotion">
                        <span class="form-text text-muted">Full category name</span>
                    </div>

                    
                    <div class="form-group">
                        <label>Image</label>
                        <img style="width: 50%" src="{{url(Storage::url($categ->image))}}">
                        <input type="file" accept="image/*" name="photo" class="form-control" placeholder="eg. Skin Lotion">
                        <span class="form-text text-muted">Change Category Wide image</span>
                    </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endforeach
    

@endsection

@section('page_js')

		<!--begin::Page Scripts(used by this page)-->
		<script src="{{url('/')}}/assets/js/pages/crud/ktdatatable/base/html-table15aa.js?v=7.2.2"></script>
		<!--end::Page Scripts-->
@endsection
