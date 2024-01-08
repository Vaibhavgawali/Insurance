@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-eye"></i>
            </span>Question
        </h3>
        <x-breadcrumb :breadcrumbs="$breadcrumbs??[]"></x-breadcrumb>
    </div>
    <div class="row">
        
        <div class="col-12 grid-margin stretch-card ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Question</h4>
                    <p class="card-description">Question Details </p>
                    <form class="forms-sample" >
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Question</label>
                            <input type="text" name="question_text" value="{{ $question_text }}" readonly class="form-control">
                            @if($errors->has('question_text'))
                            <div class="invalid-feedback d-block"> {{ $errors->first('question_text') }}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Answers:</label>
                        </div>
                        <div class="form-group">
                            @for ($i = 1; $i <= 4; $i++) <div class="form-check form-check-success ">
                                <label class="form-check-label d-flex align-items " for="answer{{ $i }}">
                                    <input type="radio" name="correct_answer" value="{{ $i }}" {{ old('correct_answer', optional($correctOption)->id) == $answers->get($i - 1)->id ? 'checked' : '' }} class="form-check-input" disabled> Answer {{ $i }} </label>
                                <input class="form-control" type="text" name="answers[]" value="{{ old('answers.' . ($i - 1), optional($answers->get($i - 1))->answer_text) }}" readonly>
                                @endfor
                        </div>
                        <a href="/quizes" class="btn btn-light" type="">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection