@extends('frontend/layouts.main')
@section('main-section')
<!-- Start of Slider section
	============================================= -->
	<section id="ins-slider-six" class="ins-slider-six-section position-relative">
		<div class="banner-social position-absolute">
			<a href="#">Twitter</a>
			<a href="#">Facebook</a>
			<a href="#">Instagram</a>
		</div>
		
		<div class="ins-slider-wrapper-six position-relative">
			<span class="ins-slider-print position-absolute"><img src="{{asset('assets/img/slider/print.png')}}" alt=""></span>
			<div class="ins-slider-area-six">
				<div class="ins-slider-item-six position-relative">
					<h1 style="margin-bottom: 50px;;" class="text-center text-dark pb-30 top-heading">insurancecareer.in - Empower Your Future</h1>
					<div class="container">
						<div class="row top-images-section ">
							<div class="col-12 col-md-4 col-lg-4">
								 <div class="d-flex flex-column align-items-center justify-content-center mb-3 ">
									<div >
									<img style="width:100%;padding-bottom: 10px;" src="{{asset('assets/img/top/1.png')}}" alt="">
									</div>
									<a class="btn btn-outline-secondary btn" role="button" aria-disabled="true" href="/industry">Click Here</a>
							   </div>
							</div>
							<div class="col-12 col-md-4 col-lg-4">
								<div class="d-flex flex-column align-items-center justify-content-center mb-3 ">
									<div >
									<img style="width:100%;padding-bottom: 10px;" src="{{asset('assets/img/top/2.png')}}" alt="">
									</div>
									<a class="btn btn-outline-secondary btn" role="button" aria-disabled="true" href="/module">Click Here</a>
							   </div>
							</div>
							<div class="col-12 col-md-4 col-lg-4">
								<div class="d-flex flex-column align-items-center justify-content-center mb-3 ">
									<div >
									<img style="width:100%;padding-bottom: 10px;" src="{{asset('assets/img/top/3.png')}}" alt="">
									</div>
									<a class="btn btn-outline-secondary btn" role="button" aria-disabled="true" href="/candidate">Click Here</a>
							   </div>
							</div>
						</div>
						<div class="row top-info-section">
							<div class="col-12 col-md-4 col-lg-4 top-info-div p-10 ">
								<div class="top-icon-div text-uppercase">
									 <span class="text-dark fs-3 text-lowercase">insurancecareer.in</span>
								</div>
								<div class="pt-3 ">
								<h1 class="fs-5">Navigate the Insurance Career Landscape with us.</h1> 
								<p>One Platform to get 360° view of the industry, learn, get certified and explore career opportunities in Insurance Sector.</p>
								</div>
							</div>
							<div class="col-12 col-md-64 col-lg-4 top-about-div ">
								<img src="./assets/img/3D-images/Education.gif" alt="">
							</div>
							<div class="col-12 col-md-64 col-lg-4 top-about-div">
                               <div class="top-about-content">
								 <p class="fs-5"><span class="text-success fw-bolder">insurancecareer.in</span> is committed to add value to the Insurance Industry by providing this platform which shall cater to impart knowledge & facilitate rewarding & glorious career for its users.</p>
							      <h2 style="margin-right: 30px;" class="fs-6 text-end ">Prabhat Bajaj, Insurance Veteran</h2> 
							   </div>
							</div>
						</div>
						<div style="padding: 0 !important;" class="row top-register-section ">
							<div class="col-12 col-md-6 col-lg-6 top-register-div  rounded-start">
								<h4 class="text-center text-dark  p-2">Get certified and explore career </h4>
                               <div>
								  <h2>Register And Start Your Career</h2>
								  <a href="/login">Click Here</a>
							   </div>
							</div>
							<div class="col-12 col-md-6 col-lg-6 top-intrest-div rounded-end">
								<h4 class="text-center text-dark  p-2">Put your current insurance career on fast track</h4>
								 <div>
									<h2>Express your interest</h2>
								<a href="/industry">Click Here</a>
								 </div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div> 
	</section>
