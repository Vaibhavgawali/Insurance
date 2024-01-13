<!-- resources/views/auth/register.blade.php -->
@extends('dashboard/layouts/dashboard-layout')
@section('main-section')


<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-tooltip-edit"></i>
            </span>Edit Question</h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Question</h4>
                    <p class="card-description">Edit Question Details </p>
                    <form class="forms-sample" id="edit_question">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Question</label>
                            <input type="hidden" name="question_id" id="question_id" value="{{$question_id}}" />
                            <input type="text" name="question_text" value="{{ old('question_text', $question_text) }}" class="form-control" id="question_text" placeholder="Write question here">
                            <div id="question_text_error"></div>

                        </div>
                        <div class="form-group">
                            <label>Answers:</label>
                        </div>
                        <div class="form-group">
                            @for ($i = 1; $i <= 4; $i++) <div class="form-check form-check-success">
                                <label class="form-check-label d-flex align-items " for="answer{{ $i }}">
                                    <input type="radio" class="form-check-input " name="correct" id="correct_{{$i}}" value="{{ $i }}" {{ old('correct_answer', optional($correctOption)->id) == $answers->get($i - 1)->id ? 'checked' : '' }}> Answer {{ $i }}
                                </label>

                                <input type="text"  type="text" name="answerText" id="answerText_{{$i}}" value="{{ old('answers.' . ($i - 1), optional($answers->get($i - 1))->answer_text) }}" class="form-control"  placeholder="Write Answer here">
                                <div id="answerText_{{$i-1}}_error"></div>
                                @endfor
                        </div>

                        <button type="submit" id="edit_question_button" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="/quizes/{{$quiz_id}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection