@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<!-- partial -->

  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-account-plus"></i>
        </span>Roles
      </h3>

    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body table-responsive">
            <h4 class="card-title">Roles Table</h4>
            
            <table id='roles' class="table table-striped">
                <div class="d-flex align-items-center gap-4  m-3">
                    <a href="/roles/create" class="btn btn-primary btn-sm">Add Role</a>
                </div>
                <thead class="">
                    <tr>
                        <th class="text-uppercase">SR.No</th>
                        <th class="text-uppercase">role</th>
                        <th class="text-uppercase">permissions</th>
                        <th class="text-center text-uppercase">Actions</th>
                    </tr>
                </thead>
            </table>

          </div>

        </div>
      </div>
    </div>
  </div>

    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            
            var table = $('#roles').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('getRolesTableData') }}",
                    data: function(d) {
                        // var level_Filter = document.getElementById('filterbylevel');
                        // d.filter_Level = level_Filter.value;
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
                            return  data;//data.length > 10 ? data.substring(0, 10) + '...' :data
                        }
                    },
                    {
                        data: 'permissions',
                        orderable: false,
                        render: function(data, type, row) {
                            // Truncate names longer than 9 characters
                            return data; //data.length > 32 ? data.substring(0, 32) + '...' : data;
                        }
                    },
                    {
                        data: 'actions',
                        orderable: false,
                        searchable: false
                    },
                ],
                createdRow: function(row, data, dataIndex) {
                    var actionsColumn = $(row).find('td:eq(6)');
                    actionsColumn.addClass('custom-actions');
                }
            });
           
        });
    </script>
 
@endsection