@extends('layouts.mwangaza')
@section('content')
    <!--::::: ARCHIVE AREA START :::::::-->
	<div class="archives post post1 padding-top-30">
		<div class="container">

			<div class="space-30"></div>
			<div class="row">
				<div class="col-md-6 col-lg-8">
					<div class="row">
						<div class="col-4 align-self-center">
							<div class="page_category">
								<h4>{{$post->post_category->name}}</h4>
							</div>
						</div>
						<div class="col-8 text-right">
							<div class="page_comments">
								<ul class="inline">
									<li><i class="fas fa-comment"></i>563</li>
									<li><i class="fas fa-fire"></i>{{$post->views}}</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="space-30"></div>
					<div class="single_post_heading">
						<h1>{{$post->title}}</h1>
						<div class="space-10"></div>
					</div>
					<div class="space-40"></div>
                    @if(isset($post->asset_url))
                        {!! $post->asset_url !!}
                    @else
					<img src="{{Storage::url($post->image_url)}}" alt="image">
                    @endif
					<div class="space-20"></div>
					<div class="row">
						<div class="col-lg-6 align-self-center">
							<div class="author">
								<div class="author_img">
									<div class="author_img_wrap">
										<img src="@if ($post->author->profile->avatar_status == 1)
                                                {{ $post->author->profile->avatar }} @else
                                                {{ Gravatar::get($post->author->email) }} @endif" alt="">
									</div>
								</div>	<a href="#">{{$post->author->name}}</a>
								<ul>
									<li><a href="#">{{date('M d, Y',strtotime($post->post_date))}}</a>
									</li>
{{--									<li>Updated 1:58 p.m. ET</li>--}}
								</ul>
							</div>
						</div>
						<div class="col-lg-6 align-self-center">
							<div class="author_social inline text-right">
								<ul>
									<li><a href="#"><i class="fab fa-instagram"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-facebook-f"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-youtube"></i></a>
									</li>
									<li><a href="#"><i class="fab fa-instagram"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="space-20"></div>
                    {!! str_replace( '\\','',str_replace("\https",'https',$post->content)) !!}
					<div class="space-20"></div>
{{--                    @foreach($post->images as $image)--}}
{{--                        <img src="{{Storage::url($image->main)}}" alt="{{$post->title}}">--}}
{{--					    <div class="space-20"></div>--}}
{{--                    @endforeach--}}
					<div class="space-40"></div>
					<div class="tags">
						<ul class="inline">
							<li class="tag_list"><i class="fas fa-tag"></i> tags</li>
                            @foreach($post->main_tags as $tag)
							<li><a href="#">{{$tag->name}}</a></li>
                            @endforeach
						</ul>
					</div>
					<div class="space-40"></div>
					<div class="border_black"></div>
					<div class="space-40"></div>

                    <div class="comment_form">
		<div class="container">

			<div class="comment_list">
				<div class="row">
					<div class="col-12 col-lg-10 m-auto">
						<h3>Our latest news</h3>
                        @foreach($post->comments as $comment)
						<div class="single_comment">
							<div class="comment_img">
								<img src="{{url('/')}}/mwangaza/assets/img/author/author2.png" alt="">
							</div>
							<div class="row">
								<div class="col-sm-6">	<a >{{$comment->user->name}}</a>
								</div>
								<div class="col-sm-6">
                                    <div class="replay text-right">	<a >replay</a>
                                    </div>
								</div>
							</div>
							<div class="space-5"></div>
							<p>{{$comment->comment}}</p>
						</div>

                            <div class="space-15"></div>
                            <div class="border_black"></div>
                            <div class="space-15"></div>

                            @foreach($comment->comments as $inner_comment)
                                <div class="single_comment inner_cm">
                                    <div class="comment_img">
                                        <img src="{{url('/')}}/mwangaza/assets/img/author/author2.png" alt="">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">	<a>{{$inner_comment->user->name}}</a>
                                        </div>
                                        <div class="col-sm-6">

                                        </div>
                                    </div>
                                    <div class="space-5"></div>
                                    <p>{{$inner_comment->comment}}</p>
                                </div>

                                <div class="space-15"></div>
                                <div class="border_black"></div>
                                <div class="space-15"></div>
                            @endforeach
                        @endforeach

