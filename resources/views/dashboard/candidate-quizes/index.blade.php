@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-comment"></i>
            </span>Quizes List
        </h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">Quizes List</h4>
                    <x-quiz-table-component :items="$data" :headers="$headers" :tableClass="'table-striped'" :actions="$actions" />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
