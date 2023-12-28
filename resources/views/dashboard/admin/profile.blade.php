@extends('dashboard/layouts/dashboard-layout')
@section('main-section')

<!-- partial -->

<div class="content-wrapper">
  <div class="page-header">
    <div class="container">

      <div class="row my-3">
      <div class="col-lg-12">
          <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
              <i class="mdi mdi-account-card-details"></i>
            </span>Your Profile
          </h3>
        </div>
      </div>

      <div class="row">
        <x-profile-image-component :data="$userData"/> <!--User Profile section comp  -->

        <x-profile-personal-details-component :data="$userData" /> <!--User Personal Details comp  -->
        <x-profile-address-component :data="$userData" /> <!--User Address Comp comp  -->
      
        @if($userData->hasRole('Candidate'))
         @if($userData->experience)
            <x-profile-experience-component :data="$userData" /> <!--User Experience Comp comp  -->
            @else
            <h3>Add experience</h3>
          @endif

          @if($userData->documents)
            <!--User Documents Comp comp  -->
            <h1>Update</h1>
            @else
            <x-profile-cv-upload-component :data="$userData" /> <!--User Experience Comp comp  -->
          @endif
        @endif
      

      </div>
    </div>

  </div>
</div>
@endsection