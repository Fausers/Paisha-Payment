<!--::::: SEARCH FORM START:::::::-->
	<div class="searching">
		<div class="container">
			<div class="row">
				<div class="col-8 text-center m-auto">
					<div class="v1search_form">
						<form action="{{route('search')}}" method="GET">
							<input type="search" name="key" placeholder="Search Here...">
							<button type="submit" class="cbtn1">Search</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="close_btn">	<i class="fa fa-times"></i>
		</div>
	</div>
	<!--:::::SEARCH FORM END :::::::-->



	<!--::::: TOP BAR START :::::::-->
	<div class="topbar mwangaza_bg" id="top">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-8 align-self-center">
					<div class="trancarousel_area">
						<p class="trand">Angaza</p>
						<div class="trancarousel owl-carousel nav_style1">
							<div class="trancarousel_item">
								<p><a href="#">Top 10 Best Movies of 2021 So Far: Great Movies</a>
								</p>
							</div>
							<div class="trancarousel_item">
								<p><a href="#">Top 10 Best Movies of 2021 So Far: Great Movies</a>
								</p>
							</div>
							<div class="trancarousel_item">
								<p><a href="#">Top 10 Best Movies of 2021 So Far: Great Movies</a>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 align-self-center">
					<div class="top_date_social text-right">
						<div class="paper_date text-white">
                            <p> {{date('D, M d, Y')}} </p>
						</div>
						<div class="social1">
							<ul class="inline">
								<li><a target="_blank" href="https://twitter.com/mwangazatz"><i class="fab fa-twitter text-white"></i></a>
								</li>
								<li><a target="_blank" href="https://facebook.com/MwangazaTnz"><i class="fab fa-facebook-f text-light"></i></a>
								</li>
								<li><a target="_blank" href="https://www.youtube.com/channel/UCENlrtMvbQXXPgEt0DjK2kw"><i class="fab fa-youtube text-light"></i></a>
								</li>
								<li><a target="_blank" href="https://www.instagram.com/mwangazatz_"><i class="fab fa-instagram text-light"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: TOP BAR END :::::::-->

	<div class="border_white"></div>

	<!--::::: LOGO AREA START  :::::::-->
	<div class="logo_area mwangaza_bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 align-self-center">
					<div class="logo">
						<a href="/">
							<img src="{{url('/')}}/images/Mwangaza Logo.png" alt="image">
						</a>
					</div>
				</div>
				<div class="col-lg-8 align-self-center">
					<div class="banner1">
						<a href="#">
							<img src="{{url('/')}}/mwangaza/assets/img/bg/banner1.png" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: LOGO AREA END :::::::-->


	<!--::::: MENU AREA START  :::::::-->
	<div class="main-menu" id="header">	<a href="#top" class="up_btn up_btn1"><i class="far fa-chevron-double-up"></i></a>
		<div class="main-nav clearfix is-ts-sticky dark-theme mwangaza_bg">
			<div class="container">
				<div class="row justify-content-between">

					<div class="col-9 ">
						<div class="newsprk_nav stellarnav">
							<ul id="newsprk_menu">
                                @foreach(\App\Models\Mwangaza\PostCategory::get() as $category)
								    <li ><a class="px-2" href="{{route('category',[$category->name])}}">{{$category->name}} </a></li>
                                @endforeach
								<li><a class="px-2" href="{{route('archive')}}">Maktaba</a></li>
								<li><a target="_blank" class="px-2" href="https://web.mpaper.co.tz/newspaper?keyword=&category=+&paper=165&date=">M-Paper</a></li>
							</ul>
						</div>
					</div>
					<div class="col-3 align-self-center">
						<div class="menu_right" style="margin-left: 0px">
							<div class="users_area">
								<ul class="inline">
									<li class="search_btn"><i class="far fa-search"></i>
									</li>
									<li><i class="fa fa-user-circle"></i>
									</li>
								</ul>
							</div>

							<div class="temp d-none d-lg-block">
								<div class="temp_wap">
									<div class="temp_icon">
										<img src="{{url('/')}}/mwangaza/assets/img/icon/temp.png" alt="">
									</div>
									<h3 class="temp_count">31</h3>
									<p class="text-light">Dar es salaam</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--::::: MENU AREA END :::::::-->
	