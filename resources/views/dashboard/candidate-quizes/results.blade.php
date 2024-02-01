@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<!-- partial -->

<div class="content-wrapper">
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-account-card-details"></i>
      </span>Results
    </h3>

  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body table-responsive">
          <h4 class="card-title">Results Table</h4>
          <div class="row">

            <div class="col-4">
              <div class="form-group">
                <label for="exampleFormControlSelect3">Quiz Level</label>
                <select class="form-control form-control-sm" name="filterbylevel" id="filterbylevel">
                  <option value="" selected disabled>--Select options--</option>
                  <option value="">All</option>
                  <option value="1">Level 1</option>
                  <option value="2">Level 2</option>
                  <option value="3">Level 3</option>
                </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="exampleFormControlSelect3">Pass Status</label>
                <select class="form-control form-control-sm"  name="filterbypass_status" id="filterbypass_status">
                    <option value="" selected disabled>--Select options--</option>
                    <option value="">All</option>
                    <option value="pass">Pass</option>
                    <option value="fail">Fail</option>
                </select>
              </div>
            </div>
        </div>

          <table id='results' class="table table-striped  ">
            <!-- <div class="form-sample">
            </div> -->
            <thead class="">
              <tr>
                <th class="">Sr. No</th>
                <th class="">Name</th>
                <th class="">Level</th>
                <th class="">Score</th>
                <th class="">Status</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
          </table>

          <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
          <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
          <script type="text/javascript">
            $(document).ready(function() {
              // Declare table variable in a wider scope
              var table = $('#results').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                  url: "{{ route('getResultsTableData') }}",
                  data: function(d) {
                   
                    var levelFilter = document.getElementById('filterbylevel');
                    d.Level = levelFilter.value;

                    var passstatus_Filter = document.getElementById('filterbypass_status');
                    d.passstatus = passstatus_Filter.value;

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
                        data: 'user.name', 
                        render: function(data, type, row) {
                            return data;// data.length > 9 ? data.substring(0, 9) + '...' : data;
                        }
                    },
                    {
                        data: 'level', 
                        orderable: true,
                        searchable: true,
                        className: 'text-center'
                    },
                    {
                        data: 'score', 
                        orderable: true,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'pass_status', 
                        orderable: true,
                        searchable: false,
                        className: 'text-center'
                    },
                  {
                    data: 'actions',
                    orderable: false,
                    searchable: false
                  },
                ],
                createdRow: function(row, data, dataIndex) {
                  var actionsColumn = $(row).find('td:eq(5)');
                  actionsColumn.addClass('custom-actions');
                }
              });

              $('#filterbylevel').on('change', function() {
                table.ajax.reload();
              });

              $('#filterbypass_status').on('change', function() {
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