@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span>Add Question</h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Question</h4>
                    <p class="card-description"> Add Question Details</p>
                    <form class="form-sample" id="create_question">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="quiz_id" id="quiz_id" value={{$quiz_id}}>
                            <label for="question">Question:</label>
                            <input class="form-control" type="text" name="question_text" id="question_text" value="{{ old('question_text')}}">
                            <div id="question_text_error"></div>
                        </div>


                        <label>Answers:</label>

                        <div class="form-group">
                            @for ($i = 0; $i < 4; $i++) <div class="form-check form-check-success ">
                                <label class="form-check-label d-flex align-items " for="answer{{ $i }}">
                                <input type="radio" name="correct" id="correct_{{$i}}" value="{{ $i }}" {{ old('correct_answer') == $i ? 'checked' : '' }}>Answer {{ $i + 1 }}
                            </label>
                        </div>
                        <input type="text" name="answerText" id="answerText_{{$i}}" value="{{ old('answers.' . $i) }}" class="form-control">
                        <div id="answerText_{{$i}}_error"></div>
                        @endfor
                </div>
                <button type="submit" id="add_question_button" class="btn btn-gradient-primary me-2">Submit</button>
                <a href="/quizes/{{$quiz_id}}" class="btn btn-light">Cancel</a>
                </form>
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection