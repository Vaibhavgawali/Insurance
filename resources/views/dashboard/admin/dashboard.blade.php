@extends('dashboard/layouts/dashboard-layout')
@section('main-section')

<!-- partial -->
<!-- hasCategory -->
@if(auth()->user()->hasRole('Superadmin'))
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
            <span></span><i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Candidate <i class="mdi mdi-view-dashboard mdi-24px float-right"></i>
                    </h3>
                    <h2 class="mb-5">{{$candidateCount}}</h2>
                    <h6 class="card-text">Total Candidate</h6>
                    <!-- <h6 class="card-text">Increased by 60%</h6> -->
                </div>
            </div>
        </div>

      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('admin-assets/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Insurer <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$insurerCount}}</h2>
            <h6 class="card-text">Total Insurer</h6>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('admin-assets/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Institute<i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$instituteCount}}</h2>
            <h6 class="card-text">Total Institute</h6>
          </div>
        </div>
      </div>

      
      <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="/admin-assets/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h3 class="font-weight-normal mb-3">Candidate Work status <i class="mdi mdi-office mdi-24px float-right"></i>
                    </h3>
                    <h4 class="mb-1">Fresher : {{$freshersCount}}</h4>
                    <h4 class="mb-1">Working : {{$candidateCount-$freshersCount}}</h4>
                </div>
            </div>
        </div>

      <!-- <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('admin-assets/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">95,5741</h2>
            <h6 class="card-text">Increased by 5%</h6>
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
  </div>
  @endif

  @if(auth()->user()->hasCategory('Candidate'))
  <x-dashboard-candidate-login />
  @endif


  @if(auth()->user()->hasCategory('Insurer'))
  <x-dashboard-insurer-login 
    :candidateCount="$candidateCount"
    :freshersCount="$freshersCount"
  />
  @endif

  @if(auth()->user()->hasCategory('Institute'))
  <x-dashboard-institution-login  
      :candidateCount="$candidateCount"/> <!--User Profile section comp  -->
  @endif
<!-- main-panel ends -->

@endsection