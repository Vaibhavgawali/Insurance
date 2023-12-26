<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insurance Next</title>
	<meta name="description" content="Insurin - Insurance Company HTML Template">
	<meta name="keywords" content="	accounting, advising, advisory, business, company, consulting, corporate, finance, financial, investments, law, multi-purpose, services, tax help, visual composer">
	<meta name="author" content="Themexriver">
	<link rel="shortcut icon" href="{{ asset('assets/img/logo/logo-1.png')}}" type="image/x-icon">
	<meta name="base-url" content="{{ url('/') }}">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/video.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/rs6.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/roundslider.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/global.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>
<body class="insurin-main">
	<div id="preloader"></div>
	<div class="up">
		<a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
	</div>
	
<!-- Start of header section
	============================================= -->
	<header id="in-header" class="in-header-section header-style-six">
		
		<div class="in-header-top-content d-flex justify-content-between align-items-center">
			<div class="brand-logo d-flex p-2 align-items-center">
				<a href="#"><img src="{{asset('assets/img/logo/logo1.png')}}" alt=""></a>
				<marquee class="top-text-scroll" style="margin-left:40px;" direction="right" scrollamount="3">Empower Your Future: Navigate the Insurance Career Landscape with us  </marquee>
                 
			</div>
			

		</div>
		
		<div class="ins-header-main-navigation-area d-flex align-items-center justify-content-between">
			<div class="ins-header-sidenav-cta d-flex align-items-center">
				<div class="in-sidebar-btn navSidebar-button">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="ins-nav-cta d-flex align-items-center">
					<span><img src="{{asset('assets/img/logo/fire.svg')}}" alt=""></span> Hot Line: +1 800 123 456
				</div>
			</div>
			<div class="main-navigation-menu">
				<nav class="in-main-navigation-area clearfix ul-li">
					<ul id="main-nav" class="nav navbar-nav clearfix">
						<li class="dropdown in-megamenu">
							<a href="/">Home</a>
						</li>
						<li><a target="_blank" href="about.html">About Us</a></li>
						<li class="dropdown">
							<a href="!#">Insights</a>
							<ul class="dropdown-menu clearfix">
								<li><a  href="#">Media Coverage</a></li>
								<li><a  href="#">Legal Operation</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="!#">Pages</a>
							<ul class="dropdown-menu clearfix">
								<li><a target="_blank" href="service.html">Services</a></li>
								<li><a target="_blank" href="service-2.html">Service Page 2</a></li>
								<li class="dropdown">
									<a href="service-single.html">Services Details</a>
									<ul class="dropdown-menu clearfix">
										<li><a  href="service-single.html">Life Insurence</a></li>
										<li><a  href="service-single.html">Health Insurence</a></li>
										<li><a  href="service-single.html">Car Insurence</a></li>
										<li><a  href="service-single.html">Home Insurence</a></li>
										<li><a  href="service-single.html">Credit Insurence</a></li>
										<li><a  href="service-single.html">Transport Insurence</a></li>
										<li><a  href="service-single.html">Energy Insurence</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a href="!#">Testimonial</a>
									<ul class="dropdown-menu clearfix">
										<li><a  href="testimonial.html">Testimonial</a></li>
										<li><a  href="testimonial-carousel.html">Testimonial Carousel</a></li>

									</ul>
								</li>
								<li><a  href="team.html">Team Page</a></li>
								<li><a  href="team-single.html">Team Details</a></li>
								<li><a  href="faq.html">FAQ Page</a></li>
								<li><a  href="pricing.html">Pricing Page</a></li>
								<li><a  href="contact.html">Contact Page</a></li>
								<li><a  href="insurance-calculator.html">Insurence Calculator</a></li>
								<li><a  href="404.html">404</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="" href="!#">Blog</a>
							<ul class="dropdown-menu clearfix">
								<li><a  href="blog-list.html">News </a></li>
								<li><a  href="blog-grid.html">News Grid</a></li>
								<li><a  href="blog-list-2.html">News List</a></li>
								<li><a  href="blog-slider.html">News Slider</a></li>
								<li><a  href="blog-single.html">News Details</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="" href="!#">Portfolio</a>
							<ul class="dropdown-menu clearfix">
								<li><a  href="portfolio-slide.html">Portfolio Slide </a></li>
								<li><a  href="portfolio-grid.html">Portfolio Grid</a></li>
								<li><a  href="portfolio-masonry.html">Porfolio Masonry</a></li>
								<li><a  href="portfolio-single.html">Portfolio Details</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a class="btn btn-outline-success p-2" href="!#">Register/Login</a>
							<ul class="dropdown-menu clearfix">
								<li><a   href="/candidate-register">Candidate</a></li>
								<li><a  href="/insurer-register">Insurer</a></li>
								<li><a  href="/institute-register">Institute</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="mobile_menu position-relative">
			<div class="mobile_menu_button open_mobile_menu">
				<i class="fal fa-bars"></i>
			</div>
			<div class="mobile_menu_wrap">
				<div class="mobile_menu_overlay open_mobile_menu"></div>
				<div class="mobile_menu_content">
					<div class="mobile_menu_close open_mobile_menu">
						<i class="fal fa-times"></i>
					</div>
					<div class="m-brand-logo">
						<a  href="!#"><img src="assets/img/logo/logo-1.png" alt=""></a>
					</div>
					<nav class="mobile-main-navigation  clearfix ul-li">
						<ul id="m-main-nav" class="nav navbar-nav clearfix">
							<li class=" in-megamenu">
								<a href="/">Home</a>
							</li>
							
							<li><a target="_blank" href="about.html">About Us</a></li>
							<li class="dropdown">
								<a href="!#">Insights</a>
								<ul class="dropdown-menu clearfix">
									<li><a target="_blank" href="#">Media Coverage</a></li>
									<li><a target="_blank" href="#">Legal Operation</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="!#">Pages</a>
								<ul class="dropdown-menu clearfix">
									<li><a target="_blank" href="service.html">Services</a></li>
									<li><a target="_blank" href="service-2.html">Service Page 2</a></li>
									<li class="dropdown">
										<a href="service-single.html">Services Details</a>
										<ul class="dropdown-menu clearfix">
											<li><a target="_blank" href="service-single.html">Life Insurence</a></li>
											<li><a target="_blank" href="service-single.html">Health Insurence</a></li>
											<li><a target="_blank" href="service-single.html">Car Insurence</a></li>
											<li><a target="_blank" href="service-single.html">Home Insurence</a></li>
											<li><a target="_blank" href="service-single.html">Credit Insurence</a></li>
											<li><a target="_blank" href="service-single.html">Transport Insurence</a></li>
											<li><a target="_blank" href="service-single.html">Energy Insurence</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a href="!#">Testimonial</a>
										<ul class="dropdown-menu clearfix">
											<li><a target="_blank" href="testimonial.html">Testimonial</a></li>
											<li><a target="_blank" href="testimonial-carousel.html">Testimonial Carousel</a></li>
											
										</ul>
									</li>
									<li><a target="_blank" href="team.html">Team Page</a></li>
									<li><a target="_blank" href="team-single.html">Team Details</a></li>
									<li><a target="_blank" href="faq.html">FAQ Page</a></li>
									<li><a target="_blank"  href="pricing.html">Pricing Page</a></li>
									<li><a target="_blank" href="contact.html">Contact Page</a></li>
									<li><a target="_blank" href="insurance-calculator.html">Insurence Calculator</a></li>
									<li><a target="_blank" href="404.html">404</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="" href="!#">Blog</a>
								<ul class="dropdown-menu clearfix">
									<li><a target="_blank" href="blog-list.html">News </a></li>
									<li><a target="_blank" href="blog-grid.html">News Grid</a></li>
									<li><a target="_blank" href="blog-list-2.html">News List</a></li>
									<li><a target="_blank" href="blog-slider.html">News Slider</a></li>
									<li><a target="_blank" href="blog-single.html">News Details</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="" href="!#">Portfolio</a>
								<ul class="dropdown-menu clearfix">
									<li><a target="_blank" href="portfolio-slide.html">Portfolio Slide </a></li>
									<li><a target="_blank" href="portfolio-grid.html">Portfolio Grid</a></li>
									<li><a target="_blank" href="portfolio-masonry.html">Porfolio Masonry</a></li>
									<li><a  href="portfolio-single.html">Portfolio Details</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="btn btn-outline-success " id="mobile-register-btn" href="!#">Register/Login</a>
								<ul class="dropdown-menu clearfix">
									<li><a   href="/candidate-register">Candidate</a></li>
									<li><a  href="/insurer-register">Insurer</a></li>
									<li><a  href="/institute-register">Institute</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<!-- /Mobile-Menu -->
		</div>
	</header>
	<!-- Sidebar sidebar Item -->
	<div class="xs-sidebar-group info-group">
		<div class="xs-overlay xs-bg-black">
			<div class="row loader-area">
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
				<div class="col-3 preloader-wrap">
					<div class="loader-bg"></div>
				</div>
			</div>
		</div>
		<div class="xs-sidebar-widget">
			<div class="sidebar-widget-container">
				<div class="widget-heading">
					<a href="#" class="close-side-widget">
						X
					</a>
				</div>
				<div class="sidebar-textwidget">

					<div class="sidebar-info-contents headline pera-content">
						<div class="content-inner">
							<div class="logo">
								<a href="index.html"><img src="{{asset('assets/img/logo/logo-1.png')}}" alt=""></a>
							</div>
							<div class="content-box">
								<h5>About Us</h5>
								<p class="text">The argument in favor of using filler text goes something like this: If you use real content in the Consulting Process, anytime you reach a review point you’ll end up reviewing and negotiating the content itself and not the design.</p>
							</div>
							<div class="gallery-box ul-li">
								<h5>Gallery</h5>
								<ul class="zoom-gallery">
									<li><a href="{{asset('assets/img/gallery/gl1.png')}}" data-source="assets/img/gallery/gl1.png"><img src="{{asset('assets/img/gallery/gl1.png')}}" alt=""></a></li>
									<li><a href="{{asset('assets/img/gallery/gl2.png')}}" data-source="assets/img/gallery/gl2.png"><img src="{{asset('assets/img/gallery/gl2.png')}}" alt=""></a></li>
									<li><a href="{{asset('assets/img/gallery/gl3.png')}}" data-source="assets/img/gallery/gl3.png"><img src="{{asset('assets/img/gallery/gl3.png')}}" alt=""></a></li>
									<li><a href="{{asset('assets/img/gallery/gl4.png')}}" data-source="assets/img/gallery/gl4.png"><img src="{{asset('assets/img/gallery/gl4.png')}}" alt=""></a></li>
									<li><a href="{{asset('assets/img/gallery/gl5.png')}}" data-source="assets/img/gallery/gl4.png"><img src="{{asset('assets/img/gallery/gl5.png')}}" alt=""></a></li>
									<li><a href="{{asset('assets/img/gallery/gl6.png')}}" data-source="assets/img/gallery/gl4.png"><img src="{{asset('assets/img/gallery/gl6.png')}}" alt=""></a></li>
								</ul>
							</div>
							<div class="content-box">
								<h5>Social Account</h5>
								<ul class="social-box">
									<li><a href="https://www.facebook.com/" class="fab fa-facebook-f"></a></li>
									<li><a href="https://www.twitter.com/" class="fab fa-twitter"></a></li>
									<li><a href="https://dribbble.com/" class="fab fa-instargram"></a></li>
									<li><a href="https://www.linkedin.com/" class="fab fa-linkedin"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Start of header section
	============================================= -->
