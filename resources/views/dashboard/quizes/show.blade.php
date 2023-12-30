@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-multiple"></i>
            </span>Paper List {{$quiz_id}}
        </h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">Paper List</h4>
                    <p class="card-description"> Paper List </p> <a href="/questions/create?quiz_id={{ $quiz_id }}" class="btn btn-primary btn-sm">Add Question</a>
                    <x-table-component :items="$questions" :headers="$headers" :tableClass="'table-striped'" :actions="$actions" :quiz_id="$quiz_id"/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection