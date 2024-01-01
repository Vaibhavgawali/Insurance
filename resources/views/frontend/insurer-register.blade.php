@extends('frontend/layouts.main')
@section('main-section')
       <!-- Info Section Start -->

       <div class="info-register pb-5">
          <div class="container w-100 mt-50 ">
              <div class="row">
                
                    <div class="col-12 col-md-12 col-lg-4 shadow rounded  p-2   d-none   d-xl-block bg-white">
                        <div>
                           <img src="{{asset('assets/img/3D-images/register.png')}}" alt="">
                        </div>
                        <div>
                            <div class="ins-main-about-list-area ul-li-block">
								<ul class="">
									<li class="fs-6 fst-italic">Build your profile and let recruiters find you.</li>
								    <li class="fs-6 fst-italic">Get job postings delivered right to your email.</li>
									<li class="fs-6 fst-italic">Find a job and grow your career.</li>
								</ul> 
							</div>
                        </div>
                     </div>
                     <div class="col-12 col-md-12 col-lg-1 "></div>
                     <div style="margin: auto;" class="col-11 col-md-12 col-lg-7 shadow  rounded p-4 bg-white">
                       <div>
                           <h4 class="text-start">Find a job & grow your career</h4>
                       </div>
                       <div>
                   
                       <form id="insurer_register_form">
                            <div id="register_status"></div>
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text"   name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="What is your Name?">
                                <div id="name_error"></div>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Mobile number</label>
                                <input type="text"  name="phone"  class="form-control" id="phone" aria-describedby="numberHelp" placeholder="Mobile Number">
                                <div id="phone_error"></div>
                            </div>
                              
                            <div class="mb-3">
                              <label for="email" class="form-label">Email ID</label>
                              <input type="text"  name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Tell us your Email ID">
                              <div id="email_error"></div>
                            </div>

                            <div class="mb-3">
                              <label for="password" class="form-label" >Password</label>
                              <input type="password"  name="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter Your Password">
                              <div id="password_error"></div>
                            </div>

                            <div class="mb-3">
                              <label for="password_confirmation" class="form-label" >Confirm Password</label>
                              <input type="password"  name="password_confirmation" class="form-control" id="password_confirmation" aria-describedby="passwordHelp" placeholder="Enter Your Confirm Password">
                              <div id="password_confirmation_error"></div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text"  name="city"   class="form-control" id="city" aria-describedby="cityHelp" placeholder="Enter City">
                                <div id="city_error"></div>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">SPOC</label>
                                <input type="text"  name="spoc"  class="form-control" id="spoc" aria-describedby="spocHelp" placeholder="Enter SPOC">
                                <div id="spoc_error"></div>
                            </div>
       
                            <div class="mb-3">
                            <label for="phone" class="form-label">Prefered Line</label>
                                <select  class="form-control" name="preferred_line" id="preferred_line" aria-label="work status">
                                    <option selected disabled>--Select--</option>
                                    <option value="life">Life</option>
                                    <option value="general">General</option>
                                    <option value="health">Health</option>
                                    <option value="other">Other</option>
                                </select>
                                <div id="preferred_line_error"></div>
                            </div>
                           
                             <div class="d-flex align-items-center ">
                                <input class="form-check-input m-2" type="checkbox" value="" id="flexCheckDefault">
                                I agree to the  <a href=""class="text-primary m-1"> terms & conditions</a>
                             </div>
                             <div id="flexCheckDefault_error"></div>

                              <div>
								<div>
									<button type="submit" id="insurer_register_button" class="btn btn-primary  my-2">Register Now</button>
								</div>
								Already have an Account ? <a href="/login" class="btn btn-secondary text-white mx-2">Login</a> 
							  </div>
                          </form>
                        <script>
                            function enableButton() {
                                var checkbox = document.getElementById('flexCheckDefault');
                                var submitButton = document.getElementById('submitButton');

                                if (checkbox.checked) {
                                    submitButton.disabled = false;
                                } else {
                                    submitButton.disabled = true;
                                }
                            }
                        </script>
                       </div>
                     </div>
            
              </div>
          </div>
       </div>
       <!-- Info Section End -->
@endsection