<!-- resources/views/auth/register.blade.php -->
@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div class="content-wrapper">

    <div class="page-header">
        <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span>Edit Role</h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Role</h4>
                    <p class="card-description"> Edit Role Details</p>
                    
                    <form class="form-sample" id="update_role">
                        <input type="hidden" name="role_id" id="role_id" value="{{$role_id}}"/>
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="role_title" id="role_title" value={{$role_name}} placeholder="Role Title">
                                <div id="role_title_error"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level" class="col-sm-3 col-form-label">Select Permissions</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    @foreach ($all_permissions as $permission)
                                        <div class="form-check form-check-inline col-lg-3 col-md-6 col-sm-6">
                                            <input class="form-check-input" type="checkbox" name="permissions[]" id="permission{{ $permission->id }}" value="{{ $permission->id }}" {{ in_array($permission->id, $role_permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="permission{{ $permission->id }}">
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div id="permissions_error"></div>
                                </div>
                            </div>
                            
                        </div>

                        <button type="submit" id="role_update_button" class="btn btn-gradient-primary me-2">Update Role</button>
                        <a href="/roles/" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection