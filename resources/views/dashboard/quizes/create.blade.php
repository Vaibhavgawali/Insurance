<!-- resources/views/auth/register.blade.php -->
@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span>Add Assessment</h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Assessment</h4>
                    <p class="card-description"> Add Assessment Details</p>
                    <form   class="form-sample"  id="create_quiz">
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="title" placeholder="Quiz title">
                                <div id="title_error"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="description" placeholder="Quiz description" ></textarea>
                               <div id="description_error"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="level" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select name="level" id="level" class="form-control p-3" >
                                    <option value="" selected disabled>--Select--</option>
                                    <option value="1">Level 1</option>
                                    <option value="2">Level 2</option>
                                    <option value="3">Level 3</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="quiz_time" class="col-sm-3 col-form-label">Assessment Time</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="quiz_time" id="quiz_time" placeholder="Write quiz time in minute" value="">
                            </div>
                        </div>

                        <button type="submit" id="quiz_create_button" class="btn btn-gradient-primary me-2">Create Assessment</button>
                        <a href="/quizes/" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection