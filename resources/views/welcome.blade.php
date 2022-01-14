@extends('layouts.mwangaza')
@section('content')
    <div class="fifth_bg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="carousel_posts1 owl-carousel nav_style2 mb40 mt30">
						<!--CAROUSEL START-->

                        @foreach($posts as $post)
						<div class="single_post widgets_small post_type5">
							<div class="post_img">
								<div class="img_wrap">
									<a href="#">
										<img src="{{Storage::url($post->image_url)}}" alt="">
									</a>
								</div>
							</div>
							<div class="single_post_text">
								<h4><a href="{{route('single_post',[$post->id,$post->title])}}">
                                        {{$post->title}}</a></h4>
{{--								<p>People have been infected</p>--}}
							</div>
						</div>
                        @endforeach

					</div>
					<!--CAROUSEL END-->
				</div>
			</div>
		</div>
	</div>
	<!--::::: POST CAREOUSEL AREA END :::::::-->


	<!--::::: POST GALLARY AREA START :::::::-->
	<div class="post_gallary_area fifth_bg mb40">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-xl-8">
							<div class="slider_demo2">
                                @foreach($posts->reverse() as $post)
								<div class="single_post post_type6 xs-mb30">
									<div class="post_img gradient1">
										<img loading="lazy" src="{{Storage::url($post->image_url)}}" alt="">
{{--                                        <span class="tranding">--}}
{{--											<i class="fas fa-play"></i>--}}
{{--										</span>--}}
									</div>
									<div class="single_post_text">
										<div class="meta meta_separator1 ">	<a href="#" class="uppercase">{{$post->post_category->name}}</a>
											<a href="#">{{date('M d, Y',strtotime($post->post_date))}}</a>
										</div>
										<h4><a class="" href="{{route('single_post',[$post->id,$post->title])}}">
                                                {{$post->title}}
                                            </a></h4>
										<div class="space-10"></div>
										<p class="post-p">
                                            {!! $post->desc = substr($post->desc, 0, 197) . '...' !!}</p>
									</div>
								</div>
                                @endforeach

							</div>
							<div class="slider_demo1">
                                @foreach($posts as $post)
								<div class="single_gallary_item">
									<img loading="lazy" src="{{str_replace('wide.webp','thumb.webp',Storage::url($post->image_url))}}" alt="image">
								</div>
                                @endforeach
							</div>
						</div>
						<div class="col-xl-4">
							<div class="widget_tab md-mt-30">

								<ul class="nav nav-tabs">
							<li><a class="active" data-toggle="tab" href="#post1">Maarufu</a>
							</li>
							<li><a data-toggle="tab" href="#post2" class="">Mpya</a>
							</li>
							<li><a data-toggle="tab" href="#post3" class="">Zinazofanana</a>
							</li>
						</ul>

						<div class="tab-content">
							<div id="post1" class="tab-pane fade in active show">
								<div class="widget tab_widgets mb30">
                                    @foreach($category->popular as $popular)
									<div class="single_post widgets_small">
										<div class="post_img">
											<div class="img_wrap">
												<a href="{{route('single_post',[$popular->id,$popular->title])}}">
													<img src="{{str_replace('wide.webp','thumb.webp',Storage::url($popular->image_url))}}" alt="">
												</a>
											</div>
										</div>
										<div class="single_post_text">
											<div class="meta2 meta_separator1">	<a class="uppercase" href="{{route('category',[$post->post_category->name])}}">{{$popular->post_category->name}}</a>
												<a >{{date('M d, Y',strtotime($popular->post_date))}}</a>
											</div>
											<h4><a href="{{route('single_post',[$popular->id,$popular->title])}}">
                                                    {{$popular->title}}</a></h4>
										</div>
									</div>
									<div class="space-15"></div>
									<div class="border_black"></div>
									<div class="space-15"></div>
                                    @endforeach
								</div>
							</div>
							<div id="post2" class="tab-pane fade">
								<div class="widget tab_widgets mb30">

                                    @foreach($category->new as $popular)
									<div class="single_post widgets_small">
										<div class="post_img">
											<div class="img_wrap">
												<a href="{{route('single_post',[$popular->id,$popular->title])}}">
													<img src="{{str_replace('wide.webp','thumb.webp',Storage::url($popular->image_url))}}" alt="">
												</a>
											</div>
										</div>
										<div class="single_post_text">
											<div class="meta2 meta_separator1">	<a class="uppercase" href="{{route('category',[$post->post_category->name])}}">{{$popular->post_category->name}}</a>
												<a >{{date('M d, Y',strtotime($popular->post_date))}}</a>
											</div>
											<h4><a href="{{route('single_post',[$popular->id,$popular->title])}}">
                                                    {{$popular->title}}</a></h4>
										</div>
									</div>
									<div class="space-15"></div>
									<div class="border_black"></div>
									<div class="space-15"></div>
                                    @endforeach

								</div>
							</div>
							<div id="post3" class="tab-pane fade">
								<div class="widget tab_widgets mb30">
                                    @foreach($category->popular as $popular)
									<div class="single_post widgets_small">
										<div class="post_img">
											<div class="ig_wrap">
												<a href="{{route('single_post',[$popular->id,$popular->title])}}">
													<img src="{{str_replace('wide.webp','thumb.webp',Storage::url($popular->image_url))}}" alt="">
												</a>
											</div>
										</div>
										<div class="single_post_text">
											<div class="meta2 meta_separator1">	<a class="uppercase" href="{{route('category',[$post->post_category->name])}}"class="uppercase" href="{{route('category',[$post->post_category->name])}}"post_category->name}}</a>
												<a >{{date('M d, Y',strtotime($popular->post_date))}}</a>
											</div>
											<h4><a href="{{route('single_post',[$popular->id,$popular->title])}}">
                                                    {{$popular->title}}</a></h4>
										</div>
									</div>
									<div class="space-15"></div>
									<div class="border_black"></div>
									<div class="space-15"></div>
                                    @endforeach
                                </div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!--::::: POST GALLARY AREA END :::::::-->


	<!--::::: TRANDING CAROUSEL AREA START :::::::-->
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-8">
				<h2 class="widget-title">Zinazovuma</h2>
				<div class="carousel_post2_type3 nav_style1 owl-carousel">

					<!--CAROUSEL START-->
                    @foreach($trending as $post)
					<div class="single_post post_type3">
						<div class="post_img">
							<div class="img_wrap">
								<img src="{{Storage::url($post->image_url)}}" alt="">
							</div>
{{--                            <span class="tranding">--}}
{{--								<i class="fas fa-bolt"></i>--}}
{{--							</span>--}}
						</div>
						<div class="single_post_text">
							<div class="meta3">
                                <a class="uppercase" href="{{route('category',[$post->post_category->name])}}">
                                    {{$post->post_category->name}}</a>
								<a href="#">{{date('M d, Y',strtotime($post->post_date))}}</a>
							</div>
							<h4><a href="{{route('single_post',[$post->id,$post->title])}}">
                                    {{$post->title}}</a></h4>
							<div class="space-10"></div>
							<p class="post-p">
                                {!! $post->desc = substr($post->desc, 0, 157) . '...' !!}
                            </p>
						</div>
					</div>
                    @endforeach

				</div>
				<div class="border_black"></div>
				<div class="space-30"></div>
				<div class="row">
					<div class="col-lg-6">

                        @foreach($trending2 as $post)
						<div class="single_post widgets_small">
							<div class="post_img">
								<div class="img_wrap">
									<img loading="lazy" src="{{Storage::url($post->image_url)}}" alt="">
								</div>	<span class="tranding">
									<i class="fas fa-bolt"></i>
								</span>
							</div>
							<div class="single_post_text">
								<div class="meta2">	<a href="{{route('category',[$post->post_category->name])}}">
                                        {{$post->post_category->name}}</a>
									<a href="{{date('M d, Y',strtotime($post->post_date))}}"> </a>
								</div>
								<h4><a href="{{route('single_post',[$post->id,$post->title])}}">{{$post->title}}</a></h4>
							</div>
						</div>

                            @if(!$loop->last)
                                <div class="space-15"></div>
                                <div class="border_black"></div>
                                <div class="space-15"></div>
                            @endif
                        @endforeach


					</div>
					<div class="col-lg-6">

						@foreach($trending3 as $post)
						<div class="single_post widgets_small">
							<div class="post_img">
								<div class="img_wrap">
									<img loading="lazy" src="{{Storage::url($post->image_url)}}" alt="">
								</div>	<span class="tranding">
									<i class="fas fa-bolt"></i>
								</span>
							</div>
							<div class="single_post_text">
								<div class="meta2">	<a href="{{route('category',[$post->post_category->name])}}">
                                        {{$post->post_category->name}}</a>
									<a href="{{date('M d, Y',strtotime($post->post_date))}}"> </a>
								</div>
								<h4><a href="{{route('single_post',[$post->id,$post->title])}}">
                                        {{$post->title}}</a></h4>
							</div>
						</div>

						    @if(!$loop->last)
                                <div class="space-15"></div>
                                <div class="border_black"></div>
                                <div class="space-15"></div>
                            @endif
                        @endforeach

					</div>
				</div>
			</div>
			<div class="col-md-12 col-lg-4">
				<div class="follow_box widget mb30 mt-md-60">
					<h2 class="widget-title">Tufuate</h2>
					<div class="social_shares">
						<a target="_blank" class="single_social social_facebook" href="https://facebook.com/MwangazaTnz">	<span class="follow_icon"><i class="fab fa-facebook-f"></i></span>
							34,456 <span class="icon_text">Fans</span>
						</a>
						<a target="_blank" class="single_social social_twitter" href="https://twitter.com/mwangazatz">	<span class="follow_icon"><i class="fab fa-twitter"></i></span>
							34,456 <span class="icon_text">Followers</span>
						</a>
						<a target="_blank" class="single_social social_youtube" href="https://www.youtube.com/channel/UCENlrtMvbQXXPgEt0DjK2kw">	<span class="follow_icon"><i class="fab fa-youtube"></i></span>
							34,456 <span class="icon_text">Subscribers</span>
						</a>
						<a target="_blank" class="single_social social_instagram" href="https://www.instagram.com/mwangazatz_">	<span class="follow_icon"><i class="fab fa-instagram"></i></span>
							34,456 <span class="icon_text">Followers</span>
						</a>
						<a target="_blank" class="single_social social_vimeo" href="#">	<span class="follow_icon"><i class="fab fa-vimeo-v"></i></span>
							34,456 <span class="icon_text">Followers</span>
						</a>
						<a target="_blank" class="single_social social_medium" href="#">	<span class="follow_icon"><i class="fab fa-medium-m"></i></span>
							34,456 <span class="icon_text">Followers</span>
						</a>
					</div>
				</div>
				<!--:::::: POST TYPE 2 START :::::::-->
				<div class="widget tab_widgets mb30">
					<h2 class="widget-title">Mpya Maarufu</h2>
					<div class="post_type2_carousel owl-carousel nav_style1">
						<!--CAROUSEL START-->
						<div class="single_post2_carousel">

                            @foreach($trending_new as $post)
                                <div class="single_post widgets_small type8">
                                    <div class="post_img">
                                        <div class="img_wrap">
                                            <img src="{{Storage::url($post->image_url)}}" alt="">
                                        </div>	<span class="tranding">
                                            <i class="fas fa-bolt"></i>
                                        </span>
                                    </div>
                                    <div class="single_post_text">
                                        <div class="meta2">	<a href="#">{{$post->post_category->name}}</a>
                                            <a>{{date('M d, Y',strtotime($post->post_date))}}</a>
                                        </div>
                                        <h4><a href="{{route('single_post',[45,'Hello'])}}">
                                            @if (strlen($post->title) > 45)
                                                {!! $post->title = substr($post->title, 0, 42) . '...' !!}
                                            @else
                                                {{$post->title}}
                                            @endif
                                            </a></h4>
                                    </div>
                                    <div class="type8_count">
                                        <h2>{{ $loop->iteration }}</h2>
                                    </div>
                                </div>

                                @if(!$loop->last)
                                    <div class="space-15"></div>
                                    <div class="border_black"></div>
                                    <div class="space-15"></div>
                                @endif
                            @endforeach

						</div>
						<div class="single_post2_carousel">
							<div class="single_post widgets_small type8">
								<div class="post_img">
									<div class="img_wrap">
										<img src="{{url('/')}}/mwangaza/assets/img/most_view/mostsm1.jpg" alt="">
									</div>	<span class="tranding">
										<i class="fas fa-bolt"></i>
									</span>
								</div>
								<div class="single_post_text">
									<div class="meta2">	<a href="#">TECHNOLOGY</a>
										<a href="#">March 26, 2020</a>
									</div>
									<h4><a href="{{route('single_post',[45,'Hello'])}}">Nancy zhang a chinese busy woman and dhaka</a></h4>
								</div>
								<div class="type8_count">
									<h2>1</h2>
								</div>
							</div>
							<div class="space-15"></div>
							<div class="border_black"></div>
							<div class="space-15"></div>
							<div class="single_post widgets_small type8">
								<div class="post_img">
									<div class="img_wrap">
										<img src="{{url('/')}}/mwangaza/assets/img/most_view/mostsm2.jpg" alt="">
									</div>
								</div>
								<div class="single_post_text">
									<div class="meta2">	<a href="#">TECHNOLOGY</a>
										<a href="#">March 26, 2020</a>
									</div>
									<h4><a href="{{route('single_post',[45,'Hello'])}}">The billionaire Philan thropist read to learn</a></h4>
								</div>
								<div class="type8_count">
									<h2>2</h2>
								</div>
							</div>
							<div class="space-15"></div>
							<div class="border_black"></div>
							<div class="space-15"></div>
							<div class="single_post widgets_small type8">
								<div class="post_img">
									<div class="img_wrap">
										<img src="{{url('/')}}/mwangaza/assets/img/most_view/mostsm3.jpg" alt="">
									</div>	<span class="tranding">
										<i class="fas fa-bolt"></i>
									</span>
								</div>
								<div class="single_post_text">
									<div class="meta2">	<a href="#">TECHNOLOGY</a>
										<a href="#">March 26, 2020</a>
									</div>
									<h4><a href="{{route('single_post',[45,'Hello'])}}">Cheap smartphone sensor could help you</a></h4>
								</div>
								<div class="type8_count">
									<h2>3</h2>
								</div>
							</div>
							<div class="space-15"></div>
							<div class="border_black"></div>
							<div class="space-15"></div>
							<div class="single_post widgets_small type8">
								<div class="post_img">
									<div class="img_wrap">
										<img src="{{url('/')}}/mwangaza/assets/img/most_view/mostsm4.jpg" alt="">
									</div>	<span class="tranding">
										<i class="fas fa-bolt"></i>
									</span>
								</div>
								<div class="single_post_text">
									<div class="meta2">	<a href="#">TECHNOLOGY</a>
										<a href="#">March 26, 2020</a>
									</div>
									<h4><a href="{{route('single_post',[45,'Hello'])}}">Class property employ ancho red multi</a></h4>
								</div>
								<div class="type8_count">
									<h2>4</h2>
								</div>
							</div>
							<div class="space-15"></div>
							<div class="border_black"></div>
							<div class="space-15"></div>
							<div class="single_post widgets_small type8">
								<div class="post_img">
									<div class="img_wrap">
										<img src="{{url('/')}}/mwangaza/assets/img/most_view/mostsm5.jpg" alt="">
									</div>
								</div>
								<div class="single_post_text">
									<div class="meta2">	<a href="#">TECHNOLOGY</a>
										<a href="#">March 26, 2020</a>
									</div>
									<h4><a href="{{route('single_post',[45,'Hello'])}}">Best garden wing supplies for the horticu</a></h4>
								</div>
								<div class="type8_count">
									<h2>5</h2>
								</div>
							</div>
							<div class="space-15 ldnane"></div>
							<div class="border_black ldnane"></div>
							<div class="space-15 ldnane"></div>
							<div class="single_post widgets_small type8 ldnane">
								<div class="post_img">
									<div class="img_wrap">
										<img src="{{url('/')}}/mwangaza/assets/img/blog/blog_small3.jpg" alt="">
									</div>
								</div>
								<div class="single_post_text">
									<div class="meta2">	<a href="#">TECHNOLOGY</a>
										<a href="#">March 26, 2020</a>
									</div>
									<h4><a href="{{route('single_post',[45,'Hello'])}}">Ratiffe to be Director of nation talent Trump</a></h4>
								</div>
								<div class="type8_count">
									<h2>6</h2>
								</div>
							</div>
						</div>
					</div>
					<!--CAROUSEL END-->
				</div>
			</div>
		</div>
	</div>
	<!--::::: TRANDING CAROUSEL AREA END :::::::-->
	<!--::::: MIX CAROUSEL AREA START :::::::-->
	<div class="half_bg1 mix_area">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="mix_carousel">
						<!--CAROUSEL START-->
						<div class="single_mix_carousel owl-carousel nav_style3">
                            @foreach($latest_video as $vid)
							<div class="single_post post_type6 post_type9">
								<div class="post_img gradient1">
									<div class="img_wrap">
										<a class="play_btn" href="{{route('single_post',[$vid->id,$post->title])}}">
											<img src="{{Storage::url($vid->image_url)}}" alt="{{$vid->title}}">
										</a>
									</div>	<span class="tranding">
										<i class="fas fa-play"></i>
									</span>
								</div>
								<div class="single_post_text">
									<div class="meta">	<a href="#">{{$vid->post_category->name}}</a>
										<a href="#">{{date('M d, Y',strtotime($vid->post_date))}}</a>
									</div>
									<h4><a href="{{route('single_post',[$vid->id,$vid->title])}}">{{$vid->title}}</a></h4>
								</div>
							</div>
                            @endforeach

						</div>
					</div>
					<!--CAROUSEL END-->
				</div>
			</div>
		</div>
		<div class="space-60"></div>
	</div>
	<!--::::: MIX CAROUSEL AREA END :::::::-->

	<!--::::: VIDEO POST AREA START :::::::-->
	<div class="video_posts pt30 half_bg60">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="heading white">
						<h2 class="widget-title">Habari za Video</h2>
					</div>
				</div>
			</div>
			<div class="space-50"></div>
			<div class="viceo_posts_wrap">
				<div class="row">
					<div class="col-lg-8">
						<div class="single_post post_type3 post_type11 margintop-60- xs-mb30">
							<div class="post_img">
								<div class="img_wrap">
									<a href="#" class="play_btn">
										<img src="{{Storage::url($big_vid->first()->image_url)}}" alt="">
									</a>
								</div>	<a href="{{route('single_post',[$big_vid->first()->id,$big_vid->first()->title])}}" class="youtube_middle"><i class="fab fa-youtube"></i></a>
							</div>
							<div class="single_post_text padding30 fourth_bg">
								<div class="meta3">	<a >{{$big_vid->first()->post_category->name}}</a>
									<a href="{{route('single_post',[$big_vid->first()->id,$big_vid->first()->title])}}">{{date('M d, Y',strtotime($big_vid->first()->post_date))}}</a>
								</div>
								<h4><a href="{{route('single_post',[$big_vid->first()->id,$big_vid->first()->title])}}">
                                        {{$big_vid->first()->title}}
                                    </a></h4>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="popular_carousel_area mb30 md-mt-30">
							<h2 class="widget-title">Popular Posts</h2>
							<div class="popular_carousel owl-carousel nav_style1">
								<!--CAROUSEL START-->
								<div class="popular_items">
									<div class="single_post type10 widgets_small mb15">
										<div class="post_img">
											<div class="img_wrap">
												<a href="#">
													<img src="{{url('/')}}/mwangaza/assets/img/popular/popularsm1.jpg" alt="">
												</a>
											</div>	<span class="tranding tranding_border">
												1
											</span>
										</div>
										<div class="single_post_text">
											<h4><a href="{{route('single_post',[45,'Hello'])}}">The property complete with a 30 seat screen room.</a></h4>
											<div class="meta4">	<a href="#">TECHNOLOGY</a>
											</div>
										</div>
									</div>
									<div class="single_post type10 widgets_small mb15">
										<div class="post_img">
											<div class="img_wrap">
												<a href="#">
													<img src="{{url('/')}}/mwangaza/assets/img/popular/popularsm2.jpg" alt="">
												</a>
											</div>	<span class="tranding tranding_border">
												2
											</span>
										</div>
										<div class="single_post_text">
											<h4><a href="{{route('single_post',[45,'Hello'])}}">Cheap smartphone sensor could help you old.</a></h4>
											<div class="meta4">	<a href="#">TECHNOLOGY</a>
											</div>
										</div>
									</div>
									<div class="single_post type10 widgets_small mb15">
										<div class="post_img">
											<div class="img_wrap">
												<a href="#">
													<img src="{{url('/')}}/mwangaza/assets/img/popular/popularsm3.jpg" alt="">
												</a>
											</div>	<span class="tranding tranding_border">
												3
											</span>
										</div>
										<div class="single_post_text">
											<h4><a href="{{route('single_post',[45,'Hello'])}}">Harbour amid a Slowen the down in singer city</a></h4>
											<div class="meta4">	<a href="#">TECHNOLOGY</a>
											</div>
										</div>
									</div>
									<div class="single_post type10 widgets_small mb15">
										<div class="post_img">
											<div class="img_wrap">
												<a href="#">
													<img src="{{url('/')}}/mwangaza/assets/img/popular/popularsm4.jpg" alt="">
												</a>
											</div>	<span class="tranding tranding_border">
												4
											</span>
										</div>
										<div class="single_post_text">
											<h4><a href="{{route('single_post',[45,'Hello'])}}">The secret to moving this from sphinx screening</a></h4>
											<div class="meta4">	<a href="#">TECHNOLOGY</a>
											</div>
										</div>
									</div>
									<div class="single_post type10 widgets_small ldnane">
										<div class="post_img">
											<div class="img_wrap">
												<a href="#">
													<img src="{{url('/')}}/mwangaza/assets/img/popular/popularsm5.jpg" alt="">
												</a>
											</div>	<span class="tranding tranding_border">
												5</span>
										</div>
										<div class="single_post_text">
											<h4><a href="{{route('single_post',[45,'Hello'])}}">The secret to moving this from sphinx screening</a></h4>
											<div class="meta4">	<a href="#">TECHNOLOGY</a>
											</div>
										</div>
									</div>
								</div>
								<div class="popular_items">
									<div class="single_post type10 widgets_small mb15">
										<div class="post_img">
											<div class="img_wrap">
												<a href="#">
													<img src="{{url('/')}}/mwangaza/assets/img/popular/popularsm1.jpg" alt="">
												</a>
											</div>	<span class="tranding tranding_border">
												1
											</span>
										</div>
										<div class="single_post_text">
											<h4><a href="{{route('single_post',[45,'Hello'])}}">The property complete with a 30 seat screen room.</a></h4>
											<div class="meta4">	<a href="#">TECHNOLOGY</a>
											</div>
										</div>
									</div>
									<div class="single_post type10 widgets_small mb15">
										<div class="post_img">
											<div class="img_wrap">
												<a href="#">
													<img src="{{url('/')}}/mwangaza/assets/img/popular/popularsm2.jpg" alt="">
												</a>
											</div>	<span class="tranding tranding_border">
												2
											</span>
										</div>
										<div class="single_post_text">
											<h4><a href="{{route('single_post',[45,'Hello'])}}">Cheap smartphone sensor could help you old.</a></h4>
											<div class="meta4">	<a href="#">TECHNOLOGY</a>
											</div>
										</div>
									</div>
									<div class="single_post type10 widgets_small mb15">
										<div class="post_img">
											<div class="img_wrap">
												<a href="#">
													<img src="{{url('/')}}/mwangaza/assets/img/popular/popularsm3.jpg" alt="">
												</a>
											</div>	<span class="tranding tranding_border">
												3
											</span>
										</div>
										<div class="single_post_text">
											<h4><a href="{{route('single_post',[45,'Hello'])}}">Harbour amid a Slowen the down in singer city</a></h4>
											<div class="meta4">	<a href="#">TECHNOLOGY</a>
											</div>
										</div>
									</div>
									<div class="single_post type10 widgets_small mb15">
										<div class="post_img">
											<div class="img_wrap">
												<a href="#">
													<img src="{{url('/')}}/mwangaza/assets/img/popular/popularsm4.jpg" alt="">
												</a>
											</div>	<span class="tranding tranding_border">
												4
											</span>
										</div>
										<div class="single_post_text">
											<h4><a href="{{route('single_post',[45,'Hello'])}}">The secret to moving this from sphinx screening</a></h4>
											<div class="meta4">	<a href="#">TECHNOLOGY</a>
											</div>
										</div>
									</div>
									<div class="single_post type10 widgets_small ldnane">
										<div class="post_img">
											<div class="img_wrap">
												<a href="#">
													<img src="{{url('/')}}/mwangaza/assets/img/popular/popularsm5.jpg" alt="">
												</a>
											</div>	<span class="tranding tranding_border">
												5</span>
										</div>
										<div class="single_post_text">
											<h4><a href="{{route('single_post',[45,'Hello'])}}">The secret to moving this from sphinx screening</a></h4>
											<div class="meta4">	<a href="#">TECHNOLOGY</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--CAROUSEL END-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: VIDEO POST AREA END :::::::-->
	<!--::::: ENTERTAINMENT AREA START :::::::-->
	<div class="entertrainments">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
                    @foreach($categories as $categ)
					<div class="row">
                        <div class="col-6 align-self-center">
                            <h2 class="widget-title">{{$categ->name}}</h2>
                        </div>
                        <div class="col-6 text-right align-self-center">	<a href="#" class="see_all mb20">See All</a>
                        </div>
                    </div>
					<div class="entertrainment_carousel mb30">
						<!--CAROUSEL START-->
						<div class="entertrainment_item">
							<div class="row justify-content-center">
                                @foreach($categ->four_posts as $post)
								<div class="col-md-6">
									<div class="single_post post_type3 mb30">
										<div class="post_img">
											<div class="img_wrap">
												<a href="{{route('single_post',[$post->id,$post->title])}}">
													<img src="{{Storage::url($post->image_url)}}" alt="">
												</a>
											</div>
										</div>
										<div class="single_post_text">
											<div class="meta3">	<a href="{{route('single_post',[$post->id,$post->title])}}">{{$post->post_category->name}}</a>
												<a href="{{route('single_post',[$post->id,$post->title])}}">{{date('M d, Y',strtotime($post->post_date))}}</a>
											</div>
											<h4><a href="{{route('single_post',[$post->id,$post->title])}}">
                                                    {{$post->title}}</a></h4>
											<div class="space-10"></div>
											<p class="post-p">

                                            </p>
										</div>
									</div>
								</div>
                                @endforeach
							</div>
						</div>
					</div>

                        <div class="banner_area mt50 mb60 xs-mt60">
                            <a href="#">
                                <img src="{{url('/')}}/mwangaza/assets/img/bg/banner1.png" alt="">
                            </a>
                        </div>
                    @endforeach


				</div>