{{--						<div class="space-40"></div>	<a href="#" class="cbtn2">Load More</a>--}}
					</div>
				</div>

            <div class="space-60"></div>
            @if(!isset(Auth::user()->id))
                <h3>Login to Comment</h3>
                <div class="row">
                    <div class="col-12 col-lg-10 m-auto">
                        <form action="{{route('register_with_phone')}}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <input name="first_name" type="text" placeholder="Full Name" value="{{ old('first_name') }}" required @if ($errors) autofocus @endif>
                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input name="phone" type="number" placeholder="Pnone Number" value="{{ old('phone') }}" required @if ($errors) autofocus @endif>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <input name="password" type="password" placeholder="Password" required @if ($errors) autofocus @endif>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-12">
                                    <input type="submit" value="POST Comment" class="cbtn2">
                                </div>
                            </div>
                        </form>
                    </div>
			</div>
            @else
                <form>
                    <div class="row">

                        <div class="col-12">
                            <textarea name="messege" id="messege" cols="30" rows="5" placeholder="Tell us about your opinion…"></textarea>
                        </div>
                        <div class="col-12">
                            <input type="submit" value="POST Comment" class="cbtn2">
                        </div>
                    </div>
                </form>
            @endif
		</div>
        </div>
	</div>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

					<div class="next_prev">
						<div class="row">
							<div class="col-lg-6 align-self-center">
                                @if(isset($previous_post))
                                    <div class="next_prv_single border_left3">
                                        <p>ILIYOPITA</p>
                                        <h3><a href="{{route('single_post',[$previous_post->id,$previous_post->title])}}"> {{$previous_post->title}} </a></h3>
                                    </div>
                                @endif
							</div>
							<div class="col-lg-6 align-self-center">
                                @if(isset($next_post))
								<div class="next_prv_single border_left3">
									<p>INAYOFUATA</p>
									<h3><a href="{{route('single_post',[$next_post->id,$next_post->title])}}">
                                        {{$next_post->title}}</a></h3>
								</div>
                                @endif
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="widget_tab md-mt-30">
						<ul class="nav nav-tabs">
							<li><a class="active" data-toggle="tab" href="#post1">ZINAZOFANANA</a>
							</li>
							<li><a data-toggle="tab" href="#post2" class="">Mpya</a>
							</li>
							<li><a data-toggle="tab" href="#post3" class="">Maarufu</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="post1" class="tab-pane fade in active show">
								<div class="widget tab_widgets mb30">
									@foreach($related as $popular)
                                        @if($popular->id != $post->id)
                                        <div class="single_post widgets_small">
                                            <div class="post_img">
                                                <div class="img_wrap">
                                                    <a href="{{route('single_post',[$popular->id,$popular->title])}}">
                                                        <img src="{{str_replace('wide.webp','thumb.webp',Storage::url($popular->image_url))}}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="single_post_text">
                                                <div class="meta2 meta_separator1">	<a href="{{route('single_post',[$popular->id,$popular->title])}}">{{$popular->post_category->name}}</a>
                                                    <a >{{date('M d, Y',strtotime($popular->post_date))}}</a>
                                                </div>
                                                <h4><a href="{{route('single_post',[$popular->id,$popular->title])}}">
                                                        {{$popular->title}}</a></h4>
                                            </div>
                                        </div>
                                        <div class="space-15"></div>
                                        <div class="border_black"></div>
                                        <div class="space-15"></div>
                                        @endif
                                    @endforeach
								</div>
							</div>
							<div id="post2" class="tab-pane fade">
								<div class="widget tab_widgets mb30">
									@foreach($related as $popular)
                                        @if($popular->id != $post->id)
                                        <div class="single_post widgets_small">
                                            <div class="post_img">
                                                <div class="img_wrap">
                                                    <a href="{{route('single_post',[$popular->id,$popular->title])}}">
                                                        <img src="{{str_replace('wide.webp','thumb.webp',Storage::url($popular->image_url))}}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="single_post_text">
                                                <div class="meta2 meta_separator1">	<a href="{{route('single_post',[$popular->id,$popular->title])}}">{{$popular->post_category->name}}</a>
                                                    <a >{{date('M d, Y',strtotime($popular->post_date))}}</a>
                                                </div>
                                                <h4><a href="{{route('single_post',[$popular->id,$popular->title])}}">
                                                        {{$popular->title}}</a></h4>
                                            </div>
                                        </div>
                                        <div class="space-15"></div>
                                        <div class="border_black"></div>
                                        <div class="space-15"></div>
                                        @endif
                                    @endforeach
								</div>
							</div>
							<div id="post3" class="tab-pane fade">
								<div class="widget tab_widgets mb30">
									@foreach($related as $popular)
                                        @if($popular->id != $post->id)
                                        <div class="single_post widgets_small">
                                            <div class="post_img">
                                                <div class="img_wrap">
                                                    <a href="{{route('single_post',[$popular->id,$popular->title])}}">
                                                        <img src="{{str_replace('wide.webp','thumb.webp',Storage::url($popular->image_url))}}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="single_post_text">
                                                <div class="meta2 meta_separator1">	<a href="{{route('single_post',[$popular->id,$popular->title])}}">{{$popular->post_category->name}}</a>
                                                    <a >{{date('M d, Y',strtotime($popular->post_date))}}</a>
                                                </div>
                                                <h4><a href="{{route('single_post',[$popular->id,$popular->title])}}">
                                                        {{$popular->title}}</a></h4>
                                            </div>
                                        </div>
                                        <div class="space-15"></div>
                                        <div class="border_black"></div>
                                        <div class="space-15"></div>
                                        @endif
                                    @endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="follow_box widget mb30">
						<h2 class="widget-title">Tufuate</h2>
						<div class="social_shares">
							<a class="single_social social_facebook" href="#">	<span class="follow_icon"><i class="fab fa-facebook-f"></i></span>
								34,456 <span class="icon_text">Fans</span>
							</a>
							<a class="single_social social_twitter" href="#">	<span class="follow_icon"><i class="fab fa-twitter"></i></span>
								34,456 <span class="icon_text">Followers</span>
							</a>
							<a class="single_social social_youtube" href="#">	<span class="follow_icon"><i class="fab fa-youtube"></i></span>
								34,456 <span class="icon_text">Subscribers</span>
							</a>
							<a class="single_social social_instagram" href="#">	<span class="follow_icon"><i class="fab fa-instagram"></i></span>
								34,456 <span class="icon_text">Followers</span>
							</a>
							<a class="single_social social_vimeo" href="#">	<span class="follow_icon"><i class="fab fa-vimeo-v"></i></span>
								34,456 <span class="icon_text">Followers</span>
							</a>
							<a class="single_social social_medium" href="#">	<span class="follow_icon"><i class="fab fa-medium-m"></i></span>
								34,456 <span class="icon_text">Followers</span>
							</a>
						</div>
					</div>
					<!--:::::: POST TYPE 3 START :::::::-->
					<div class="carousel_post_type3_wrap mb30">
						<h2 class="widget-title">Habari Zinazovuma</h2>
						<div class="carousel_post_type3 nav_style1 owl-carousel">

                            @foreach($related as $popular)
                                @if($popular->id != $post->id)
                                <div class="single_post post_type3">
                                    <div class="post_img">
                                        <img src="{{Storage::url($popular->image_url)}}" alt="">	<span class="tranding">
                                                    <i class="fas fa-bolt"></i>
                                                </span>
                                    </div>
                                    <div class="single_post_text">
                                        <div class="meta3">	<a href="#">{{$post->post_category->name}}</a>
                                            <a href="#">{{date('M d, Y',strtotime($popular->post_date))}}</a>
                                        </div>
                                        <h4><a href="{{route('single_post',[$popular->id,$popular->title])}}">
                                                {{$popular->title}}</a></h4>
                                        <div class="space-10"></div>
                                        <p class="post-p">
                                            {!! $popular->content = substr($popular->content, 0, 197) . '...' !!}
                                        </p>
                                    </div>
                                </div>
                                @endif
                            @endforeach

						</div>
					</div>
					<!--:::::: POST TYPE 3 END :::::::-->
					<!--:::::: POST TYPE 2 START :::::::-->
					<div class="widget tab_widgets mb30">

                        @foreach($populars as $popular)
                            @if($popular->id != $post->id)
                            <div class="single_post widgets_small">
                                <div class="post_img">
                                    <div class="img_wrap">
                                        <img src="{{Storage::url($popular->image_url)}}" alt="">
                                    </div>	<span class="tranding">
                                            <i class="fas fa-bolt"></i>
                                        </span>
                                </div>
                                <div class="single_post_text">
                                    <div class="meta2">	<a href="#">{{$popular->post_category->name}}</a>
                                        <a href="#">{{date('M d, Y',strtotime($popular->post_date))}}</a>
                                    </div>
                                    <h4><a href="{{route('single_post',[$popular->id,$popular->title])}}">
                                            {{$popular->title}}</a></h4>
                                </div>
                            </div>
                            <div class="space-15"></div>
                            <div class="border_black"></div>
                            <div class="space-15"></div>
                            @endif
                        @endforeach
					</div>
					<!--:::::: POST TYPE 2 END:::::::-->
					<div class="banner2 mb30">
						<a href="#">
							<img src="{{url('/')}}/mwangaza/assets/img/bg/sidebar-1.png" alt="">
						</a>
					</div>

					<div class="box widget news_letter mb30">
						<h2 class="widget-title">News Letter</h2>
						<p>Your email address will not be this published. Required fields are News Today.</p>
						<div class="space-20"></div>
						<div class="signup_form">
							<form action="https://quomodosoft.com/html/newsprk/index.html">
								<input class="signup" type="email" placeholder="Your email address">
								<input type="button" class="cbtn" value="sign up">
							</form>
							<div class="space-10"></div>
							<p>We hate spam as much as you do</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: ARCHIVE AREA END :::::::-->
	<div class="space-60"></div>
	<!--::::: LATEST BLOG AREA START :::::::-->
	<div class="fourth_bg padding6030">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading">
						<h2 class="widget-title">Our Latest Blog</h2>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="single_post post_type3 mb30">
						<div class="post_img">
							<a href="#">
								<img src="{{url('/')}}/mwangaza/assets/img/bg/video4.jpg" alt="">
							</a>
						</div>
						<div class="single_post_text">
							<div class="meta3">	<a href="#">TECHNOLOGY</a>
								<a href="#">March 26, 2020</a>
							</div>
							<h4><a href="post1.html">There may be no consoles in the future ea exec says</a></h4>
							<div class="space-10"></div>
							<p class="post-p">The property, complete with 30-seat screening from room, a 100-seat amphitheater and a swimming pond with sandy shower…</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="single_post post_type3 mb30">
						<div class="post_img">
							<a href="#">
								<img src="{{url('/')}}/mwangaza/assets/img/bg/video4.jpg" alt="">
							</a>
						</div>
						<div class="single_post_text">
							<div class="meta3">	<a href="#">TECHNOLOGY</a>
								<a href="#">March 26, 2020</a>
							</div>
							<h4><a href="post1.html">There may be no consoles in the future ea exec says</a></h4>
							<div class="space-10"></div>
							<p class="post-p">The property, complete with 30-seat screening from room, a 100-seat amphitheater and a swimming pond with sandy shower…</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="single_post post_type3 mb30">
						<div class="post_img">
							<a href="#">
								<img src="{{url('/')}}/mwangaza/assets/img/bg/video4.jpg" alt="">
							</a>
						</div>
						<div class="single_post_text">
							<div class="meta3">	<a href="#">TECHNOLOGY</a>
								<a href="#">March 26, 2020</a>
							</div>
							<h4><a href="post1.html">There may be no consoles in the future ea exec says</a></h4>
							<div class="space-10"></div>
							<p class="post-p">The property, complete with 30-seat screening from room, a 100-seat amphitheater and a swimming pond with sandy shower…</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: LATEST BLOG AREA END :::::::-->
	<div class="space-60"></div>
	<!--:::::  COMMENT FORM AREA START :::::::-->

	<div class="space-100"></div>
	<!--:::::  COMMENT FORM AREA END :::::::-->
	<!--::::: BANNER AREA START :::::::-->
	@include('mwangaza.partials.banner')
	<!--::::: BANNER AREA END :::::::-->
@endsection
