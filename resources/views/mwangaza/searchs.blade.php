@extends('layouts.mwangaza')
@section('content')

<main>
   

    <!-- Promo Articles -->
    <!-- End Promo Articles -->

    <!-- News Content -->
    <div class="container g-pt-10 g-pb-50">
      <div class="row">
        <!-- Articles Content -->
        <div class="col-lg-9 g-mb-50 g-mb-0--lg">
            @foreach($porojo as $post)
          <!-- Article -->
          <article class="text-center g-mb-10">

            <figure class="g-pos-rel mb-2 ">
                <a href="{{url('/')}}/my_post/{{$post->id}}/{{$post->title}}">
                @if($post->post_category->id == 5)
                    <img class="img-fluid"
                                 src="https://img.youtube.com/vi/{{$post->image_url}}/hqdefault.jpg"
                                 alt="Image Description">
                @elseif($post->post_category->id == 3)
                    <div class="js-carousel g-mx-minus-10"
                   data-infinite="true"
                   data-arrows-classes="u-arrow-v1 g-pos-abs g-absolute-centered--y g-width-30 g-height-30 g-brd-around g-brd-white g-color-white g-color-primary--hover rounded"
                   data-arrow-left-classes="fa fa-angle-left g-left-20 bg-dark"
                   data-arrow-right-classes="fa fa-angle-right g-right-20 bg-dark">
                        @if(count($post->images) > 0)
                        @foreach($post->images as $image)
                            <div class="js-slide">
                                <img class="img-fluid"
                                   src="{{url('/')}}/{{Illuminate\Support\Facades\Storage::url($post->image_url)}}"
                                   alt="Image Description">
                            </div>
                        @endforeach
                        @else
                            <img class="img-fluid"
                                 src="{{url('/')}}/{{Illuminate\Support\Facades\Storage::url($post->image_url)}}"
                                 alt="Image Description">
                        @endif
                  </div>
                @else
              <img class="img-fluid" src="{{url('/')}}/{{Illuminate\Support\Facades\Storage::url($post->image_url)}}"
                   alt="{{$post->title}}">
              @endif
                </a>
              <!-- Figcaption -->
              <figcaption class="w-100 g-pos-abs g-bottom-0 g-left-0 ">
                <ul class="d-flex justify-content-start list-inline mb-0 ">
{{--                    <li class="list-inline-item mx-0">--}}
{{--                      <a class=" bg-dark d-inline-block g-brd-around g-brd-white-opacity-0_3 g-brd-primary-opacity-0_6--hover g-color-white g-bg-primary-opacity-0_6--hover g-text-underline--none--hover rounded-left g-px-15 g-py-4" href="#!">--}}
{{--                        <i class="align-middle mr-2 icon-medical-022 u-line-icon-pro"></i>--}}
{{--                          {{$post->likes}}--}}
{{--                      </a>--}}
{{--                    </li>--}}
{{--                    <li class="list-inline-item g-ml-minus-1 mr-0">--}}
{{--                      <a class="bg-dark d-inline-block g-brd-around g-brd-white-opacity-0_3 g-brd-primary-opacity-0_6--hover g-color-white g-bg-primary-opacity-0_6--hover g-text-underline--none--hover rounded-right g-px-15 g-py-4" href="#!">--}}
{{--                        <i class="align-middle mr-2 icon-education-007 u-line-icon-pro"></i>--}}
{{--                          {{$post->views}}--}}
{{--                      </a>--}}
{{--                    </li>--}}
                  <li class="list-inline-item ml-auto mr-0">
                    <a class="bg-dark d-inline-block g-color-white g-font-size-15 g-text-underline--none--hover g-px-15 g-py-4" href="#!"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Save to Read Later">
                      <i class="fa fa-bookmark-o"></i>
                    </a>
                  </li>
                </ul>
              </figcaption>
              <!-- End Figcaption -->
            </figure>

            <!-- Category & Date -->
            <ul class="list-inline g-color-secondary-dark-v1 g-font-weight-600 g-font-size-12 text-uppercase mb-3">
              <li class="list-inline-item g-mr-10">
                <i class="align-middle g-color-primary mr-1 icon-communication-020 u-line-icon-pro"></i>
                <a class="g-font-weight-700"
                   href="{{route('category',[$post->post_category->name])}}">{{$post->post_category->name}}</a>
              </li>
              <li class="list-inline-item">&#8226;</li>
              <li class="list-inline-item g-ml-10">
                <i class="align-middle g-color-secondary-dark-v1 mr-1 icon-education-124 u-line-icon-pro"></i>
                  {{date('M d, Y',strtotime($post->post_date))}}
              </li>
            </ul>
            <!-- End Category & Date -->

            <!-- Info -->
            <div class="mb-1">
              <h2 class="mb-2" style="font-size: 35px; text-align: left">
                  <a class="u-link-v5 g-color-main g-color-primary--hover"
                     href="{{url('/')}}/my_post/{{$post->id}}/{{$post->title}}">
                      {{$post->title}}</a>
              </h2>
              <p style="text-align: left !important;">
                  @if (strlen($post->content) > 200)
                      {!! $post->content = substr(str_replace('<p>','<p style="text-align: left !important;">',$post->content), 0, 197) . '...' !!}
                  @else
                      {!! str_replace('<p>','<p style="text-align: left !important;">',$post->content) !!}
                  @endif
              </p>
            </div>
            <!-- End Info -->

            <div class="g-mb-3" style="text-align: left !important;">
                <a href="{{route('single_post',[$post->id,$post->title])}}" class="readmore">Read more</a>
            </div>

            <!-- Social Icons -->
            <div class="g-overflow-hidden">
              <ul class="list-inline u-info-v10-1 mb-0">

              </ul>
            </div>
            <!-- End Social Icons -->
          </article>
          <!-- End Article -->
            @endforeach



          <div id="stickyblock-end"></div>
                @if(count($porojo) > 20)
          <!-- Pagination -->
          <nav class="g-pb-50" aria-label="Page Navigation">
            <ul class="list-inline text-center mb-0">
              <li class="list-inline-item">
                <a class="active u-pagination-v1__item g-width-30 g-height-30 g-brd-secondary-light-v2 g-brd-primary--active g-color-white g-bg-primary--active g-font-size-12 rounded g-pa-5" href="#!">1</a>
              </li>
              <li class="list-inline-item">
                <a class="u-pagination-v1__item g-width-30 g-height-30 g-brd-transparent g-brd-primary--hover g-brd-primary--active g-color-secondary-dark-v1 g-bg-primary--active g-font-size-12 rounded g-pa-5" href="#!">2</a>
              </li>
              <li class="list-inline-item g-hidden-xs-down">
                <a class="u-pagination-v1__item g-width-30 g-height-30 g-brd-transparent g-brd-primary--hover g-brd-primary--active g-color-secondary-dark-v1 g-bg-primary--active g-font-size-12 rounded g-pa-5" href="#!">3</a>
              </li>
              <li class="list-inline-item">
                <span class="g-width-30 g-height-30 g-color-gray-dark-v5 g-font-size-12 rounded g-pa-5">...</span>
              </li>
              <li class="list-inline-item g-hidden-xs-down">
                <a class="u-pagination-v1__item g-width-30 g-height-30 g-brd-transparent g-brd-primary--hover g-brd-primary--active g-color-secondary-dark-v1 g-bg-primary--active g-font-size-12 rounded g-pa-5" href="#!">15</a>
              </li>
              <li class="list-inline-item">
                <a class="u-pagination-v1__item g-brd-secondary-light-v2 g-brd-primary--hover g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded g-px-15 g-py-5 g-ml-15" href="#!" aria-label="Next">
                  <span aria-hidden="true">
                    Next
                    <i class="ml-2 fa fa-angle-right"></i>
                  </span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
          <!-- End Pagination -->
                @endif
        </div>

    
      </div>
    </div>
    <!-- End News Content -->

  

    <!-- Go To -->
    <a class="js-go-to u-go-to-v2" href="#!"
       data-type="fixed"
       data-position='{
         "bottom": 15,
         "right": 15
       }'
       data-offset-top="400"
       data-compensation="#js-header"
       data-show-effect="zoomIn">
      <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
    <!-- End Go To -->
  </main>

@endsection