{{--            Not Here Budy!!     --}}
				<div class="col-lg-4">
					<div class="row">
						<div class="col-lg-6 col-lg-12">
							<!--:::::: POST TYPE 4 START :::::::-->
							<div class="widget mb30">
								<h2 class="widget-title">Most share</h2>
								<div class="widget4_carousel owl-carousel nav_style1">
									<!--CAROUSEL START-->
									<div class="carousel_items">
										<div class="single_post widgets_small widgets_type4">
											<div class="post_img number">
												<h2>1</h2>
											</div>
											<div class="single_post_text">
												<div class="meta2">	<a href="#">TECHNOLOGY</a>
													<a href="#">March 26, 2020</a>
												</div>
												<h4><a href="{{route('single_post',[45,'Hello'])}}">Nancy zhang a chinese busy woman and dhaka</a></h4>
												<ul class="inline socail_share">
													<li>	<a href="#"><i class="fab fa-twitter"></i>2.2K</a>
													</li>
													<li>	<a href="#"><i class="fab fa-facebook-f"></i>2.2K</a>
													</li>
												</ul>
												<div class="space-15"></div>
												<div class="border_black"></div>
											</div>
										</div>
										<div class="space-15"></div>
										<div class="single_post widgets_small widgets_type4">
											<div class="post_img number">
												<h2>2</h2>
											</div>
											<div class="single_post_text">
												<div class="meta2">	<a href="#">TECHNOLOGY</a>
													<a href="#">March 26, 2020</a>
												</div>
												<h4><a href="{{route('single_post',[45,'Hello'])}}">Harbour amid a Slowen down in singer city</a></h4>
												<ul class="inline socail_share">
													<li>
                                                        <a href="#"><i class="fab fa-twitter"></i>2.2K</a>
													</li>
													<li>	<a href="#"><i class="fab fa-facebook-f"></i>2.2K</a>
													</li>
												</ul>
												<div class="space-15"></div>
												<div class="border_black"></div>
											</div>
										</div>
										<div class="space-15"></div>
										<div class="single_post widgets_small widgets_type4">
											<div class="post_img number">
												<h2>3</h2>
											</div>
											<div class="single_post_text">
												<div class="meta2">	<a href="#">TECHNOLOGY</a>
													<a href="#">March 26, 2020</a>
												</div>
												<h4><a href="{{route('single_post',[45,'Hello'])}}">Cheap smartphone sensor could help you old food safe</a></h4>
												<ul class="inline socail_share">
													<li>	<a href="#"><i class="fab fa-twitter"></i>2.2K</a>
													</li>
													<li>	<a href="#"><i class="fab fa-facebook-f"></i>2.2K</a>
													</li>
												</ul>
												<div class="space-15"></div>
												<div class="border_black"></div>
											</div>
										</div>
										<div class="space-15"></div>
										<div class="single_post widgets_small widgets_type4">
											<div class="post_img number">
												<h2>4</h2>
											</div>
											<div class="single_post_text">
												<div class="meta2">	<a href="#">TECHNOLOGY</a>
													<a href="#">March 26, 2020</a>
												</div>
												<h4><a href="{{route('single_post',[45,'Hello'])}}">Nancy zhang a chinese busy woman and dhaka</a></h4>
												<ul class="inline socail_share">
													<li>	<a href="#"><i class="fab fa-twitter"></i>2.2K</a>
													</li>
													<li>	<a href="#"><i class="fab fa-facebook-f"></i>2.2K</a>
													</li>
												</ul>
												<div class="space-15"></div>
												<div class="border_black"></div>
											</div>
										</div>
										<div class="space-15"></div>
										<div class="single_post widgets_small widgets_type4">
											<div class="post_img number">
												<h2>5</h2>
											</div>
											<div class="single_post_text">
												<div class="meta2">	<a href="#">TECHNOLOGY</a>
													<a href="#">March 26, 2020</a>
												</div>
												<h4><a href="{{route('single_post',[45,'Hello'])}}">The secret to moving this ancient sphinx screening</a></h4>
												<ul class="inline socail_share">
													<li>	<a href="#"><i class="fab fa-twitter"></i>2.2K</a>
													</li>
													<li>	<a href="#"><i class="fab fa-facebook-f"></i>2.2K</a>
													</li>
												</ul>
												<div class="space-15"></div>
												<div class="border_black"></div>
											</div>
										</div>
									</div>
									<div class="carousel_items">
										<div class="single_post widgets_small widgets_type4">
											<div class="post_img number">
												<h2>1</h2>
											</div>
											<div class="single_post_text">
												<div class="meta2">	<a href="#">TECHNOLOGY</a>
													<a href="#">March 26, 2020</a>
												</div>
												<h4><a href="{{route('single_post',[45,'Hello'])}}">Nancy zhang a chinese busy woman and dhaka</a></h4>
												<ul class="inline socail_share">
													<li>	<a href="#"><i class="fab fa-twitter"></i>2.2K</a>
													</li>
													<li>	<a href="#"><i class="fab fa-facebook-f"></i>2.2K</a>
													</li>
												</ul>
												<div class="space-15"></div>
												<div class="border_black"></div>
											</div>
										</div>
										<div class="space-15"></div>
										<div class="single_post widgets_small widgets_type4">
											<div class="post_img number">
												<h2>2</h2>
											</div>
											<div class="single_post_text">
												<div class="meta2">	<a href="#">TECHNOLOGY</a>
													<a href="#">March 26, 2020</a>
												</div>
												<h4><a href="{{route('single_post',[45,'Hello'])}}">Harbour amid a Slowen down in singer city</a></h4>
												<ul class="inline socail_share">
													<li>	<a href="#"><i class="fab fa-twitter"></i>2.2K</a>
													</li>
													<li>	<a href="#"><i class="fab fa-facebook-f"></i>2.2K</a>
													</li>
												</ul>
												<div class="space-15"></div>
												<div class="border_black"></div>
											</div>
										</div>
										<div class="space-15"></div>
										<div class="single_post widgets_small widgets_type4">
											<div class="post_img number">
												<h2>3</h2>
											</div>
											<div class="single_post_text">
												<div class="meta2">	<a href="#">TECHNOLOGY</a>
													<a href="#">March 26, 2020</a>
												</div>
												<h4><a href="{{route('single_post',[45,'Hello'])}}">Cheap smartphone sensor could help you old food safe</a></h4>
												<ul class="inline socail_share">
													<li>	<a href="#"><i class="fab fa-twitter"></i>2.2K</a>
													</li>
													<li>	<a href="#"><i class="fab fa-facebook-f"></i>2.2K</a>
													</li>
												</ul>
												<div class="space-15"></div>
												<div class="border_black"></div>
											</div>
										</div>
										<div class="space-15"></div>
										<div class="single_post widgets_small widgets_type4">
											<div class="post_img number">
												<h2>4</h2>
											</div>
											<div class="single_post_text">
												<div class="meta2">	<a href="#">TECHNOLOGY</a>
													<a href="#">March 26, 2020</a>
												</div>
												<h4><a href="{{route('single_post',[45,'Hello'])}}">Nancy zhang a chinese busy woman and dhaka</a></h4>
												<ul class="inline socail_share">
													<li>	<a href="#"><i class="fab fa-twitter"></i>2.2K</a>
													</li>
													<li>	<a href="#"><i class="fab fa-facebook-f"></i>2.2K</a>
													</li>
												</ul>
												<div class="space-15"></div>
												<div class="border_black"></div>
											</div>
										</div>
										<div class="space-15"></div>
										<div class="single_post widgets_small widgets_type4">
											<div class="post_img number">
												<h2>5</h2>
											</div>
											<div class="single_post_text">
												<div class="meta2">	<a href="#">TECHNOLOGY</a>
													<a href="#">March 26, 2020</a>
												</div>
												<h4><a href="{{route('single_post',[45,'Hello'])}}">The secret to moving this ancient sphinx screening</a></h4>
												<ul class="inline socail_share">
													<li>	<a href="#"><i class="fab fa-twitter"></i>2.2K</a>
													</li>
													<li>	<a href="#"><i class="fab fa-facebook-f"></i>2.2K</a>
													</li>
												</ul>
												<div class="space-15"></div>
												<div class="border_black"></div>
											</div>
										</div>
										<div class="space-15"></div>
									</div>
								</div>
								<!--CAROUSEL END-->
							</div>
							<!--:::::: POST TYPE 4 END :::::::-->
						</div>
						<div class="col-lg-6 col-lg-12">
							<!--:::::: POST TYPE 13 START:::::::-->
							<div class="widget upcomming_macth mb30">
								<div class="row">
									<div class="col-8 align-self-center">
										<h2 class="widget-title">Upcoming Matches</h2>
									</div>
									<div class="col-4 text-right align-self-center">	<a href="#" class="see_all mb20">See All</a>
									</div>
								</div>
								<div class="single_post post_type13 widgets_small">
									<div class="post_img">
										<a href="#">
											<img src="{{url('/')}}/mwangaza/assets/img/flag/match1.png" alt="">
										</a>
									</div>
									<div class="single_post_text">
										<h4><a href="#" class="playing_teams">Germany <span>VS &nbsp;</span>France</a></h4>
										<p class="meta macth_meta">Tomorrow &nbsp;|&nbsp;<span> M22:30 (CST) </span> &nbsp;</p>
									</div>
									<div class="circle_match_time">
										<div class="first_circle circle"></div>
									</div>
								</div>
								<div class="space-10"></div>
								<div class="border_black"></div>
								<div class="space-10"></div>
								<div class="single_post post_type13 widgets_small">
									<div class="post_img">
										<a href="#">
											<img src="{{url('/')}}/mwangaza/assets/img/flag/match2.png" alt="">
										</a>
									</div>
									<div class="single_post_text">
										<h4><a href="#" class="playing_teams">Spain <span>VS &nbsp;</span>Portugal</a></h4>
										<p class="meta macth_meta">Tomorrow&nbsp;|&nbsp;<span> M22:30 (CST) </span> &nbsp;</p>
									</div>
									<div class="circle_match_time">
										<div class="second_circle circle"></div>
									</div>
								</div>
								<div class="space-10"></div>
								<div class="border_black"></div>
								<div class="space-10"></div>
								<div class="single_post post_type13 widgets_small">
									<div class="post_img">
										<a href="#">
											<img src="{{url('/')}}/mwangaza/assets/img/flag/match3.png" alt="">
										</a>
									</div>
									<div class="single_post_text">
										<h4><a href="#" class="playing_teams">Russia <span>VS &nbsp;</span>Italy</a></h4>
										<p class="meta macth_meta">Tomorrow&nbsp;|&nbsp;<span> M22:30 (CST) </span> &nbsp;</p>
									</div>
									<div class="circle_match_time">
										<div class="third_circle circle"></div>
									</div>
								</div>
								<div class="space-10"></div>
								<div class="border_black"></div>
								<div class="space-10"></div>
								<div class="single_post post_type13 widgets_small">
									<div class="post_img">
										<a href="#">
											<img src="{{url('/')}}/mwangaza/assets/img/flag/match4.png" alt="">
										</a>
									</div>
									<div class="single_post_text">
										<h4><a href="#" class="playing_teams">Croatia <span>VS &nbsp;</span>England</a></h4>
										<p class="meta macth_meta">Tomorrow&nbsp;|&nbsp;<span> M22:30 (CST) </span> &nbsp;</p>
									</div>
									<div class="circle_match_time">
										<div class="fourth_circle circle"></div>
									</div>
								</div>
								<div class="space-10"></div>
								<div class="border_black"></div>
								<div class="space-10"></div>
								<div class="single_post post_type13 widgets_small">
									<div class="post_img">
										<a href="#">
											<img src="{{url('/')}}/mwangaza/assets/img/flag/match5.png" alt="">
										</a>
									</div>
									<div class="single_post_text">
										<h4><a href="#" class="playing_teams">Germany <span>VS &nbsp;</span>France</a></h4>
										<p class="meta macth_meta">Tomorrow&nbsp;|&nbsp;<span> M22:30 (CST) </span> &nbsp;</p>
									</div>
									<div class="circle_match_time">
										<div class="fifth_circle circle"></div>
									</div>
								</div>
							</div>
							<!--:::::: POST TYPE 13 END:::::::-->
						</div>
						<div class="col-lg-6 col-lg-12">
							<div class="box widget news_letter mb30">
								<h2 class="widget-title">News Letter</h2>
								<p>Your email address will not be this published. Required fields are News Today.</p>
								<div class="space-20"></div>
								<div class="signup_form">
									<form action="https://quomodosoft.com/html/newsprk/index.html">
										<input class="signup" type="email" placeholder="Your email">
										<input type="button" class="cbtn" value="sign up">
									</form>
									<div class="space-10"></div>
									<p>We hate spam as much as you do</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-lg-12">
							<div class="widget category mb30">
								<div class="row">
									<div class="col-6 align-self-center">
										<h2 class="widget-title">Categories</h2>
									</div>
									<div class="col-6 text-right align-self-center">	<a href="#" class="see_all mb20">See All</a>
									</div>
								</div>
								<ul>
									<li>
										<a href="#" style="background: url({{url('/')}}/mwangaza/assets/img/categories/category1.jpg);">	<span>Restaurant</span>
											<img src="{{url('/')}}/mwangaza/assets/img/icon/union.png" alt="">
										</a>
									</li>
									<li>
										<a href="entertrainment.html" style="background: url({{url('/')}}/mwangaza/assets/img/categories/category2.jpg);">	<span>Entertainment</span>
											<img src="{{url('/')}}/mwangaza/assets/img/icon/union.png" alt="">
										</a>
									</li>
									<li>
										<a href="feature.html" style="background: url({{url('/')}}/mwangaza/assets/img/categories/category3.jpg);">	<span>Feature</span>
											<img src="{{url('/')}}/mwangaza/assets/img/icon/union.png" alt="">
										</a>
									</li>
									<li>
										<a href="business.html" style="background: url({{url('/')}}/mwangaza/assets/img/categories/category4.jpg);">	<span>Business</span>
											<img src="{{url('/')}}/mwangaza/assets/img/icon/union.png" alt="">
										</a>
									</li>
									<li>
										<a href="trending.html" style="background: url({{url('/')}}/mwangaza/assets/img/categories/category5.jpg);">	<span>Trending</span>
											<img src="{{url('/')}}/mwangaza/assets/img/icon/union.png" alt="">
										</a>
									</li>
									<li>
										<a href="sports.html" style="background: url({{url('/')}}/mwangaza/assets/img/categories/category6.jpg);">	<span>Sports</span>
											<img src="{{url('/')}}/mwangaza/assets/img/icon/union.png" alt="">
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6 col-lg-12">
							<div class="banner2 mb30">
								<a href="#">
									<img src="{{url('/')}}/mwangaza/assets/img/bg/sidebar-1.png" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: ENTERTAINMENT AREA END :::::::-->
	<div class="space-70"></div>
@endsection
