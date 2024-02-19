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
        <x-profile-image-component :data="$userData" /> <!--User Profile section comp  -->

        <x-profile-personal-details-component :data="$userData" /> <!--User Personal Details comp  -->
        <x-profile-address-component :data="$userData" /> <!--User Address Comp comp  -->

        @if($userData->hasCategory('Candidate'))
          @if($userData->experience)
            <x-profile-experience-component :data="$userData" /> <!--User Experience Comp comp  -->
          @else
            <x-profile-add-experience-component :data="$userData" /> <!--User Experience Comp comp  -->
          @endif

          @if($userData->documents)
          <!--User Documents Comp comp  -->
            <x-profile-cv-update-component :data="$userData" /> <!--User Cv update Comp comp  -->
          @else
            <x-profile-cv-upload-component :data="$userData" /> <!--User Cv upload Comp comp  -->
          @endif
        @endif


      </div>
    </div>

  </div>
</div>
@endsection