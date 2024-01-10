<!-- resources/views/auth/register.blade.php -->
@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span>Edit Quiz</h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <h6 class="text-end">Createdat:{{$quiz->created_at}}</h6>
                    <h4 class="card-title">Edit Quiz Details</h4>
                  
                    <!-- <p class="card-description"> Add Quiz Details</p> -->
                 
                    <form class="form-sample" id="edit_quiz">
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="quiz_id" id="quiz_id" value="{{$quiz->id}}" hidden>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Quiz title" value="{{$quiz->title}}">
                                <div id="title_error"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="description">{{$quiz->description}}</textarea>
                                <div id="description_error"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="level" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select name="level" id="level" class="form-control p-3">
                                    <option value="" disabled>Select Level</option>
                                    <option value="1" {{$quiz->level == '1' ? 'selected' : ''}}>Level 1</option>
                                    <option value="2" {{$quiz->level == '2' ? 'selected' : ''}}>Level 2</option>
                                    <option value="3" {{$quiz->level == '3' ? 'selected' : ''}}>Level 3</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quiz_time" class="col-sm-3 col-form-label">Quiz Time</label>
                            <div class="col-sm-9">
                                <select name="quiz_time" id="quiz_time" class="form-control p-3">
                                    <option value="" disabled>--Select--</option>
                                    <option value="1" {{$quiz->quiz_time == '1' ? 'selected' : ''}}>1 min</option>
                                    <option value="2" {{$quiz->quiz_time == '2' ? 'selected' : ''}}>2 min</option>
                                    <option value="3" {{$quiz->quiz_time == '3' ? 'selected' : ''}}>3 min</option>
                                    <option value="4" {{$quiz->quiz_time == '4' ? 'selected' : ''}}>4 min</option>
                                    <option value="5" {{$quiz->quiz_time == '5' ? 'selected' : ''}}>5 min</option>
                                </select>

                            </div>
                        </div>

                        <button type="submit" id="quiz_edit_button" class="btn btn-sm btn-gradient-primary me-2">Update Paper</button>
                        <a href="/quizes" class="btn btn-sm btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection