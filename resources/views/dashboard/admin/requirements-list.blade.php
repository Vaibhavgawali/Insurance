@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<!-- partial -->

  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-comment-question-outline"></i>
        </span>Requirements
      </h3>

    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Reuirements Table</h4>

            </p>
            <x-requirements-table-component :data="$requirements" />
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
 
@endsection