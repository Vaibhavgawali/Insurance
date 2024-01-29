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
            </span>{{ $userData-> name }} Profile
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
          @endif
          @if($userData->documents)
          <!--User Documents Comp comp  -->
            @if(Auth::user()->can('view_candidate_resume') || Auth::user()->hasRole('Superadmin'))
              <div class="profie-cv-update-section" id="profie-cv-update-section">
                <div class="card">
                  <div class="d-flex justify-content-center align-items-center gap-5 gap-sm-2 p-3">
                    <div><a class="btn btn-md btn-warning btn-rounded" href="{{asset('storage/documents/'.$userData->documents->document_url)}}" target="_blank">View CV</a></div>
                  </div>
                </div>
              </div>
            @endif
          @endif
        @endif


      </div>
    </div>

  </div>
</div>
@endsection