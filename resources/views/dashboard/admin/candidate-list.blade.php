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
        <div class="card-body table-responsive">
          <h4 class="card-title">Candidates Table</h4>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="exampleFormControlSelect3">Buisness Line</label>
                <select class="form-control form-control-sm" name="filterbypreffered_line" id="filterbypreffered_line">
                  <option value="" selected disabled>--Select options--</option>
                  <option value="">All</option>
                  <option value="life">Life</option>
                  <option value="general">General</option>
                  <option value="health">Health</option>
                  <option value="other">Other</option>
                </select>
              </div>
           

<div class="toast-container position-absolute  top-0 start-0">
  <div id="liveToast" class="toast bg-success text-light   border-0 " role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <i class="mdi mdi-filter btn-primary btn btn-sm"></i>
      <strong class="me-auto mx-2" id="filter_name"></strong>
      <small>Filtered results</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" id="filter_body">
      
    </div>
  </div>
</div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="exampleFormControlSelect3">Cv Upload</label>
                <select class="form-control form-control-sm"  name="filterbycv" id="filterbycv">
                <option value="" selected disabled>--Select options--</option>
                <option value="">All</option>
                <option value="uploaded">Uploaded</option>
                <option value="not_uploaded">Not Uploaded</option>
                </select>
              </div>

            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="exampleFormControlSelect3">Experience</label>
                <select class="form-control form-control-sm"  name="filterbyexperience" id="filterbyexperience">
                <option value="" selected disabled>--Select options--</option>
                <option value="">All</option>
                <option value="fresher">Fresher</option>
                <option value="experienced">Experienced</option>
                </select>
              </div>

            </div>
          </div>

          <table id='example' class="table table-striped  ">
            <div class="form-sample">
            </div>
            <thead class="">
              <tr>
                <th class="">Sr. No</th>
                <th class="">Name</th>
                <th class="">CV Upload</th>
                <th class="">Phone</th>
                <th class="">Buisness Line</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
          </table>
          <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
          <script type="text/javascript">
            $(document).ready(function() {
              // Declare table variable in a wider scope
              var table = $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                  url: "{{ route('getCandidateTableData') }}",
                  data: function(d) {
                    // d.filter_name = $('#filterbypreffered_line').val();
                    var preffered_lineFilter = document.getElementById('filterbypreffered_line');
                    d.filter_Line = preffered_lineFilter.value;

                    var documents_Filter = document.getElementById('filterbycv');
                    d.documents = documents_Filter.value;

                    var experience_Filter = document.getElementById('filterbyexperience');
                    d.experience = experience_Filter.value;

                    // Return the data object
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
                    render: function(data, type, row) {
                      // Truncate names longer than 9 characters
                      return data.length > 9 ? data.substring(0, 9) + '...' : data;
                    }
                  },
                  {
                    data: 'documents',
                    render: function(data, type, row) {
                      // Check if documents exist and format the date
                      return row.documents ? new Date(row.documents.created_at).toISOString().split('T')[0] : 'Not uploaded';
                    }
                  },
                  {
                    data: 'phone'
                  },
                  {
                    data: 'profile', // Corrected the property name
                    render: function(data, type, row) {
                      var capitalizedLine = data.preffered_line.charAt(0).toUpperCase() + data.preffered_line.slice(1);
                      return capitalizedLine.length > 9 ? capitalizedLine.substring(0, 9) + '...' : capitalizedLine;
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
              $('#filterbypreffered_line').on('change', function() {
                // Reload the DataTable when the filter value changes
               let filter_name = $('#filterbypreffered_line').val()
               if(filter_name==='')
               {
                 filter_name="all";
               }
                table.ajax.reload();
                $('#filter_name').html(filter_name);
                $('#filter_body').html(`Showing results for ${filter_name}`);
                const toastLiveExample = document.getElementById('liveToast')
               const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
                toastBootstrap.show()

              });
              $('#filterbycv').on('change', function() {
                // Reload the DataTable when the filter value changes
                table.ajax.reload();
              });
              $('#filterbyexperience').on('change', function() {
                // Reload the DataTable when the filter value changes
                // console.log('triggred');
                table.ajax.reload();
              });
            });
          </script>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection