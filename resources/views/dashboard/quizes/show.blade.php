@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-multiple"></i>
            </span>Paper List {{$quiz_id}}
        </h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">Paper List</h4>
                    <p class="card-description"> Paper List </p><div class="d-flex justify-content-between"> <a href="/questions/create?quiz_id={{ $quiz_id }}" class="btn btn-primary btn-sm">Add Question</a> <a class="btn btn-primary btn-sm text-end" href="/quizes/"> <i class="mdi mdi-arrow-left"></i>Quizes</a></div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-uppercase">id</th>
                                <th class="text-uppercase">question_text</th>
                                <th class="text-uppercase">option_1</th>
                                <th class="text-uppercase">option_2</th>
                                <th class="text-uppercase">option_3</th>
                                <th class="text-uppercase">option_4</th>
                                <th class="text-uppercase ">is_correct</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @php $i = 1 @endphp
                        <tbody>
                            @foreach($questions as $question)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    @if(strlen($question['question_text']) > 32)
                                    {{ substr($question['question_text'], 0, 32) . '...' }}
                                    @else
                                    {{ $question['question_text'] }}
                                    @endif
                                </td>
                                <td>
                                    @if(strlen($question['option_1']) > 13)
                                    {{ substr($question['option_1'], 0, 13) . '...' }}
                                    @else
                                    {{ $question['option_1'] }}
                                    @endif
                                </td>
                                <td>
                                    @if(strlen($question['option_2']) > 13)
                                    {{ substr($question['option_2'], 0, 13) . '...' }}
                                    @else
                                    {{ $question['option_2'] }}
                                    @endif
                                </td>
                                <td>
                                    @if(strlen($question['option_3']) > 13)
                                    {{ substr($question['option_3'], 0, 13) . '...' }}
                                    @else
                                    {{ $question['option_3'] }}
                                    @endif
                                </td>
                                <td>
                                    @if(strlen($question['option_4']) > 13)
                                    {{ substr($question['option_4'], 0, 13) . '...' }}
                                    @else
                                    {{ $question['option_4'] }}
                                    @endif
                                </td>
                                <td>
                                    @if(strlen($question['is_correct']) > 13)
                                    {{ substr($question['is_correct'], 0, 13) . '...' }}
                                    @else
                                    {{ $question['is_correct'] }}
                                    @endif
                                </td>
                                <td>
                                    <a href="/questions/{{$question['id']}}/edit" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                    <a href="/questions/{{$question['id']}}" class="btn btn-info btn-sm">
                                        View
                                    </a>
                                    <form class="delete-question-form d-inline" data-question-id="{{$question['id']}}">
                                    @csrf
                                        <button class="btn btn-danger btn-sm delete-question-button" >
                                            Delete
                                        </button>
                                    </form>


                                </td>
                            </tr>
                            @php $i++ @endphp
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection