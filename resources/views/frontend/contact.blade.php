@extends('frontend/layouts.main')
@section('main-section')
<!-- Start of breadcrumb section
	============================================= -->
<section id="in-breadcrumb" class="in-breadcrumb-section">
    <div class="in-breadcrumb-content position-relative" data-background="assets/img/bg/error-bg.jpg">
        <div class="background_overlay"></div>
        <div class="container">
            <div class="in-breadcrumb-title-content position-relative headline ul-li">
                <h2>Contact </h2>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="active-page">Contact</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End of breadcrumb section -->
<!-- Start of Contact Page section
	============================================= -->
<section id="in-contact-page" class="in-contact-page-section position-relative">
    <div class="in-google-map">
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224345.89796994498!2d77.0441721107044!3d28.527554409214407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfd5b347eb62d%3A0x52c2b7494e204dce!2sNew%20Delhi%2C%20Delhi!5e0!3m2!1sen!2sin!4v1705602164135!5m2!1sen!2sin" height="590" width="100%"></iframe>
    </div>
    <div class="container">
        <div class="in-contact-page-content position-relative">
            <div class="row">
                <div class="col-lg-6">
                    <div class="in-faq-contact-info-wrap">
                        <div class="in-faq-contact-info-title headline pera-content">
                            <h3>Contact Us</h3>
                            <p>For any inquiries or assistance, please don't hesitate to get in touch with us. We are here to assist you!</p>
                        </div>

                        <div class="in-faq-contact-info">
                            <div class="info-item-area d-flex align-items-center">
                                <div class="inner-icon d-flex align-items-center justify-content-center">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="inner-text headline pera-content">
                                    <h4>Office Address, Delhi</h4>
                                    <p>42/7 Green Avenue, Connaught Place
                                        New Delhi, India</p>
                                </div>

                            </div>
                            <div class="info-item-area d-flex align-items-center">
                                <div class="inner-icon d-flex align-items-center justify-content-center">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <div class="inner-text headline pera-content">
                                    <h4>Mail Us</h4>
                                    <p>support@insurancecareer.in</p>
                                    <p>info@insurancecareer.in</p>
                                </div>
                            </div>
                            <div class="info-item-area d-flex align-items-center">
                                <div class="inner-icon d-flex align-items-center justify-content-center">
                                    <i class="fal fa-phone-plus"></i>
                                </div>
                                <div class="inner-text headline pera-content">
                                    <h4>Phone Call</h4>
                                    <p>+91 8308645677</p>
                                    <p>+91 9579398687</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="in-faq-contact-form-area">
                        <div class="in-faq-contact-info-title headline pera-content">
                            <h3>Get In Touch</h3>
                            <p>If you have any questions or need assistance, feel free to reach out to us. We denounce with righteous indignation and charm you with the pleasures of HR.</p>
                        </div>

                        <div class="in-faq-contact-form">
                            <form action="sendemail.php" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="username" placeholder="Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="phone" placeholder="Phone">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="subject" placeholder="Subject">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit">Submit Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Contact Page  section
	============================================= -->
@endsection