@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-comment-question-outline"></i>
                </span>Question List {{$quiz_id}}
        </h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">Question List</h4>
                    <p class="card-description"> Questions </p> <a href="/questions/create?quiz_id={{ $quiz_id }}" class="btn btn-primary btn-sm mb-3">Add Question</a>
                    <table class="table table-striped" id="quetions">
                        <thead>
                            <tr>
                                <th class="text-uppercase">SR.NO</th>
                                <th class="text-uppercase">question_text</th>
                                <th class="text-uppercase">option_1</th>
                                <th class="text-uppercase">option_2</th>
                                <th class="text-uppercase">option_3</th>
                                <th class="text-uppercase">option_4</th>
                                <th class="text-uppercase ">is_correct</th>
                                <th class="text-uppercase text-center">Actions</th>
                            </tr>
                        </thead>
                    </table>
                    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            // Declare table variable in a wider scope
                            var table = $('#quetions').DataTable({
                                processing: true,
                                serverSide: true,
                                ajax: {
                                    url: "{{ route('getQuestionsTableData', ['quiz_id' => $quiz_id]) }}",
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
                                        data: 'question_text',
                                        render: function(data, type, row) {
                                            // Truncate names longer than 9 characters
                                            return data.length > 32 ? data.substring(0, 32) + '...' : data;
                                        }
                                    },
                                    {
                                        data: 'option_1',
                                        orderable: false,
                                        render: function(data, type, row) {
                                            // Truncate names longer than 9 characters
                                            return data.length > 13 ? data.substring(0, 13) + '...' : data;
                                        }
                                    },
                                    {
                                        data: 'option_2',
                                        orderable: false,
                                        render: function(data, type, row) {
                                            // Truncate names longer than 9 characters
                                            return data.length > 13 ? data.substring(0, 13) + '...' : data;
                                        }
                                    },
                                    {
                                        data: 'option_3',
                                        orderable: false,
                                        render: function(data, type, row) {
                                            // Truncate names longer than 9 characters
                                            return data.length > 13 ? data.substring(0, 13) + '...' : data;
                                        }
                                    },
                                    {
                                        data: 'option_4',
                                        orderable: false,
                                        render: function(data, type, row) {
                                            // Truncate names longer than 9 characters
                                            return data.length > 13 ? data.substring(0, 13) + '...' : data;
                                        }
                                    },
                                    {
                                        data: 'is_correct',
                                        orderable: false,
                                        render: function(data, type, row) {
                                            // Truncate names longer than 9 characters
                                            return data.length > 13 ? data.substring(0, 13) + '...' : data;
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
                                    var actionsColumn = $(row).find('td:eq(8)');
                                    console.log(data);
                                    actionsColumn.addClass('custom-actions');
                                }
                            });
                            // $('#filterbylevel').on('change', function() {
                            //     // Reload the DataTable when the filter value changes
                            //     table.ajax.reload();
                            // });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection