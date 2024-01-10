@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<!-- partial -->

  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-account-card-details"></i>
        </span>Candidates
      </h3>

    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Candidates Table</h4>

            </p>
            <x-table-component :data="$candidates" />
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

  <!-- resources/views/admin/role_permission/index.blade.php -->

<!-- Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User Roles and Permissions</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add a form to submit changes -->
                <form id="editUserForm">
                    <div class="form-group">
                        <label for="currentRole">Current Role:</label>
                        <input type="text" class="form-control" id="currentRole" disabled>
                    </div>

                    <div class="form-group">
                        <label>Permissions:</label>
                        <div id="permissionsList">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
 
@endsection