@extends('layouts.mwangaza')
@section('content')
    <!--::::: ARCHIVE AREA START :::::::-->
	<div class="archives padding-top-30">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-8">
					<div class="businerss_news">
						<div class="row">
							<div class="col-12 align-self-center">
								<div class="categories_title">
									<h5><a>{{$category->name}}</a></h5>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
                                @foreach($posts as $post)
								<div class="single_post post_type3 post_type12 mb30">
									<div class="post_img">
										<div class="img_wrap">
											<a href="{{route('single_post',[$post->id,$post->title])}}">
												<img src="{{Storage::url($post->image_url)}}" alt="">
											</a>
										</div>
									</div>
									<div class="single_post_text">
										<div class="meta3">	<a href="#">{{$post->author->name}}</a>
											<a href="#">{{date('M d, Y',strtotime($post->post_date))}}</a>
										</div>
										<h4><a href="{{route('single_post',[$post->id,$post->title])}}">{{$post->title}}</a></h4>
										<div class="space-10"></div>
										<p class="post-p">
                                            {!! $post->desc = substr($post->desc, 0, 157) . '...' !!}
                                        </p>
										<div class="space-20"></div>
                                        <a href="{{route('single_post',[$post->id,$post->title])}}" class="readmore">Read more</a>
									</div>
								</div>
                                @endforeach


							</div>

							<div class="row">
								<div class="col-12">
{{--										<div class="cpagination padding5050">--}}
{{--											<nav aria-label="Page navigation example">--}}
{{--												<ul class="pagination">--}}
{{--													<li class="page-item">--}}
{{--														<a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true"><i class="fas fa-caret-left"></i></span>--}}
{{--														</a>--}}
{{--													</li>--}}
{{--													<li class="page-item"><a class="page-link" href="#">1</a>--}}
{{--													</li>--}}
{{--													<li class="page-item"><a class="page-link" href="#">..</a>--}}
{{--													</li>--}}
{{--													<li class="page-item"><a class="page-link" href="#">5</a>--}}
{{--													</li>--}}
{{--													<li class="page-item">--}}
{{--														<a class="page-link" href="#" aria-label="Next"> <span aria-hidden="true"><i class="fas fa-caret-right"></i></span>--}}
{{--														</a>--}}
{{--													</li>--}}
{{--												</ul>--}}
{{--											</nav>--}}
{{--										</div>--}}
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
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
											<div class="meta2 meta_separator1">	<a href="#">{{$popular->post_category->name}}</a>
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
												<a href="#">
													<img src="{{str_replace('wide.webp','thumb.webp',Storage::url($popular->image_url))}}" alt="">
												</a>
											</div>
										</div>
										<div class="single_post_text">
											<div class="meta2 meta_separator1">	<a href="#">{{$popular->post_category->name}}</a>
												<a >{{date('M d, Y',strtotime($popular->post_date))}}</a>
											</div>
											<h4><a href="#">
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
											<div class="img_wrap">
												<a href="#">
													<img src="{{str_replace('wide.webp','thumb.webp',Storage::url($popular->image_url))}}" alt="">
												</a>
											</div>
										</div>
										<div class="single_post_text">
											<div class="meta2 meta_separator1">	<a href="#">{{$popular->post_category->name}}</a>
												<a >{{date('M d, Y',strtotime($popular->post_date))}}</a>
											</div>
											<h4><a href="#">
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

                    <div class="carousel_post_type3_wrap mb30">
						<h2 class="widget-title">Zinazovuma</h2>
						<div class="carousel_post_type3 nav_style1 owl-carousel">

                            @foreach($category->popular as $popular)
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
					<!--:::::: POST TYPE 4 END :::::::-->
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
					<div class="follow_box widget mb30">
						<h2 class="widget-title">Follow Us</h2>
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
					<!--:::::: POST TYPE 2 END:::::::-->
					<div class="banner2 mb30">
						<a href="#">
							<img src="{{url('/')}}/mwangaza/assets/img/bg/sidebar-1.png" alt="">
						</a>
					</div>
					<!--:::::: POST TYPE 4 START :::::::-->
				</div>
			</div>
		</div>
	</div>
	<!--::::: ARCHIVE AREA END :::::::-->

    <!--::::: BANNER AREA START :::::::-->
	@include('mwangaza.partials.banner')
	<!--::::: BANNER AREA END :::::::-->
@endsection
