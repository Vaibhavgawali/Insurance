<!-- <div> -->
<!-- action="/submit-quiz/{{$quizId}}" -->
<form method="post" id="quizForm">
    @csrf
    @php $i = 1; @endphp
    <input type="hidden" name="quiz_id" value={{$quizId}} id="quiz_id" />
    @foreach ($questions as $question)
    <div class="row" >
        <div class="col-lg-12 grid-margin stretch-card question-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-dark  fs-5 Question-text-style"><?= $i ?>) {{ $question['question_text'] }}</h4>
                    <div class="options-div">
                        <div class="d-flex gap-5 align-items-center Quiz-options-text ">

                            <div class="">
                                <div class="d-flex pt-3">
                                    <input type="radio" class="question" name="{{ $question['id'] }}" value="{{ $question['option_1'] }}">
                                    <h4 class="mb-0 px-2 text-dark options">{{ $question['option_1'] }}</h4>
                                </div>
                                <div class="d-flex pt-3">
                                    <input type="radio" class="question" name="{{ $question['id'] }}" value="{{ $question['option_2'] }}">
                                    <h4 class="mb-0 px-2 text-dark options">{{ $question['option_2'] }}</h4>
                                </div>
                            </div>
                            <div class="">
                                <div class=" d-flex pt-3">
                                    <input type="radio" class="question" name="{{ $question['id'] }}" value="{{ $question['option_3'] }}">
                                    <h4 class=" mb-0 px-2 text-dark options">{{ $question['option_3'] }}</h6>
                                </div>
                                <div class="d-flex pt-3">
                                    <input type="radio" class="question" name="{{ $question['id'] }}" value="{{ $question['option_4'] }}">
                                    <h4 class="mb-0 px-2 text-dark options">{{ $question['option_4'] }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php ++$i; @endphp
    @endforeach
    <div class="button-container d-flex justify-content-end">
        <button id="quiz_submit" type="submit" class="btn btn-primary  text-uppercase">Submit</button>

    </div>
</form>
<!-- </div> -->