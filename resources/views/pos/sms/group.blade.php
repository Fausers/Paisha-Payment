@extends('layouts.lp')

@section('page_css')

@endsection

@section('content')
<div class="container">

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Shop Contact Groups
                    <span class="d-block text-muted pt-2 font-size-sm">groups</span></h3>
            </div>
            <div class="card-toolbar">
                <!-- Button trigger modal-->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalPopovers">
                        Create Group
                    </button>
                <!--end::Button-->
            </div>
        </div>
        <div class="card-body">
            <!--begin: Search Form-->
            <!--begin::Search Form-->
            <div class="mb-7">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-xl-6">
                        <div class="row align-items-center">
                            <div class="col-md-6 my-2 my-md-0">
                                <div class="input-icon">
                                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" /><span>
                                        <i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6 my-2 my-md-0">
                                <div class="d-flex align-items-center">
                                    <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                                    <select class="form-control" id="kt_datatable_search_type">
                                        <option value="">All</option>
                                        <option value="1">Main Group</option>
                                        <option value="2">Sub Group</option>
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
                    <th title="Field #1">Group Name</th>
                    <th title="Field #4">Description</th>
                    <th title="Field #3">Contacts</th>
                    <th title="Field #5">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td>{{$group->name}}</td>
                        <td>{{$group->desc}}</td>
                        <td>{{count($group->contacts)}}</td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm mr-2" data-toggle="modal" data-target="#edit-{{$group->id}}">
                                <i class="fa fa-pen"></i>
                                Edit
                            </a>
                            <a href="{{route('contacts',[$group->id])}}" class="btn btn-primary btn-sm mr-2">
                                <i class="fa fa-user"></i>
                                Contacts
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                               data-target="#delete_category_{{$group->id}}">
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
                    <h5 class="modal-title" id="exampleModalLabel">New Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('store_groups')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Group Name
                                <span class="text-danger">*</span></label>
                            <input required type="text" name="name" class="form-control" placeholder="eg. Mbeya Customers">
                            <span class="form-text text-muted">Full group name</span>
                        </div>

                         <div class="form-group">
                            <label>Group Description
                                <span class="text-danger">*</span></label>
                            <input required type="text" name="desc" class="form-control">
                            <span class="form-text text-muted">Group Description</span>
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button onclick="f('Saving Group')" type="submit" class="btn btn-primary font-weight-bold">Save</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

{{--Delete Group--}}
@foreach($groups as $categ_del)
<div class="modal fade" id="delete_category_{{$categ_del->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Delete Group</h2>
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
                    <a href="{{route('destroy_group',[$categ_del->id])}}" class="btn btn-danger font-weight-bold">Yes Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($groups as $categ)
    <div class="modal fade" id="edit-{{$categ->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('update_group',[$categ->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Group Name
                                <span class="text-danger">*</span></label>
                            <input value="{{$categ->name}}" required type="text" name="name" class="form-control" placeholder="eg. Skin Lotion">
                            <span class="form-text text-muted">Full category name</span>
                        </div>

                        <div class="form-group">
                            <label>Group Description
                                <span class="text-danger">*</span></label>
                            <input required value="{{$categ->desc}}" type="text" name="desc" class="form-control">
                            <span class="form-text text-muted">Group Description</span>
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                    </div>
                    </form>

                </div>
            </div>destroy_group
        </div>
    </div>
    @endforeach

@endsection

@section('page_js')

		<!--begin::Page Scripts(used by this page)-->
		<script src="{{url('/')}}/assets/js/pages/crud/ktdatatable/base/html-table15aa.js?v=7.2.2"></script>
		<!--end::Page Scripts-->
@endsection
