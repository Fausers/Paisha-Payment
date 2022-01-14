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
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                    <select class="form-control" id="kt_datatable_search_status">
                                        <option value="">All</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Delivered</option>
                                        <option value="3">Canceled</option>
                                        <option value="4">Success</option>
                                        <option value="5">Info</option>
                                        <option value="6">Danger</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">All</option>
                                        <option value="1">Main Category</option>
                                        <option value="2">Sub Category</option>
                                    </select>
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
                    <th title="Field #1">Post Name</th>
                    <th title="Field #3">Category</th>

                    <th >Total Views</th>
                    <th >Post Date</th>
                    <th >Status</th>
                    <th >Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>
                            {{$post->category}}
                        </td>

                        <td class="text-right" style="text-align: right !important;"> {{number_format($post->views)}} Views</td>
                        <td>{{date('d M Y',strtotime($post->post_date))}}</td>
                        <td class="text-right">{{$post->status}}</td>
                        <td>
                            <a href="{{route('admin_post',[$post->id])}}" class="btn btn-success btn-xs" >
                                <i class="fa fa-pen"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
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
                    <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('save_post')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Post Title
                                <span class="text-danger">*</span></label>
                            <input required type="text" name="title" class="form-control" placeholder="eg. ACT yashinda Ubunge Jimbo la Konde">
                            <span class="form-text text-muted">Full Post title</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1">Main Category
                                <span class="text-danger">*</span></label>
                            <select required name="post_category_id" class="form-control" id="exampleSelect1">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image<span class="text-danger">*</span></label>
                            <input required type="file" name="file" class="form-control" placeholder="eg. Skin Lotion">
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

    @foreach($posts as $categ)
        <div class="modal fade" id="edit-{{$categ->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('update_post',[$categ->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Category Name
                                <span class="text-danger">*</span></label>
                            <input value="{{$categ->name}}" required type="text" name="name" class="form-control" placeholder="eg. Skin Lotion">
                            <span class="form-text text-muted">Full category name</span>
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1">Main Category
                                <span class="text-danger">*</span></label>
                            <select required name="category_id" class="form-control" id="exampleSelect1">
                                <option value="0">This is a Main Category</option>
                                @foreach($posts as $post)
                                    <option @if($categ->category_id == $post->id) selected @endif value="{{$post->id}}">{{$post->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <img style="width: 50%" src="{{url(Storage::url($categ->image))}}">
                            <input type="file" name="photo" class="form-control" placeholder="eg. Skin Lotion">
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
