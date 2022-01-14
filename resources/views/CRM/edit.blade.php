@extends('layouts.lp')

@section('page_css')

@endsection

@section('content')
<!--begin::Container-->
<div class="container">
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{$post->title}}</h3>
            <div class="card-toolbar">
                <div>
                    @if($post->status == 1)
                        <a href="{{route('activate_post',[$post->id])}}" type="button" class="btn btn-warning">Deactivate</a>
                    @else
                        <a href="{{route('activate_post',[$post->id])}}" type="button" class="btn btn-success">Activate</a>
                    @endif
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form method="POST" enctype="multipart/form-data" action="{{route('update_post',[$post->id])}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Post Name<span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}" placeholder="Post Name" />
                    <span class="form-text text-muted">Full Post Name</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Short Description
                        <span class="text-danger">*</span></label>
                    <textarea name="desc" class="form-control" rows="3">{{$post->desc}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Detailed Description
                        <span class="text-danger">*</span></label>
                    <div id="kt_quil_2" style="height: 325px">
                        {!!  str_replace( '\\','',str_replace("\https",'https',$post->content)) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Video / Audio Url Embed
                            <span class="text-danger"></span></label>
                        <input value="{{$post->asset_url}}" type="text" name="asset_url" class="form-control" >
                        <span class="form-text text-muted">Video (Youtube) / Audio URL (Sound Cloud) </span>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Date To Show
                            <span class="text-danger"></span></label>
                        <input value="{{$post->post_date}}" type="date" name="post_date" class="form-control" >
                        <span class="form-text text-muted">The Shown date on post</span>
                    </div>

                </div>


                <h4>Select Tags</h4>
                <div class="form-group p-5" style="border-style: ridge">
                        <div class="checkbox-inline">
                    @foreach($tags as $tag)
                            <label class="checkbox">
                                <input type="checkbox"
                                       @foreach($post->main_tags as $pctg)
                                       @if($pctg->id == $tag->id) checked @endif
                                       @endforeach
                                       value="{{$tag->id}}"
                                       name="tags[]"/>
                                <span></span>
                                {{$tag->name}}
                            </label>
                    @endforeach
                        </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-12 col-sm-12 text-lg-center">Upload Images</label>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                            <input type="hidden" value="{{$post->id}}" id="product_id">
                            <div class="dropzone-msg dz-message needsclick">
                                <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                <span class="dropzone-msg-desc">Only image, pdf and psd files are allowed for upload</span>
                            </div>
                        </div>
                    </div>
                </div>

                <section id="images">
                    <div class="row">
                        @foreach($post->images as $image)
                        <div class="col col-4 p-2">
                            <img width="100%" src="{{url(Storage::url($image->main))}}">
                            <a type="button" href="{{route('delete_image',[$image->id])}}" class="btn btn-sm btn-danger m-2">Delete Image</a>
                        </div>
                        @endforeach
                    </div>
                </section>

                <!--begin: Code-->
                <div class="example-code mt-10">
                    <div class="example-highlight">
                    </div>
                </div>
                <!--end: Code-->
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->
</div>
@endsection

@section('page_js')
    <script>
// Class definition
var KTQuilDemos = function() {

    // Private functions
    var demo2 = function() {
        var Delta = Quill.import('delta');
        var quill = new Quill('#kt_quil_2', {
            modules: {
                toolbar: true
            },
            placeholder: 'Type your text here...',
            theme: 'snow'
        });

        // Store accumulated changes
        var change = new Delta();
        quill.on('text-change', function(delta) {
            change = change.compose(delta);
        });

        // Save periodically
        setInterval(function() {

            if (change.length() > 0) {
                console.log('Saving changes', change);

                console.log('Saving Twice', change);
                /*
                Send partial changes
                $.post('/your-endpoint', {
                partial: JSON.stringify(change)
                });
                Send entire document
                */

                $.post('/api/manager/products/desc/{{$post->id}}', {
                doc: JSON.stringify(quill.root.innerHTML)
                });

                change = new Delta();
            }
        }, 5 * 1000);

        // Check for unsaved data
        window.onbeforeunload = function() {
            if (change.length() > 0) {
                return 'There are unsaved changes. Are you sure you want to leave?';
            }
        }
    }

    return {
        // public functions
        init: function() {
            demo2();
        }
    };
}();

jQuery(document).ready(function() {
    KTQuilDemos.init();
});
    </script>
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{url('/')}}/assets/js/pages/crud/file-upload/dropzonejs15aa.js?v=7.2.2"></script>
    <!--end::Page Scripts-->
@endsection
