@extends('dashboard/layouts/dashboard-layout')
@section('main-section')

<!-- partial -->

<div class="content-wrapper">
  <div class="page-header">

    <div class="container ">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-account-card-details"></i>
            </span>{{ $userData->name }} Profile
          </h3>
        </div>
        <div class="col-lg-12">
          <div class="card p-4 my-3">
            <div class="row align-items-center">
              <div class="col-lg-4 text-center ">
                <img class="{{ isset($userData->profile->profile_image) ? 'rounded-circle p-2 w-75' : 'p-5 border rounded-circle my-2' }}" src='{{ $userData->profile->profile_image ?? "N/A" }}' alt='{{ $userData->profile->profile_image ?? "Upload Your Image" }}'>
                <br>
                <button type="button" class="btn btn-danger btn-icon-text btn-sm rounded-pill " data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <i class="mdi mdi-upload btn-icon-prepend"></i> Upload </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit your pic</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('image-upload') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="input-group mb-3">
                            <input type="file" class="form-control" name="profile_image">
                          </div>
                          <div id="submit-button">
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light" id="cancel-button" data-bs-dismiss="modal">Cancel</button>
                          </div>
                        </form>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="text-end">
                  <button type="button" class="btn btn-gradient-primary btn-icon-text btn-sm" data-bs-toggle="modal" data-bs-target="#adminProfile">
                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Edit</button>
                </div>
                <div class="user-personal-info">
                  <p>Name :<span> {{ $userData->name }}</span> </p>
                  <p>Email :<span> {{ $userData->email }}</span> </p>
                  <p>Number :<span> {{ $userData->phone }}</span> </p>

                  <!-- Modal -->
                  <div class="modal fade" id="adminProfile" tabindex="-1" aria-labelledby="adminProfileModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="adminProfileModalLabel">Edit Info</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cancel-button"></button>
                        </div>
                        <div class="modal-body">
                          <div class="card my-3">
                            <div class="card-body">

                              <h4 class="card-title">Edit Personal Info</h4>

                              <p class="card-description"></p>
                              <form class="forms-sample" id="profile_update_form">
                              @csrf
                              <div id="profile_status"></div>
                             
                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control" id="name" placeholder="Name" value="{{ $userData->name }}">
                                  <div id="name_error"></div>
                                </div>
                                <div class="form-group">
                                  <label for="personalInfo-email">Email address</label>
                                  <input type="email" class="form-control" id="email" placeholder="Email" value="{{ $userData->email }}">
                                  <div id="email_error"></div>
                                </div>
                                <div class="form-group">
                                  <label for="personalInfo-number">Contact Number</label>
                                  <input type="text" class="form-control" id="phone" placeholder="Phone" value="{{ $userData->phone }}">
                                  <div id="phone_error"></div>
                                </div>
                                <div class="form-group" style="display: none;">
                                  <label for="personalInfo-number">User_id</label>
                                  <input type="text" class="form-control" id="user_id" placeholder="uUerID" value="{{ $userData->user_id }}">
                                 
                                </div>
                                <div id="submit-button">
                                  <button type="submit" class="btn btn-gradient-primary me-2" id="profile_update_button">Submit</button>
                                  <button class="btn btn-light" id="cancel-button">Cancel</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cancel-button">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 my-3">
          <div class="card p-4 ">
            <div class="user-info-heading text-center">
              <h1>Addreess</h1>
            </div>
            <div class="edit text-end">
              <button class="btn btn-gradient-primary btn-icon-text btn-sm" data-bs-toggle="modal" data-bs-target="#admin-addressModal"><i class="mdi mdi-file-check btn-icon-prepend"></i>EDIT</button>
            </div>


            <div class="user-info">
              <p>Country :<span> {{ $userData->address->country ?? "N/A" }}</span> </p>
              <p>City : <span> {{ $userData->address->city ?? "N/A" }}</span></p>
              <p>State :<span> {{ $userData->address->state ?? "N/A" }}</span> </p>
              <p>Pincode :<span> {{ $userData->address->pincode ?? "N/A" }}</span> </p>
              <p>Address Line 1 :<span>{{ $userData->address->line1 ?? "N/A" }}</span> </p>
              <p>Address Line 2 :<span>{{ $userData->address->line2 ?? "N/A" }}</span> </p>
              <p>Address Line 3 :<span>{{ $userData->address->line3 ?? "N/A" }}</span> </p>

            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="admin-addressModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Personal info</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Address</h4>
                        <form class="form-sample">
                          <p class="card-description"> Edit your address </p>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Country</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" placeholder="Country" value='{{ $userData->address->country ?? "N/A" }}' id="country" name="country" />
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" value='{{ $userData->address->state ?? "N/A" }}' placeholder="State" name="state" id="state" />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">City</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" value='{{ $userData->address->city ?? "N/A" }}' placeholder="City" name="city" id="city" />
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Pincode</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" placeholder="Pincode" value='{{ $userData->address->pincode ?? "N/A" }}' id="pincode" name="pincode" />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address 1</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" placeholder="Address1" name="address1" id="address1" value='{{ $userData->address->line1 ?? "N/A" }}' />
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address 2</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" placeholder="Address2" name="address2" id="address2" value='{{ $userData->address->line2 ?? "N/A" }}' />
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address 3</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" placeholder="Address3" name="address3" id="address3" value='{{ $userData->address->line3 ?? "N/A" }}' />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="submit-button">
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light" id="cancel-button">Cancel</button>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 my-3">
          <div class="card p-4">
            <div class="text-center profile-section-experience-heading">
              <h1>Experience</h1>
            </div>
            <div class="edit text-end">
              <button class="btn btn-gradient-primary btn-icon-text btn-sm" data-bs-toggle="modal" data-bs-target="#admin-experienceModal">
                <i class="mdi mdi-file-check btn-icon-prepend"></i>EDIT</button>
            </div>
            <div>
              <p>Current Company :<span> {{ $userData->experience->is_current_company ?? "N/A" }}</span></p>
              <p>Organisation :<span> {{ $userData->experience->organization ?? "N/A" }}</span></p>
              <p>Designation :<span> {{ $userData->experience->designation ?? "N/A" }}</span></p>
              <p>CTC(in LPA) :<span> {{ $userData->experience->ctc ?? "N/A" }}</span></p>
              <p>State : <span> {{ $userData->experience->state ?? "N/A" }}</span></p>
              <p>Job Profile Decription : <span>{{ $userData->experience->job_profile_description	 ?? "N/A" }}</span></p>
              <p>Joining Date :<span></span> {{ $userData->experience->joining_date ?? "N/A" }}</p>
              <p>Reliving Date :<span></span> {{ $userData->experience->relieving_date ?? "N/A" }}</p>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="admin-experienceModal" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Personal info</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Experience</h4>
                        <form class="form-sample">
                          <p class="card-description"> Edit your experience </p>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Current Company</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" placeholder="Current Company" value=' {{ $userData->experience->is_current_company ?? "N/A" }}' id="currentCompany" name="currentCompany" />
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Organisation</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" value=' {{ $userData->experience->organization ?? "N/A" }}' placeholder="Organisation" name="organisation" id="organisation" />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">CTC</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" placeholder='{{ $userData->experience->ctc ?? "N/A" }}' value="4.5 LPA" id="ctc" name="ctc" />
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" value='{{ $userData->experience->state ?? "N/A" }}' placeholder="State" name="state" id="state" />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Joining Date</label>
                                <div class="col-sm-9">
                                  <input type="date" class="form-control" value='{{ $userData->experience->joining_date ?? "N/A" }}' name="joining-date" id="joining-date" />
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Reliving date</label>
                                <div class="col-sm-9">
                                  <input type="date" class="form-control" value='{{ $userData->experience->relieving_date ?? "N/A" }}' placeholder="" name="reliving-date" id="reliving-date" />
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="exampleTextarea1">Job Description</label>
                                <textarea class="form-control" id="jobdescription" rows="4">{{ $userData->experience->job_profile_description ?? "N/A" }}</textarea>
                              </div>
                            </div>
                          </div>
                          <div id="submit-button">
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light" id="cancel-button">Cancel</button>
                          </div>

                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
@endsection