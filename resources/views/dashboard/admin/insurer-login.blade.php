@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
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
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Buisness Line <i class="mdi mdi-view-dashboard mdi-24px float-right"></i>
                    </h3>
                    <h4 class="mb-1">Life :</h4>
                    <h4 class="mb-1">Genral :</h4>
                    <h4 class="mb-1">Health :</h4>
                    <!-- <h6 class="card-text">Increased by 60%</h6> -->
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Work status <i class="mdi mdi-office mdi-24px float-right"></i>
                    </h3>
                    <h4 class="mb-1">Fresher :</h4>
                    <h4 class="mb-1">Working :</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-warning card-img-holder text-white">
                <div class="card-body">
                    <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Current Employer <i class="mdi mdi-desktop-mac mdi-24px float-right"></i>
                    </h3>
                    <h4 class="mb-1">Insurance :</h4>
                    <h4 class="mb-1">Others :</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
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
        </div>
    </div>
    <div class="row">
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
    </div>
    <div class="row">
        <div class="col-6">

        </div>
        <div class="col-6">
        <div class="">
                        <div>
                            <h3>About insurancecareer.in</h3>
                        </div>
                        <div>
                            <p> insurancecareer.in is committed to work as a Platform which attracts right set of people to the Insurance Industry. It also incubates freshers and make them job ready.</p>
                        </div>

                    </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
        
                    <h4 class="card-title">View & Download Cv</h4>
                    <div class=" border border-2 p-3 rounded">
                        <form action="" id="filterForm">
                            <div class="d-flex gap-5 ">
                                <div class="form-group">
                                    <select name="" id="" class="btn btn-sm btn-outline-primary dropdown-toggle">
                                        <option value="" selected disabled>Buisness Line</option>
                                        <option value="life" class="dropdown-item">Life</option>
                                        <option value="general" class="dropdown-item">General</option>
                                        <option value="health" class="dropdown-item">Health</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <select name="" id="" class="btn btn-sm btn-outline-primary dropdown-toggle">
                                        <option value="" selected disabled>Work Status</option>
                                        <option value="fresher" class="dropdown-item">Fresher</option>
                                        <option value="working" class="dropdown-item">Working</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="" id="" class="btn btn-sm btn-outline-primary dropdown-toggle">
                                        <option value="" selected disabled>Current Employer</option>
                                        <option value="insurer" class="dropdown-item">Insurer</option>
                                        <option value="others" class="dropdown-item">Others</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="" id="" class="btn btn-sm btn-outline-primary dropdown-toggle">
                                        <option value="" selected disabled>Channel</option>
                                        <option value="agency" class="dropdown-item">Agency</option>
                                        <option value="banca" class="dropdown-item">Bamca</option>
                                        <option value="direct marketing" class="dropdown-item">Direct Marketing</option>
                                        <option value="group" class="dropdown-item">Group</option>
                                        <option value="broking" class="dropdown-item">Broking</option>
                                        <option value="others" class="dropdown-item">Others</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-gradient-primary me-2">Submit</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table id="table" class="table">
                            <thead id="table-head">
                                <tr>
                                    <th id="table-th-sr" class="text-center "> SR.No </th>
                                    <th id="table-th-name" class="text-center"> Name </th>
                                    <th id="table-th-category" class="text-center"> Category</th>
                                    <th id="table-th-view&download" class="text-center"> View & Downnload</th>
                                </tr>

                            </thead>
                            <tbody id="table-body">
                                <tr id="table-row">
                                    <td id="table-td" class="text-center">
                                        1
                                    </td id="table-td-sr" class="text-center">
                                    <td id="table-td-name" class="text-center">Saurabh</td>
                                    <td id="table-td-catehory" class="text-center">
                                        <label id="table-td" class="badge badge-gradient-success">Life</label>
                                    </td>
                                    <td class="text-center"> <a href="" id="table-td-view" class="btn  btn-primary btn-sm mx-2">View</a>
                                        <a href="" id="table-td-download" class="btn  btn-success btn-sm">Download</a>
                                    </td>

                                </tr>
                                <tr id="table-row">
                                    <td id="table-td" class="text-center">
                                        1
                                    </td id="table-td-sr" class="text-center">
                                    <td id="table-td-name" class="text-center">Saurabh</td>
                                    <td id="table-td-catehory" class="text-center">
                                        <label id="table-td" class="badge badge-gradient-success">Life</label>
                                    </td>
                                    <td class="text-center"> <a href="" id="table-td-view" class="btn  btn-primary btn-sm mx-2">View</a>
                                        <a href="" id="table-td-download" class="btn  btn-success btn-sm">Download</a>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
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
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Connect with Us</h4>
                    <p class="card-description">Have questions or concerns? We're here to help! Leave your query below, and our dedicated team will get back to you promptly. Your satisfaction is our priority, and we strive to provide you with the best assistance possible. Whether you're seeking information about our products, services, or anything else, feel free to reach out. We value your feedback and look forward to serving you.</p>

                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="exampleTextarea1">Leave your query</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="8" placeholder="Write your query here ........................"></textarea>
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection