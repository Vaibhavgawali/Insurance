<!-- resources/views/auth/register.blade.php -->
@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span>Add Role</h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Role</h4>
                    <p class="card-description"> Add Role Details</p>
                    
                    <form class="form-sample" id="create_role">

                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="role_title" id="role_title" placeholder="Role Title">
                                <div id="role_title_error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level" class="col-sm-3 col-form-label">Select Permissions</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="form-check form-check-inline col-lg-3 col-md-6 col-sm-6">
                                            <input class="form-check-input" type="checkbox" name="permissions[]" id="permission{{ $permission->id }}" value="{{ $permission->id }}">
                                            <label class="form-check-label" for="permission{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div id="permissions_error"></div>
                                </div>
                            </div>
                            
                        </div>

                        <button type="submit" id="role_create_button" class="btn btn-gradient-primary me-2">Create Role</button>
                        <a href="/roles/" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection