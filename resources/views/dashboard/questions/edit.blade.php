<!-- resources/views/auth/register.blade.php -->
@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div>
    <div class="page-header">
        <h3 class="page-title"> <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-plus"></i>
            </span>Add Quiz</h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Question</h4>
                    <p class="card-description"> Edit Question Details</p>
                    <form method="post" action="{{ route('questions.update',$question_id) }}">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="quiz_id" value="{{$quiz_id}}" />
                        <label for="question">Question:</label>
                        <input type="text" name="question_text" value="{{ old('question_text', $question_text) }}">
                        @if($errors->has('question_text'))
                            <div class="invalid-feedback d-block"> {{ $errors->first('question_text') }}</div>
                        @endif

                        <label>Answers:</label>

                        @for ($i = 1; $i <= 4; $i++)
                            <div>
                                <input type="radio" name="correct_answer" value="{{ $i }}" {{ old('correct_answer', optional($correctOption)->id) == $answers->get($i - 1)->id ? 'checked' : '' }}>
                                <label for="answer{{ $i }}">Answer {{ $i }}</label>
                                <input type="text" name="answers[]" value="{{ old('answers.' . ($i - 1), optional($answers->get($i - 1))->answer_text) }}">
                            </div>
                            @if($errors->has('answers.' . ($i - 1)))
                                <div class="invalid-feedback d-block">{{ $errors->first('answers.' . ($i - 1)) }}</div>
                            @endif
                        @endfor

                        @if($errors->has('correct_answer'))
                            <div class="invalid-feedback d-block">{{ $errors->first('correct_answer') }}</div>
                        @endif

                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection