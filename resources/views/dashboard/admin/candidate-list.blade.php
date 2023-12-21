@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
           <!-- partial -->
           <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account-card-details"></i>
                </span>Candidates
              </h3>
             
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Candidates Table</h4>
                      
                      </p>
                      <x-table-component :data="$candidates" />
                      <div class="d-flex my-3 align-items-center">
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                            <i class="mdi mdi-chevron-left"></i>
                          </button>
                        <div class="text-info p-2">1</div>
                        <button type="button" class="btn btn-inverse-primary btn-rounded btn-icon">
                            <i class="mdi mdi-chevron-right"></i>
                          </button>
                    </div>
                    </div>
                   
                  </div>
                </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Personal info</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card my-3">
                                                            <div class="card-body">

                                                              <h4 class="card-title">Edit Personal Info <span class="text-end btn btn-gradient-danger" id="EditButton">Edit</span></h4>

                                                              <p class="card-description"></p>
                                                              <form class="forms-sample">
                                                                <div class="form-group">
                                                                  <label for="personalInfo-name">Name</label>
                                                                  <input type="text" class="form-control" id="personalInfo-name" placeholder="Name" value="Saurabh Wakde" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                  <label for="personalInfo-email">Email address</label>
                                                                  <input type="email" class="form-control" id="personalInfo-email" placeholder="Email" value="xyz@gmail.com" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                  <label for="personalInfo-number">Contact Number</label>
                                                                  <input type="text" class="form-control" id="personalInfo-number" placeholder="Password" value="8308645556" disabled>
                                                                </div> 
                                                                 <div id="submit-button" style="display: none; transition:ease-in-out;">
                                                                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                                                    <button class="btn btn-light" id="cancel-button">Cancel</button>
                                                                 </div>
                                                              </form>
                                                            </div>
                                                        </div>

                                                        <div class="card my-3">
                                                            <div class="card-body">
                                                              <h4 class="card-title">Edit your Address <span class="text-end btn btn-gradient-danger" id="EditButton1">Edit</span></h4>
                                                              <p class="card-description"></p>
                                                              <form class="forms-sample">
                                                                <div class="form-group">
                                                                  <label for="exampleInputCountry">Country</label>
                                                                  <input type="text" class="form-control" id="personal-info-country" placeholder="country" value="India" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                  <label for="exampleInputState">State</label>
                                                                  <input type="text" class="form-control" id="personal-info-state" placeholder="state" value="Maharastra"  disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPincode">pincode</label>
                                                                    <input type="text" class="form-control" id="personal-info-pincode" placeholder="pincode" value="1234"  disabled>
                                                                  </div>
                                                                <div class="form-group">
                                                                  <label for="exampleInputAddress-1">Address Line 1</label>
                                                                  <input type="text" class="form-control" id="personal-info-address1" placeholder="Address line 1" value="xyz street"  disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputAddress-2">Address Line 2</label>
                                                                    <input type="text" class="form-control" id="personal-info-address2" placeholder="Address line 2" value="xyz street"  disabled>
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="exampleInputAddress-3">Address Line 3</label>
                                                                    <input type="text" class="form-control" id="personal-info-address3" placeholder="Address line 1" value="xyz street"  disabled>
                                                                  </div>
                                                                  <div id="submit-button1" style="display: none; transition:ease-in-out;">
                                                                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                                                    <button class="btn btn-light" id="cance-button1">Cancel</button>
                                                                  </div>
                                                                 
                                                              </form>
                                                            </div>
                                                          </div>

                                                          <div class="card my-3">
                                                            <div class="card-body">
                                                              <h4 class="card-title">Edit Experience</h4>
                                                              <p class="card-description"></p>
                                                              <form class="forms-sample">
                                                                <div class="form-group">
                                                                  <label for="exampleInputCountry">Current company</label>
                                                                  <input type="text" class="form-control" id="exampleInputCompany" placeholder="Current Company" value="Xyz Company">
                                                                </div>
                                                                <div class="form-group">
                                                                  <label for="exampleInputOrg">Organisation</label>
                                                                  <input type="text" class="form-control" id="exampleInputorg" placeholder="Organisation" value="XYZ Org">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputDesignation">Designation</label>
                                                                    <input type="text" class="form-control" id="exampleInputDesignation" placeholder="Designation" value="Frontend dev">
                                                                  </div>
                                                                <div class="form-group">
                                                                  <label for="exampleInputAddress-1">CTC (in LPA)</label>
                                                                  <input type="text" class="form-control" id="exampleInputCTC" placeholder="CTC" value="4.5">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputState">State</label>
                                                                    <input type="text" class="form-control" id="exampleInputState" placeholder="state" value="Maharastra">
                                                                  </div>
                
                
                                                                <div class="form-group">
                                                                    <label for="exampleInputJob">Job Profile Description</label>
                                                                    <input type="text" class="form-control" id="exampleInputJob" placeholder="Job Profile Description" value="................">
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="exampleInputJoiningDate">Joining Date</label>
                                                                    <input type="date" class="form-control" id="exampleInputJoiningDate"  value="2023-08-01">
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label for="exampleInputRelivingDate">Reliving Date Date</label>
                                                                    <input type="date" class="form-control" id="exampleInputRelivingDate"  value="2023-12-25">
                                                                  </div>
                                                                  <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                                                  <button class="btn btn-light">Cancel</button>
                                                              </form>
                                                            </div>
                                                          </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © insurencenext.com 2021</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
@endsection