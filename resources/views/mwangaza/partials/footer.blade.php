<div class="footer footer_area1 mwangaza_bg">
		<div class="container">
			<div class="cta">
				<div class="row">
					<div class="col-md-6 align-self-center">
						<div class="footer_logo logo">
							<a href="/">
								<img src="{{url('/')}}/images/Mwangaza Logo.png" alt="logo">
							</a>
						</div>
						<div class="social2">
							<ul class="inline">
								<li><a target="_blank" href="https://www.instagram.com/mwangazatz_"><i class="fab fa-instagram"></i></a>
								</li>
								<li><a target="_blank" href="https://facebook.com/MwangazaTnz"><i class="fab fa-facebook-f"></i></a>
								</li>
								<li><a target="_blank" href="https://www.youtube.com/channel/UCENlrtMvbQXXPgEt0DjK2kw"><i class="fab fa-youtube"></i></a>
								</li>
								<li><a target="_blank" href="https://twitter.com/mwangazatz"><i class="fab fa-twitter"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-4 offset-lg-2 align-self-center">
						<div class="signup_form">
							<form action="https://quomodosoft.com/html/newsprk/index.html" method="post">
								<input class="signup" type="email" placeholder="Your email address">
								<input type="button" class="cbtn" value="sign up">
							</form>
							<p>We hate spam as much as you do</p>
						</div>
					</div>
				</div>
			</div>
			<div class="border_white"></div>
			<div class="space-40"></div>
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="row">
						<div class="col-sm-6 col-lg">
							<div class="single_footer_nav border_white_right">
								<h3 class="widget-title2">News categories</h3>
								<div class="row">
									<div class="col-lg-6">
										<ul>
											@foreach(\App\Models\Mwangaza\PostCategory::get() as $category)
											<li ><a class="px-2" href="{{route('category',[$category->name])}}">{{$category->name}} </a></li>
										@endforeach
										</ul>
									
									</div>
									<div class="col-lg-6">
										<ul>
											<li><a href="#">Education</a>
											</li>
											<li><a href="#">Obituaries</a>
											</li>
											<li><a href="#">Corrections</a>
											</li>
											<li><a href="#">Education</a>
											</li>
											<li><a href="#">Today’s Paper</a>
											</li>
											<li><a href="#">Corrections</a>
											</li>
											<li><a href="#">Foods</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg">
							<div class="single_footer_nav">
								<h3 class="widget-title2">Living</h3>
								<div class="row">
									<div class="col-lg-6">
										<ul>
											<li><a href="#">Crossword</a>
											</li>
											<li><a href="#">Food</a>
											</li>
											<li><a href="#">Automobiles</a>
											</li>
											<li><a href="#">Education</a>
											</li>
											<li><a href="#">Health</a>
											</li>
											<li><a href="#">Magazine</a>
											</li>
											<li><a href="#">Weddings</a>
											</li>
										</ul>
									</div>
									<div class="col-lg-6">
										<ul>
											<li><a href="#">Classifieds</a>
											</li>
											<li><a href="#">Photographies</a>
											</li>
											<li><a href="#">NYT Store</a>
											</li>
											<li><a href="#">Journalisms</a>
											</li>
											<li><a href="#">Public Editor</a>
											</li>
											<li><a href="#">Tools & Services</a>
											</li>
											<li><a href="#">My Account</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="space-40"></div>
					<div class="border_white"></div>
					<div class="space-40"></div>
					<div class="row">
						<div class="col-sm-6 col-lg-5">
							<div class="single_footer_nav border_white_right">
								<h3 class="widget-title2">Opinion</h3>
								<div class="row">
									<div class="col-lg-6">
										<ul>
											<li><a href="#">Today’s Opinion</a>
											</li>
											<li><a href="#">Op-Ed Contributing</a>
											</li>
											<li><a href="#">Contributing Writers</a>
											</li>
											<li><a href="#">Business News</a>
											</li>
											<li><a href="#">Collections</a>
											</li>
											<li><a href="#">Today’s Paper</a>
											</li>
											<li><a href="#">Saturday Review</a>
											</li>
											<li><a href="#">Product Review</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-7">
							<div class="twitter_feeds">
								<h3 class="widget-title2">Twitter feed</h3>
								<div class="single_twitter_feed border_white_bottom">
									<div class="twitter_feed_icon">	<i class="fab fa-twitter"></i>
									</div>
									<h6>Cyber Monday Sale, Save 33% on Jannah theme during our year-end Sale, Purchase a new license for your next project… <span>@newspark #TECHNOLOGY https://dribbble.com/subash_chandra</span></h6>
									<p>March 26, 2021</p>
								</div>
								<div class="single_twitter_feed">
									<div class="twitter_feed_icon">	<i class="fab fa-twitter"></i>
									</div>
									<h6>Cyber Monday Sale, Save 33% on Jannah theme during our year-end Sale, Purchase a new license for your next project… <span>@newspark #TECHNOLOGY https://dribbble.com/subash_chandra</span></h6>
									<p>March 26, 2021</p>
								</div>
								<div class="single_twitter_feed">
									<div class="twitter_feed_icon">	<i class="fab fa-twitter"></i>
									</div>
									<h6>Cyber Monday Sale, Save 33% on Jannah theme during our year-end Sale, Purchase a new license for your next project… <span>@newspark #TECHNOLOGY https://dribbble.com/subash_chandra</span></h6>
									<p>March 26, 2021</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="extra_newss border_white_left pl-4">
						<h3 class="widget-title2">More news</h3>
						<div class="single_extra_news border_white_bottom">
							<p>TECHNOLOGY <span> / March 26, 2021</span>
							</p>	<a href="#">Nancy zhang a chinese busy woman and dhaka</a>
							<span class="news_counter">1</span>
						</div>
						<div class="single_extra_news border_white_bottom">
							<p>TECHNOLOGY <span> / March 26, 2021</span>
							</p>	<a href="#">Nancy zhang a chinese busy woman and dhaka</a>
							<span class="news_counter">2</span>
						</div>
						<div class="single_extra_news border_white_bottom">
							<p>TECHNOLOGY <span> / March 26, 2021</span>
							</p>	<a href="#">Nancy zhang a chinese busy woman and dhaka</a>
							<span class="news_counter">3</span>
						</div>
						<div class="single_extra_news border_white_bottom">
							<p>TECHNOLOGY <span> / March 26, 2021</span>
							</p>	<a href="#">Nancy zhang a chinese busy woman and dhaka</a>
							<span class="news_counter">4</span>
						</div>
						<div class="single_extra_news">
							<p>TECHNOLOGY <span> / March 26, 2021</span>
							</p>	<a href="#">Nancy zhang a chinese busy woman and dhaka</a>
							<span class="news_counter">5</span>
						</div>
						<div class="space-40"></div>
						<div class="border_white_bottom"></div>
						<div class="space-40"></div>
						<div class="footer_contact">
							<h3 class="widget-title2">Newspark news services</h3>
							<div class="single_fcontact">
								<div class="fcicon">
									<img src="{{url('/')}}/mwangaza/assets/img/icon/mobile.png" alt="">
								</div>	<a href="#">On your mobile</a>
							</div>
							<div class="single_fcontact">
								<div class="fcicon">
									<img src="{{url('/')}}/mwangaza/assets/img/icon/speacker.png" alt="">
								</div>	<a href="#">On smart speakers</a>
							</div>
							<div class="single_fcontact">
								<div class="fcicon">
									<img src="{{url('/')}}/mwangaza/assets/img/icon/evelope.png" alt="">
								</div>	<a href="#">Contact Newspark news</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 align-self-center">
						<p>&copy; Copyright {{date('Y')}}, All Rights Reserved</p>
					</div>
					<div class="col-lg-6 align-self-center">
						<div class="copyright_menus text-right">
							<div class="language"></div>
							<div class="copyright_menu inline">
								<ul>
									<li><a href="{{route('about')}}">About</a>
									</li>
									<li><a href="#">Advertise</a>
									</li>
									<li><a href="#">Privacy & Policy</a>
									</li>
									<li><a href="{{route('our_contacts')}}">Contact Us</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
