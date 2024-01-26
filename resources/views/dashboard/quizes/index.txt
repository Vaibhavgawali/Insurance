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
                    <p class="card-description">Quizes List  Details</p><a href="/quizes/create" class="btn btn-primary btn-sm">Add Quiz</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-uppercase">id</th>
                                <th class="text-uppercase">title</th>
                                <th class="text-uppercase">description</th>
                                <th class="text-uppercase ">level</th>
                                <th class="text-uppercase">quiz_time <span style="font-size: 12px;" class="text-lowwercase">(in min)</span>
                                </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @php $i = 1 @endphp
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>
                                    @if(strlen($row->title) > 32)
                                    {{ substr($row->title, 0, 32) . '...' }}
                                    @else
                                    {{ $row->title }}
                                    @endif
                                </td>
                                <td>
                                    @if(strlen($row->description) > 32)
                                    {{ substr($row->description, 0, 32) . '...' }}
                                    @else
                                    {{ $row->description }}
                                    @endif
                                </td>
                                <td class="text-center">{{$row->level}}</td>
                                <td class="text-center">{{$row->quiz_time}}</td>
                                <td>
                                    <a href="/quizes/{{$row->id}}/edit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit quiz">
                                        <i class="mdi mdi-pen"></i>
                                    </a>
                                    <a href="/show_quiz/{{$row->id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View quiz">
                                      <i class="mdi mdi-eye"></i>
                                    </a>
                                    <a href="/quizes/{{$row->id}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Add question"><i class="mdi mdi-comment-question-outline"></i></a>
                                    
                                    <form class="delete-form d-inline" data-quiz-id="{{$row->id}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm delete-button" data-toggle="tooltip" data-placement="top" title="Delete quiz">
                                            <i class="mdi mdi-delete"></i>
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
