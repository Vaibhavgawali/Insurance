@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-comment-plus-outline"></i>
            </span>Quizes List
        </h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">Quizes List</h4>
                    <p class="card-description">Quizes List Details</p>
                    <table id='quizes' class="table table-striped">
                        <div class="d-flex align-items-center gap-4  m-3">
                            <a href="/quizes/create" class="btn btn-primary btn-sm">Add Quiz</a>
                            <div class="d-flex align-items-center gap-2">
                                <label class="w-100"><i class="mdi mdi-filter btn btn-warning btn-sm p-2" data-toggle="tooltip" data-placement="top" title="Filter by Level"></i></label>
                                <select class="p-1  border border-dark rounded" name="filterbylevel" id="filterbylevel">
                                    <option class="bg-light text-dark" value="" selected disabled>--Choose Level--</option>
                                    <option class="bg-light text-dark" value="">All</option>
                                    <option class="bg-light text-dark" value="1">1</option>
                                    <option class="bg-light text-dark" value="2">2</option>
                                    <option class="bg-light text-dark" value="3">3</option>

                                </select>
                            </div>
                        </div>

                        <thead class="">
                            <tr>
                                <th class="text-uppercase">SR.No</th>
                                <th class="text-uppercase">title</th>
                                <th class="text-uppercase">description</th>
                                <th class="text-uppercase ">level</th>
                                <th class="text-uppercase">quiz_time <span style="font-size: 12px;" class="text-lowercase">(in min)</span>
                                </th>
                                <th class="text-center text-uppercase">Actions</th>
                            </tr>
                        </thead>
                    </table>
                    
                    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            // Declare table variable in a wider scope
                            var table = $('#quizes').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: {
                                    url: "{{ route('getQuizesTableData') }}",
                                    data: function(d) {
                                        var level_Filter = document.getElementById('filterbylevel');
                                        d.filter_Level = level_Filter.value;
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
                                        data: 'title',
                                        render: function(data, type, row) {
                                            // Truncate names longer than 9 characters
                                            return data.length > 10 ? data.substring(0, 10) + '...' : data;
                                        }
                                    },
                                    {
                                        data: 'description',
                                        orderable: false,
                                        render: function(data, type, row) {
                                            // Truncate names longer than 9 characters
                                            return data.length > 32 ? data.substring(0, 32) + '...' : data;
                                        }
                                    },
                                    {
                                        data: 'level'
                                    },
                                    {
                                        data: 'quiz_time',
                                        orderable: false
                                    },
                                    {
                                        data: 'actions',
                                        orderable: false,
                                        searchable: false
                                    },
                                ],
                                createdRow: function(row, data, dataIndex) {
                                    // Apply custom styles to the 'actions' column
                                    var actionsColumn = $(row).find('td:eq(6)');
                                    actionsColumn.addClass('custom-actions');
                                }
                            });
                            $('#filterbylevel').on('change', function() {
                                // Reload the DataTable when the filter value changes
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