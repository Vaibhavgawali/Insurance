
<table class="table table-striped">
  <thead>
    <tr>
      <th>Sr.No</th>
      <th>Name </th>
      <th>
        @if ($data->isNotEmpty() && $data->first()->hasCategory('Candidate'))
            CV Date
        @else
            Email
        @endif
      </th>

      <th>Phone</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data as $row)
    <tr>
      <td>{{$i++}}

      </td>
      <td> {{$row->name}}</td>
      <td>{{ $row->hasRole('Candidate')?  $row->documents ? \Carbon\Carbon::parse($row->documents->created_at)->format('Y-m-d') : 'Not uploaded' :$row->email}}</td>
      <td>{{$row->phone}}</td>

      <td style="display: flex; gap:10px;justify-content:center" class="text-center">
        @if(Auth::user()->hasRole('Superadmin') || Auth::user()->can('view_candidate_details') || Auth::user()->can('view_users_details') )
        <a href="/admin/user/{{$row->user_id}}" class="btn btn-sm btn-gradient-success btn-rounded">View</a>
        @endif

        @hasrole('Superadmin')
        <a  class="btn btn-sm btn-gradient-warning btn-rounded editButton"  data-user-id="{{$row->user_id}}">Edit</a>

        <form class="delete-user-form" data-user-id="{{$row->user_id}}">
            @csrf
            <button type="button" class="btn btn-sm btn-gradient-danger btn-rounded delete-user-button">Delete</button>
          </form>
        @endhasrole

      </td>
    </tr>

    @endforeach
  </tbody>
</table>

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
                
                <form id="editUserRoleForm">
                  <input type="hidden" class="form-control" id="user_id">

                    <div class="form-group">
                        <label for="currentRole">Current Role:</label>
                        <input type="text" class="form-control" id="currentRole" disabled>
                    </div>

                    <div class="form-group pb-2">
                        <label for="newRole">Select New Role:</label>
                        <select class="form-control" id="newRole" name="newRole">
                            <!-- Dropdown options will be dynamically generated here -->
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>