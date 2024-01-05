<!-- <div> -->
<form method="post" action="/submit-quiz/{{$quizId}}" id="quizForm">
    @csrf
    @php $i = 1; @endphp
    @foreach ($questions as $question)
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-dark fw-bold fs-5 Question-text-style"><?= $i ?>) {{ $question['question_text'] }}</h4>
                        <div class="options-div">
                            <div class="d-flex gap-5 align-items-center Quiz-options-text ">

                                <div class="">
                                    <div class="d-flex pt-3">
                                        <input type="radio" class="question" name="{{ $question['id'] }}" value="{{ $question['option_1'] }}">
                                        <h4 class="mb-0 px-2 text-dark">{{ $question['option_1'] }}</h4>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <input type="radio" class="question" name="{{ $question['id'] }}" value="{{ $question['option_2'] }}">
                                        <h4 class="mb-0 px-2 text-dark">{{ $question['option_2'] }}</h4>
                                    </div>
                                </div>
                                <div class="">
                                    <div class=" d-flex pt-3">
                                        <input type="radio" class="question" name="{{ $question['id'] }}" value="{{ $question['option_3'] }}">
                                        <h4 class=" mb-0 px-2 text-dark">{{ $question['option_3'] }}</h6>
                                    </div>
                                    <div class="d-flex pt-3">
                                        <input type="radio" class="question" name="{{ $question['id'] }}" value="{{ $question['option_4'] }}">
                                        <h4 class="mb-0 px-2 text-dark">{{ $question['option_4'] }}</h6>
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

</form>
<!-- </div> -->