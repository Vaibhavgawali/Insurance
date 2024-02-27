@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<!-- partial -->

  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-airplay"></i>
        </span>Institute
      </h3>

    </div>
    <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body table-responsive">

        
          <h4 class="card-title">Institute Table</h4>
          <table id='example' class="table table-striped">
            <div class="form-sample">
            </div>
            <thead class="">
              <tr>
                <th class="">Sr. No</th>
                <th class="">Name</th>
                <th class="">Email</th>
                <th class="">Phone</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
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
          
          <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
          <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
          <script type="text/javascript">
            $(document).ready(function() {
              // Declare table variable in a wider scope
              var table = $('#example').DataTable({
                dom: "lBfrtip",
                buttons: [
            {
                extend: 'excelHtml5',
                className: 'btn btn-sm mx-3 btn-primary',
                id:"download_to_excel" // Add your CSS class here
            }
        ],
                processing: true,
                serverSide: true,
                ajax: {
                  url: "{{ route('getInstituteTableData') }}",
                  data: function(d) {
                    return d;
                  }
                },
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: true,
                    searchable: false,
                    className: 'text-center'
                  },
                  {
                    data: 'name',
                  },
                  {
                    data: 'email',
                    render: function(data, type, row) {
                      // Truncate names longer than 9 characters
                      return data.length > 20 ? data.substring(0, 20) + '...' : data;
                    }
                  },
                  {
                    data: 'phone'
                  },
                  {
                    data: 'actions',
                    orderable: false,
                    searchable: false
                  },
                ],
                createdRow: function(row, data, dataIndex) {
                  // Apply custom styles to the 'actions' column
                  var actionsColumn = $(row).find('td:eq(4)');
                  actionsColumn.addClass('custom-actions');
                }
              });

                 // Change users role
                 $(document).on('click', '.editButton', function() {
                  // alert("ok");
                  var userId = $(this).data("user-id");
                  showModal(userId);
              });

              // Function to show modal and fetch user details
              function showModal(userId) {
                  $.ajax({
                      url: "get-role/" + userId,
                      type: "GET",
                      success: function (response) {
                          $("#user_id").val(response.user_id);
                          $("#currentRole").val(response.current_role);

                          // Populate roles dropdown
                          var newRoleDropdown = $("#newRole");

                          // newRoleDropdown.unbind("change");
                          newRoleDropdown.empty();
                          $.each(response.all_roles, function (index, role) {
                              var option = $("<option>").val(role).text(role);

                              // Set the selected attribute for the current role
                              if (role === response.current_role) {
                                  option.prop("selected", true);
                              }
                              newRoleDropdown.append(option);
                          });

                          $("#editUserModal").modal("show");
                      },
                      error: function (error) {
                          console.error(error);
                      },
                  });
              }

              // Function to hide modal
              function hideModal() {
                  $("#editUserModal").hide();
              }

              // Event listener for Close button click
              $("#closeModal").on("click", function () {
                  hideModal();
              });

              // Event listener for Submit button click
              $("#editUserRoleForm").submit(function (e) {
                  e.preventDefault();

                  var userId = $("#user_id").val();
                  var formData = $("#editUserRoleForm").serialize();

                  $.ajax({
                      url: "assign-role/" + userId,
                      type: "POST",
                      data: formData,
                      headers: {
                          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                      },
                      success: function (response) {
                          hideModal();
                          userUpdateAlert();
                          var currentURL = window.location.href;
                          setTimeout(function () {
                              window.location.href = currentURL;
                          }, 2000);
                      },
                      error: function (error) {
                          console.error(error);
                      },
                  });
              });
              
            });
          </script>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection