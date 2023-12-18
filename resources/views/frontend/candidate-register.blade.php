@extends('frontend/layouts.main')
@section('main-section')
       <!-- Info Section Start -->

       <div class="info-register pb-5">
          <div class="container w-100 mt-50 ">
              <div class="row">
                
                    <div class="col-12 col-md-12 col-lg-4 shadow rounded  p-2   d-none   d-xl-block bg-white">
                        <div>
                           <img src="assets/img/3D-images/register.png" alt="">
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
                   
                       <form id="candidate_register_form">
                        <div id="register_status"></div>

                            <!-- @csrf -->

                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text"   name="name" class="form-control" value="{{ old('name') }}" id="name" aria-describedby="nameHelp" placeholder="What is your Name?">
                               <!-- @if($errors->has('name'))
                                <div class="invalid-feedback d-block"> {{ $errors->first('name') }}</div>
                                @endif -->

                               
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Mobile number</label>
                                <input type="text"  name="phone"  class="form-control" id="phone" aria-describedby="numberHelp" placeholder="Mobile Number">
                                <!-- @if($errors->has('phone'))
                                <div class="invalid-feedback d-block"> {{ $errors->first('phone') }}</div>
                                @endif -->

                            </div>
                              
                            <div class="mb-3">
                              <label for="email" class="form-label">Email ID</label>
                              <input type="text"  name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Tell us your Email ID">
                              <!-- @if($errors->has('email'))
                                <div class="invalid-feedback d-block"> {{ $errors->first('email') }}</div>
                                @endif -->

                            </div>
                            <div class="mb-3">
                              <label for="password" class="form-label" >Password</label>
                              <input type="password"  name="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter Your Password">
                              <!-- @if($errors->has('password'))
                                <div class="invalid-feedback d-block"> {{ $errors->first('password') }}</div>
                                @endif -->

                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text"  name="city"   class="form-control" id="city" aria-describedby="cityHelp" placeholder="Enter City">
                                    <!-- @if($errors->has('city'))
                                      <div class="invalid-feedback d-block"> {{ $errors->first('city') }}</div>
                                    @endif -->
                                </div>
                             
                            <div class="mb-3">
                            <select class="form-control"  name="experience" id="experience" aria-label="work status">
                                <option selected disabled>Work Status</option>
                                <option value="experienced">Experienced</option>
                                <option value="fresher">Fresher</option>
                            </select>
                                 <!-- @if($errors->has('experience'))
                                <div class="invalid-feedback d-block"> {{ $errors->first('experience') }}</div>
                                @endif -->

                            </div>

                            <div class="mb-3" id="experienceFields" style="display: none;">
                                <!-- Additional fields for experienced users -->
                                <div class="mb-3">
                                <label for="current-org" class="form-label">Current Organisation</label>
                                <input type="text"  class="form-control"  name="organization" id="organization" aria-describedby="current-orgHelp" placeholder="Enter your organisation name?">
                                <!-- @if($errors->has('organization'))
                                <div class="invalid-feedback d-block"> {{ $errors->first('organization') }}</div>
                                @endif -->
                                </div>

                                <div class="mb-3">
                                <label for="designation" class="form-label">Current Role</label>
                                <input type="text" class="form-control"  name="designation" id="designation" aria-describedby="current-roleHelp" placeholder="Whats Your Current Role?" >
                                <!-- @if($errors->has('designation'))
                                <div class="invalid-feedback d-block"> {{ $errors->first('designation') }}</div>
                                @endif -->
                                </div>

                                <div class="mb-3">
                                    <label for="joining_date" class="form-label">Joining Date</label>
                                    <input type="date" class="form-control"  name="joining_date" id="joining_date" aria-describedby="joiningDateHelp" placeholder="YYYY-MM-DD">
                                    <!-- @if($errors->has('joining_date'))
                                    <div class="invalid-feedback d-block"> {{ $errors->first('joining_date') }}</div>
                                    @endif -->
                                </div>

                                <div class="mb-3">
                                    <label for="relieving_date" class="form-label">Relieving Date</label>
                                    <input type="date" class="form-control"  name="relieving_date" id="relieving_date" aria-describedby="relievingDateHelp" pattern="\d{4}-\d{2}-\d{2}" placeholder="YYYY-MM-DD">
                                    <!-- @if($errors->has('relieving_date'))
                                    <div class="invalid-feedback d-block"> {{ $errors->first('relieving_date') }}</div>
                                    @endif -->
                                </div>


                                <div class="mb-3">
                                <label for="number" class="form-label">Current CTC</label>
                                <input type="number" class="form-control"  name="ctc" id="ctc" aria-describedby="ctcHelp" placeholder="Enter your current CTC">
                                <!-- @if($errors->has('ctc'))
                                    <div class="invalid-feedback d-block"> {{ $errors->first('ctc') }}</div>
                                    @endif -->
                                </div>

                                

                            </div>

                            <script>
                                document.getElementById('experience').addEventListener('change', function () {
                                    var experienceFields = document.getElementById('experienceFields');

                                    if (this.value === 'experienced') {
                                        experienceFields.style.display = 'block';
                                    } else {
                                        experienceFields.style.display = 'none';
                                    }
                                });
                            </script>
                           
                            <div class="mb-3">
                                <select  class="form-control" name="preferred_line" id="preferred_line" aria-label="work status">
                                    <option selected disabled>Preferred Line</option>
                                    <option value="1">Life</option>
                                    <option value="2">General</option>
                                    <option value="3">Health</option>
                                    <option value="4">Other</option>
                                </select>
                                    @if($errors->has('preferred_line'))
                                    <div class="invalid-feedback d-block"> {{ $errors->first('preferred_line') }}</div>
                                    @endif
                            </div>
                           
                             <div class="d-flex align-items-center ">
                                <input class="form-check-input m-2" type="checkbox" value="" id="flexCheckDefault">
                                i agree to the  <a href=""class="text-primary m-1"> terms & conditions</a>
                             </div>
                              <div>
								<div>
									<button type="submit" id="register-button" class="btn btn-primary  my-2">Register Now</button>
								</div>
								Allready have an Account ? <a href="/login" class="btn btn-secondary text-white mx-2">Login</a> 
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