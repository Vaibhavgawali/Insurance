<!-- partial -->
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Candidate<i class="mdi mdi-view-dashboard mdi-24px float-right"></i>
                    </h3>
                    <h2 class="mb-5">{{$candidateCount}}</h2>
                    <h6 class="card-text">Total Candidate</h6>
                    <!-- <h6 class="card-text">Increased by 60%</h6> -->
                </div>
            </div>
        </div>
        <!-- <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Work status <i class="mdi mdi-office mdi-24px float-right"></i>
                    </h3>
                    <h4 class="mb-1">Fresher :</h4>
                    <h4 class="mb-1">Working :</h4>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-warning card-img-holder text-white">
                <div class="card-body">
                    <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Candidate <i class="mdi mdi-desktop-mac mdi-24px float-right"></i>
                    </h3>
                    <h4 class="mb-1">Insurance :</h4>
                    <h4 class="mb-1">Others :</h4>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Channel <i class="mdi mdi-newspaper mdi-24px float-right"></i>
                    </h3>
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h6 class="mb-1">Agency : 1</h6>
                            <h6 class="mb-1">Banca : 1</h6>
                            <h6 class="mb-1">Others : 1</h6>

                        </div>
                        <div>
                            <h6 class="mb-1">Group : 1</h6>
                            <h6 class="mb-1">Broking : 1</h6>
                            <h6 class="mb-1">D Marketing : 1</h6>
                        </div>
                    </div>

                </div>
            </div>
        </div> -->
    </div>
    <!-- <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <h4 class="card-title float-left">Visit And Sales Statistics</h4>
                        <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
                    </div>
                    <canvas id="visit-sale-chart" class="mt-4"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Traffic Sources</h4>
                    <canvas id="traffic-chart"></canvas>
                    <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <div>
                            <h3>About insurancecareer.in</h3>
                        </div>
                        <div>
                            <p> insurancecareer.in is committed to work as a Platform which attracts right set of people to the Insurance Industry. It also incubates freshers and make them job ready.</p>
                            <p> We offer modules for Institutions to provide practical training on insurance industry which will help students to get a favourable acceptance from the Industry for a Career.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Connect with Us</h4>
                    <p class="card-description">Have questions or concerns? We're here to help! Leave your query below, and our dedicated team will get back to you promptly. Your satisfaction is our priority, and we strive to provide you with the best assistance possible. Whether you're seeking information about our products, services, or anything else, feel free to reach out. We value your feedback and look forward to serving you.</p>

                    <form class="forms-sample" id="requirement_text_form">
                        @csrf
                        <div class="form-group">
                            <label for="requirement_text" class="fs-5">Put your requirements here</label>
                            <textarea class="form-control" name="requirement_text" id="requirement_text" rows="8" placeholder="Put your requirements here ........................"></textarea>
                            <div id="requirement_text_error"></div> <!-- Updated the class -->
                        </div>
                        <div class="form-group">
                            <label for="user_id"></label>
                            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="user_id" value="{{auth()->user()->user_id}}" hidden>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2" id="requirement_text_submit_button">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>