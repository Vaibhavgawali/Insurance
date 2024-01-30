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
        <div class="card-body table-responsive">
          <h4 class="card-title">Institute Table</h4>
          <table id='requirements' class="table table-striped">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="exampleFormControlSelect3">Filter by User</label>
                  <select class="form-control form-control-sm" name="filterbyuser" id="filterbyuser">
                    <option value="" selected disabled>--Select options--</option>
                    <option value="">All</option>
                    <option value="insurer">Insurer</option>
                    <option value="institute">Institute</option>
                  </select>
                </div>

              </div>
            </div>
            <div class="form-sample">
            </div>
            <thead class="">
              <tr>
                <th class="">Sr. No</th>
                <th class="">Name</th>
                <th>Created At</th>
                <th class="">Requiremnts</th>
                <th class="">Actions</th>
              </tr>
            </thead>
          </table>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Requirements</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- Use inline style to set max height and enable scrolling -->
                  <div>
                    <div id="date-div">
                      <h6 id="date" class="fs-6 text-end"></h6>
                    </div>
                    <div id="name-div">
                      <h5 id="name"></h5>
                    </div>
                    <div id="email-div">
                      <h5 id="email"></h5>
                    </div>
                    <div id="phone-div">
                      <h5 id="phone"></h5>
                    </div>


                  </div>
                  <div style="max-height: 400px; overflow-y: auto;" id="modal-content" class="text-justify">
                    Requirements: <br>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
          <script type="text/javascript">
            $(document).ready(function() {
              var table = $('#requirements').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                  url: "{{ route('getRequirementsTableData') }}",
                  data: function(d) {
                    d.filterbyuser = $('#filterbyuser').val(); // Add filterbyuser value to the data object
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
                    orderable: true,
                    render: function(data, type, row) {
                      return row.user.name;
                    }
                  },
                  {
                    data: 'created_at',
                    orderable: true,
                    render: function(data, type, row) {
                      // Format the date to show only the date part
                      var date = new Date(row.user.created_at);
                      return date.toISOString().split('T')[0];
                    }
                  },
                  {
                    data: 'requirement_text',
                    render: function(data, type, row) {
                      // Truncate the requirements text if it's longer than 30 characters
                      return data.length > 30 ? data.substring(0, 30) + '...' : data;
                    }
                  },
                  {
                    data: 'actions',
                    orderable: false,
                    searchable: false

                  },
                ],
                createdRow: function(row, data, dataIndex) {
                  // Apply custom styles to the 'actions' column
                  var actionsColumn = $(row).find('td:eq(5)');
                  actionsColumn.addClass('custom-actions');
                }
              });
              // debugger;

              $('#filterbyuser').on('change', function() {
                // Reload the DataTable when the filter value changes
                table.ajax.reload();
              });
           
              $(document).on('click', '.view-btn', function() {
                // alert("hello");
                // $('#exampleModal').modal('toggle')
               
                var requirementText = $(this).data('requirement');
                var olddate = new Date($(this).data("user-date")) ;
                  var email = $(this).data("user-email");
                  var name = $(this).data("user-name");
                  var phone = $(this).data("user-phone"); 
                  var date = olddate.toISOString().split('T')[0];
                // console.log(requirementText)
                    $("#date").html('Date: ' + date);
                  $("#name").html('Name: ' + name);
                  $("#email").html('Email: ' + email);
                  $("#phone").html('Phone: ' + phone);
                  $('#modal-content').html(requirementText);
                $('#exampleModal').modal('show');
                
              });
            });
          </script>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection