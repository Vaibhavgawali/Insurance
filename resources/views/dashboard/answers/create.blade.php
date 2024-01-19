<!-- resources/views/auth/register.blade.php -->
@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div>
    <div class="page-header">
        <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span>Add Quiz</h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Quiz</h4>
                    <p class="card-description"> Add Quiz Details</p>
                    <x-form-component :action="route('answers.store')" :layout="'horizontal'" :method="'POST'" :fields="$fields" :submitLabel="'Create Question'" :formClass="'form-sample'" :fieldColumn="'row-cols-md-2'"></x-form-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection