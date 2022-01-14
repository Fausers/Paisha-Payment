@extends('layouts.lp')

@section('page_css')

@endsection

@section('content')
<div class="container">

    <!--begin::Card-->
    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">{{$group->name}} Contacts
                    <span class="d-block text-muted pt-2 font-size-sm">groups</span></h3>
            </div>
            <div class="card-toolbar">
                <!-- Button trigger modal-->
                    <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#exampleModalPopovers">
                        Create Contact
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#excel">
                        Add With Excel
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
                                        <option value="1">Main Contact</option>
                                        <option value="2">Sub Contact</option>
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
                    <th title="Field #1">Contact Name</th>
                    <th title="Field #4">Last name</th>
                    <th title="Field #3">Phone</th>
                    <th title="Field #5">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($group->contacts as $contact)
                    <tr>
                        <td>{{$contact->first_name}}</td>
                        <td>{{$contact->last_name}}</td>
                        <td>{{$contact->phone}}</td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm mr-2" data-toggle="modal" data-target="#edit-{{$contact->id}}">
                                <i class="fa fa-pen"></i>
                                Edit
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                               data-target="#delete_category_{{$contact->id}}">
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
                    <h5 class="modal-title" id="exampleModalLabel">New Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('store_contact')}}" enctype="multipart/form-data">
                        @csrf
                        <input hidden value="{{$group->id}}" name="group_id">
                        <div class="form-group">
                            <label>Contact First Name
                                <span class="text-danger">*</span></label>
                            <input required type="text" name="first_name" class="form-control" placeholder="eg. Juma">
                        </div>

                         <div class="form-group">
                            <label>Contact Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="eg. Kibona">
                         </div>

                        <div class="form-group">
                            <label>Phone Number
                                <span class="text-danger">*</span></label>
                            <input required type="text" name="phone" class="form-control"
                                   placeholder="+255765204506">
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

{{-- Excel Modal --}}
<div class="modal fade" id="excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Contacts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('store_excel_contact')}}" enctype="multipart/form-data">
                        @csrf
                        <input hidden value="{{$group->id}}" name="group_id">
                        <div class="form-group">
                            <label>Select Excel/CSV File
                                <span class="text-danger">*</span></label>
                            <input required type="file" name="contacts" class="form-control" placeholder="eg. Juma">
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                        <button onclick="save('{{$group->name}}')" type="submit" class="btn btn-primary font-weight-bold">Import</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

{{--Delete Contact--}}
@foreach($group->contacts as $categ_del)
<div class="modal fade" id="delete_category_{{$categ_del->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Delete Contact</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 style="text-align: center">Are you sure you want to Delete!</h4>
                <h1 style="color: red;text-align: center">{{$categ_del->first_name}}</h1>
                <br>
                <p style="text-align: center">This action is irreversible.<br> All associated data will be lost.</p>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancel</button>
                    <a href="{{route('destroy_contact',[$categ_del->id])}}" class="btn btn-danger font-weight-bold">Yes Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($group->contacts as $categ)
    <div class="modal fade" id="edit-{{$categ->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Contact</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('update_contact',[$categ->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name
                                <span class="text-danger">*</span></label>
                            <input value="{{$categ->first_name}}" required type="text" name="first_name" class="form-control" placeholder="eg. Skin Lotion">
                            <span class="form-text text-muted">Full category name</span>
                        </div>

                        <div class="form-group">
                            <label>Last Name
                                <span class="text-danger">*</span></label>
                            <input value="{{$categ->last_name}}" required type="text" name="last_name" class="form-control" placeholder="eg. Skin Lotion">
                            <span class="form-text text-muted">Last Name</span>
                        </div>

                        <div class="form-group">
                            <label>Contact Name
                                <span class="text-danger">*</span></label>
                            <input value="{{$categ->phone}}" required type="text" name="phone" class="form-control" placeholder="eg. Skin Lotion">
                            <span class="form-text text-muted">Phone Number</span>
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
