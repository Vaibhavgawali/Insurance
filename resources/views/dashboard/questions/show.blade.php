@extends('dashboard/layouts/dashboard-layout')
@section('main-section')
<div>
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

                    <form >
                        @csrf
                        <label for="question">Question:</label>
                        <input type="text" name="question_text" value="{{ $question_text }}" readonly>

                        <label>Answers:</label>

                        @for ($i = 1; $i <= 4; $i++)
                            <div>
                                <input type="radio" name="correct_answer" value="{{ $i }}" {{ old('correct_answer', optional($correctOption)->id) == $answers->get($i - 1)->id ? 'checked' : '' }} class="form-check-input" disabled>
                                <label for="answer{{ $i }}">Answer {{ $i }}</label>
                                <input type="text" name="answers[]" value="{{ old('answers.' . ($i - 1), optional($answers->get($i - 1))->answer_text) }}" readonly>
                            </div>
                        @endfor
                        <button>Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection