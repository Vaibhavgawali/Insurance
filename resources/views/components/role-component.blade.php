<table class="table table-striped">
  <thead>
    <tr>
      <th>Sr.No</th>
      <th>Role </th>
      <th>Permissions</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($roles as $role)
    <tr>
      <td>{{$i++}}

      </td>
      <td> {{$role->name}}</td>
      <td>  
          @foreach ($role->permissions as $perm)
              <span class="badge badge-info mr-1">
                  {{ $perm->name }}
              </span>

          @endforeach
      </td>

      <td style="display: flex; gap:10px;justify-content:center" class="text-center">

        @hasrole('Superadmin')
          <a class="btn btn-sm btn-gradient-warning btn-rounded" href="/roles/{{$role->id}}/edit" data-role-id="{{$role->id}}">Edit</a>

          <form class="delete-role-form" data-role-id="{{$role->id}}">
              @csrf
              <button type="button" class="btn btn-sm btn-gradient-danger btn-rounded delete-role-button">Delete</button>
          </form>
        @endhasrole

      </td>
    </tr>

    @endforeach
  </tbody>
</table>