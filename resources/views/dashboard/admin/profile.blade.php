@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
  
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              
              <div class="container ">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                              <i class="mdi mdi-account-card-details"></i>
                            </span>Profile
                          </h3>
                    </div>
                    <div class="col-lg-12">
                     <div class="card p-4 my-3">
                      <div class="row align-items-center">
                        <div class="col-lg-4 text-center ">
                          <img class="rounded-circle p-2 w-75" src="{{asset('admin-assets/assets/images/faces/face3.jpg')}} " alt="">
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
                                <div class="input-group mb-3">
                                  <input type="file" class="form-control" id="inputGroupFile02">
                                  
                                </div>
                                <div id="submit-button" >
                            <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                            <button class="btn btn-light" id="cancel-button">Cancel</button>
            </div>
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
                            <button type="button"  class="btn btn-gradient-primary btn-icon-text btn-sm"  data-bs-toggle="modal" data-bs-target="#adminProfile">
                              <i class="mdi mdi-file-check btn-icon-prepend"></i> Edit</button>
                          </div>
                          <div class="user-personal-info">
                            <p>Name :<span> Saurabh</span> </p>
                            <p>Email :<span> xyz@gmail.com</span> </p>
                            <p>Number :<span> 830864577</span> </p>

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
                                    <form class="forms-sample">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Name" value="Saurabh Wakde" >
                                    </div>
                                    <div class="form-group">
                                        <label for="personalInfo-email">Email address</label>
                                        <input type="email" class="form-control" id="email" placeholder="Email" value="xyz@gmail.com" >
                                    </div>
                                    <div class="form-group">
                                        <label for="personalInfo-number">Contact Number</label>
                                        <input type="text" class="form-control" id="number" placeholder="Password" value="8308645556" >
                                    </div> 
                                        <div id="submit-button" >
                                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
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
                            <div class="user-info-heading text-center"><h1>Addreess</h1></div>
                            <div class="edit text-end">
                                <button class="btn btn-gradient-primary btn-icon-text btn-sm" data-bs-toggle="modal" data-bs-target="#admin-addressModal"><i class="mdi mdi-file-check btn-icon-prepend"></i>EDIT</button>
                            </div>
                            <div class="user-info">
                                <p>Country :<span> India</span> </p>
                                <p>State :<span> Maharastra</span> </p>
                                <p>Pincode :<span> 1234</span> </p>
                                <p>Address Line 1 :<span> XYZ , Street</span> </p>
                                <p>Address Line 2 :<span> XYZ , Street</span> </p>
                                <p>Address Line 3 :<span> XYZ , Street</span> </p>

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
                                                <input type="text" class="form-control" placeholder="Country" value="India" id="country" name="country"/>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">State</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" value="Maharastra" placeholder="State" name="state" id="state"/>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Pincode</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Pincode" value="1234" id="pincode" name="pincode"/>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Address 1</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" value="xyz" placeholder="Address1" name="address1" id="address1"/>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Address 2</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" value="xyz" placeholder="Address2" name="address2" id="address2"/>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Address 3</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" value="xyz" placeholder="Address3" name="address3" id="address3"/>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div id="submit-button" >
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
                            <button class="btn btn-gradient-primary btn-icon-text btn-sm" data-bs-toggle="modal" data-bs-target="#admin-experienceModal" >
                              <i class="mdi mdi-file-check btn-icon-prepend"></i>EDIT</button>
                        </div>
                           <div>
                              <p>Current Company :<span> Xyz company</span></p>
                              <p>Organisation :<span> Xyz Org</span></p>
                              <p>Designation  :<span> Backend Dev</span></p>
                              <p>CTC(in LPA) :<span> 4.5</span></p>
                              <p>State : <span>Maharastra</span></p>
                              <p>Job Profile Decription : <span>.......................................</span></p>
                              <p>Joining Date :<span></span>2023 / 08 / 05</p>
                              <p>Reliving  Date :<span></span>2023 / 12 / 25</p>
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
                <input type="text" class="form-control" placeholder="Current Company" value="Xyz" id="currentCompany" name="currentCompany"/>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Organisation</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" value="Xyz Org" placeholder="Organisation" name="organisation" id="organisation"/>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">CTC</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="CTC" value="4.5 LPA" id="ctc" name="ctc"/>
                </div>
            </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                  <label class="col-sm-3 col-form-label">State</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" value="Maharastra" placeholder="State" name="state" id="state"/>
                  </div>
              </div>
              </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Joining Date</label>
                <div class="col-sm-9">
                <input type="date" class="form-control" value=""  name="joining-date" id="joining-date"/>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Reliving date</label>
                <div class="col-sm-9">
                <input type="date" class="form-control" value="" placeholder="" name="reliving-date" id="reliving-date"/>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleTextarea1">Job Description</label>
              <textarea class="form-control" id="jobdescription" rows="4"></textarea>
            </div>
          </div>
        </div>
        <div id="submit-button" >
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
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Insurance next</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
@endsection