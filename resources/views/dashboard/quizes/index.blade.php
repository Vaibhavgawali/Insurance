@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-multiple"></i>
            </span>Paper List
        </h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">Paper List</h4>
                    <p class="card-description"> Paper List </p><a href="/quizes/create" class="btn btn-primary btn-sm">Add Quiz</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-uppercase">id</th>
                                <th class="text-uppercase">title</th>
                                <th class="text-uppercase">description</th>
                                <th class="text-uppercase">level</th>
                                <th class="text-uppercase">quiz_time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @php $i = 1 @endphp
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$row->title}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{$row->level}}</td>
                                <td>{{$row->quiz_time}}</td>
                                <td>
                                    <a href="{{$row->id}}/edit" class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                    <a href="/quizes/{{$row->id}}" class="btn btn-info btn-sm">
                                        View
                                    </a>
                                    <form class="delete-form d-inline" data-quiz-id="{{$row->id}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm delete-button">
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