<!-- End of Slider section
	============================================= -->

	<!-- Upload cv Section start -->
	   <div class="container shadow-sm p-10 mb-5  rounded .bg-secondary">
		  <div class="row align-items-center ">
				 <div class="col-md-12">
					<a href="/login"><img  src="{{asset('assets/img/3D-images/Post Your CV Here.png')}}" alt=""></a>
				</div>
		  </div>
		  <section>
			   <div class="container">
				  <div class="">
					<h3 style=" 
				background: -webkit-linear-gradient(#eee, #FFB966);
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;">Multiple Channels to explore</h3>
				  </div>
				 <div class="swiper mySwiper p-4">
					<div class="wrapper swiper-wrapper">
						<div class="item swiper-slide p-1">
							<h4>Agency</h4>
						</div>
						<div class="item swiper-slide ">
						 <h4>Bank Assurance</h4>
						</div>
						<div class="item swiper-slide ">
						  <h4>Institutional Sales</h4>
						   </div>
						<div class="item swiper-slide">
						 <h4>Business Dev</h4>
						</div>
						<div class="item swiper-slide">
						 <h4>DM</h4>
						</div>
						<div class="item swiper-slide">
						  <h4>Marketing </h4>
						</div>
						<div class="item swiper-slide">
							<h4>Finance</h4>
						</div>
						<div class="item swiper-slide">
							<h4>Underwriting</h4>
						</div>
						<div class="item swiper-slide">
							<h4>Legal</h4>
						</div>
						<div class="item swiper-slide">
							<h4>Operations</h4>
						</div>
						<div class="item swiper-slide">
							<h4>Project Management</h4>
						</div>
				   </div>
				   <div style="color:#056251;font-size: 10px;size: 10px;" class="swiper-button-next"></div>
                   <div  style="color:#056251; font-size: 5px;" class="swiper-button-prev"></div>
				 </div>
			   </div>
		  </section>
	   </div>
	  	<!-- Upload cv Section End -->
	
	

<!-- Start of Sponsor section
	============================================= -->
			
<!-- End of Sponsor section
	============================================= -->

	<!--  Services Section Start -->
	<section id="in-service-page-service-1" class="in-service-page-service-section-1">
		<div class="ins-section-title-six text-center">
			<div class="ins-subtitle text-uppercase">
				<!-- <i class="fas fa-heart"></i> -->
			</div>
			<h2>Insurancecareer.in serves as
				<span class="ins-title-shape1"><img src="{{asset('assets/img/shape/title-sh1.svg')}}" alt=""></span>
				<!-- <span class="ins-title-shape2"><img src="assets/img/shape/title-sh2.svg" alt=""></span> -->
			</h2>
		</div>
		<div class="container">
			<div class="in-service-content-3">
				<div class="row justify-content-center">
					<div class="col-lg-6 col-md-6 ">
						<div  class="in-service-item-3 position-relative border border-3 border-warning">
							<div class="inner-text headline pera-content">
								<h3 class="text-success"><a href="#">InsureYourCareer</a></h3>
								<p>online Platform for other industries professionals to know and explore opportunities with promosing insurance industry career</p>
								<div class="ins-main-about-list-area ul-li-block">
									<ul>
										<li class="inner-text pera-content headline">Understand the industry</li>
										<li>Explore opportunity wrt your expertise & skill sets</li>
										<li> Next steps to way forward</li>
									</ul>
									<p><a href="/industry" class="btn btn-outline-success btn-sm ">Click here</a> to know more about the opportunity & Next Steps</p>
								</div>
								
							</div>
							
							<div class="inner-icon-btn d-flex align-items-center justify-content-between">
								<div class="inner-icon">
									<i  class="flaticon-home-insurance"></i>
								</div>
								<div class="inner-btn">
									<a class="d-flex align-items-center justify-content-center" href="/industry"><i class="far fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="in-service-item-3 position-relative border border-3 border-success">
							<div class="inner-text headline pera-content">
								<h3 class="text-success"><a href="#">ProInsureNetwork</a></h3>
								<p>online Platform for Existing Insurance Professionals at various levels to stay in touch with the community and explore better opportunities in the industry</p>
								<div class="ins-main-about-list-area ul-li-block">
									<ul>
										<li>Get to know the latest in the industry</li>
										<li>Use the platform to be in touch with the Community</li>
										<li>Explore your next level as you ready for future</li>
									</ul>
									<p><a href="/industry" class="btn btn-outline-success btn-sm ">Click here</a> to express your interest for your next move</p>
								</div>
								
							</div>
							
							<div class="inner-icon-btn d-flex align-items-center justify-content-between">
								<div class="inner-icon">
									<i  class="flaticon-home-insurance"></i>
								</div>
								<div class="inner-btn">
									<a class="d-flex align-items-center justify-content-center" href="/industry"><i class="far fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="in-service-item-3 position-relative border border-3 border-primary">
							<div class="inner-text headline pera-content">
								<h3 class="text-success"><a href="#" >LaunchPad Learning</a></h3>
								<p>online Platform for Candidates (Freshers or at initial levels) to learn, get practical knowledge and get certified</p>
								<div class="ins-main-about-list-area ul-li-block">
									<ul>
										<li>Moduels for practical learning</li>
										<li>Assessment & Certification</li>
										<li>Get referred for a great career in Insurance Industry</li>
									</ul>
									<br>
									<p><a href="/industry" class="btn btn-outline-success btn-sm ">Click here</a> to Register & start your Certification Now</p>
								</div>
								
							</div>
							
							<div class="inner-icon-btn d-flex align-items-center justify-content-between">
								<div class="inner-icon">
									<i  class="flaticon-home-insurance"></i>
								</div>
								<div class="inner-btn">
									<a class="d-flex align-items-center justify-content-center" href="/industry"><i class="far fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="in-service-item-3 position-relative border border-3 border-danger">
							<div class="inner-text headline pera-content">
								<h3 class="text-success"> <a href="#">InsureReady</a></h3>
								<p>Incubation of Insurance professionals to be absorbed at entry level by various Insurers</p>
								<div class="ins-main-about-list-area ul-li-block">
									<ul>
										<li >Platform for Institutes/Colleges for imparting professional & practical training to its students</li>
										<li>Online & Offline Courses</li>
										<li>Certifications and placement references</li>
									</ul>
									<br>
									<p><a href="/industry" class="btn btn-outline-success btn-sm ">Click here</a> to Register & know more</p>
								</div>
								
							</div>
							
							<div class="inner-icon-btn d-flex align-items-center justify-content-between">
								<div class="inner-icon">
									<i  class="flaticon-home-insurance"></i>
								</div>
								<div class="inner-btn">
									<a class="d-flex align-items-center justify-content-center" href="/industry"><i class="far fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>


	
	

				</div>
			</div>
		</div>
	</section>
	<!-- Services Section End -->
	

	<!-- Start of Testimonial section
	============================================= -->
	<section id="ins-testimonial-six" class="ins-testimonial-section-six">
		<div class="container ">
			<div class="ins-testimonial-six-top-content d-flex justify-content-between align-items-center ">
				<div class="ins-section-title-six pera-content">
					<div class="ins-subtitle text-uppercase">
						<!-- <i class="fas fa-heart"></i> Indian Insurance market is expected to reach US$ 200 billion by 2027 -->
					</div>
					<h2> Testimonial
					</h2>
				</div>
				<div class="ins-testimonial-six-top-text">
					
				</div>
			</div>
		</div>
		<div class="ins-testimonial-scroller-six clearfix ">
			<div class="ins-testimonial-six-item">
				<div class="ins-testimonial-top-text rounded">
					<div class="ins-testimonial-top d-flex justify-content-between">
						<div class="ins-testimonial-name-degi">
							<!-- <span><img src="assets/img/about/tst1.2.png" alt=""></span>
							<span><img src="assets/img/about/tst1.3.png" alt=""></span> -->
						</div>
						<div class="ins-testimonial-rate ul-li">
							<ul>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
							</ul>
						</div>
					</div>
					<div class="ins-testimonial-text">
						Great Initiative which is first of its kind.  Brings the industry together
						<br><br>
					</div>
				</div>
				<div class="ins-testimonial-author d-flex align-items-center">
					<div class="author-img">
						<img src="{{asset('assets/img/about/tst-1.1.png')}}" alt="">
					</div>
					<div class="author-text">
						<h3>Cameron Williamson</h3>
						<span>Ceo & Founder</span>
					</div>
				</div>
			</div>
			<div class="ins-testimonial-six-item">
				<div class="ins-testimonial-top-text rounded">
					<div class="ins-testimonial-top d-flex justify-content-between">
						<div class="ins-testimonial-name-degi">
							<!-- <span><img src="assets/img/about/tst1.4.png" alt=""></span>
							<span><img src="assets/img/about/tst1.3.png" alt=""></span> -->
						</div>
						<div class="ins-testimonial-rate ul-li">
							<ul>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
							</ul>
						</div>
					</div>
					<div class="ins-testimonial-text">
						Unique thought and execution from a Veteran.  Will benefit insurance professionals to learn and grow					</div>
				</div>
				<div class="ins-testimonial-author d-flex align-items-center">
					<div class="author-img">
						<img src="{{asset('assets/img/about/tst-1.1.png')}}" alt="">
					</div>
					<div class="author-text">
						<h3>Cameron Williamson</h3>
						<span>Ceo & Founder</span>
					</div>
				</div>
			</div>
			<div class="ins-testimonial-six-item">
				<div class="ins-testimonial-top-text rounded">
					<div class="ins-testimonial-top d-flex justify-content-between">
						<div class="ins-testimonial-name-degi">
							<!-- <span><img src="assets/img/about/tst1.2.png" alt=""></span>
							<span><img src="assets/img/about/tst1.3.png" alt=""></span> -->
						</div>
						<div class="ins-testimonial-rate ul-li">
							<ul>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
								<li><i class="fas fa-star"></i></li>
							</ul>
						</div>
					</div>
					<div class="ins-testimonial-text">
						I find this very encouraging & useful  for young talent to use this platform and be an insurance professional					</div>
				</div>
				<div class="ins-testimonial-author d-flex align-items-center">
					<div class="author-img">
						<img src="{{asset('assets/img/about/tst-1.1.png')}}" alt="">
					</div>
					<div class="author-text">
						<h3>Cameron Williamson</h3>
						<span>Ceo & Founder</span>
					</div>
				</div>
			</div>
		
		</div>
	</section>		

	<!-- Start of Text scrolling section
	============================================= -->
	<section id="ins-text-scroll-2" class="ins-text-scroll-section-2">
		<div class="ins-text-scroll-2 clearfix">
			<h3>Learning</h3>
			<span class="scroll-icon"><img src="{{asset('assets/img/shape/txt-4.png')}}" alt=""></span>
			<h3>Assessment <span>+</span> Certifications</h3>
			<span class="scroll-icon"><img src="{{asset('assets/img/shape/txt-5.png')}}" alt=""></span>
			<h3>Career moves for existing insurance professionals</h3>
			<span class="scroll-icon"><img src="{{asset('assets/img/shape/txt-3.png')}}" alt=""></span>
		</div>
	</section>
    @endsection




