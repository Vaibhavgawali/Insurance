@extends('dashboard/layouts/dashboard-layout')
@section('main-section')

<!-- quiz dynamic -->
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-card-details"></i>
            </span>Quiz Title :{{$quiz_title}}<br>
            <!-- <h5>Quiz Lavel</h5> -->
            <!-- <h5></h5> -->
            <span class="text-secondary Quiz-options">Quiz Level:{{$quiz_level}}</span>
            <h4 class="text-secondary reamining-time-text" id="time"></h4>
        </h3>
    </div>
    <x-quiz-component :questions="$questions" :quizId="$quiz_id" />


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    let quizAlert = (message,score,user_quiz_id) => {

        const quizStatusObject = {
            isPass: message,
            score:score,
            user_quiz_id:user_quiz_id
        };
        localStorage.setItem("quizstatus", JSON.stringify(quizStatusObject));
    };






    document.addEventListener('DOMContentLoaded', function() {
        storeAnswers();
    });

    function storeAnswers() {
        const storedAnswers = JSON.parse(localStorage.getItem('quizAnswers')) || {};

        document.querySelectorAll('.question').forEach(function(radio) {
            const questionId = radio.name;
            const storedAnswer = storedAnswers[questionId];

            if (storedAnswer && radio.value === storedAnswer) {
                radio.checked = true;
            }

            // Attach an event listener to update local storage when a new option is selected
            radio.addEventListener('change', function() {
                const selectedAnswer = this.value;
                storedAnswers[questionId] = selectedAnswer;
                // console.log(storedAnswers);
                // Save the updated answers to local storage
                localStorage.setItem('quizAnswers', JSON.stringify(storedAnswers));
            });
        });
    }

    $(document).ready(function() {

        var startTime = "<?php echo session('quiz_start_time'); ?>";
        var examDurationInMinutes = <?php echo $quiz_time; ?>; // 2 hours
        var examEndTime = "";
        if (!startTime) {
            $.get('/start-quiz', function(response) {
                if (response.success) {
                    startTime = new Date(response.start_time);
                    examEndTime = new Date(startTime.getTime() + examDurationInMinutes * 60 * 1000);
                    updateTimer();
                }
            });
        } else {

            startTime = new Date(startTime);
            examEndTime = new Date(startTime.getTime() + examDurationInMinutes * 60 * 1000);

            updateTimer();

        }

        // Update the timer every second
        var intervalId = setInterval(updateTimer, 1000);

        function updateTimer() {

            var startTime = "<?php echo session('quiz_start_time'); ?>";
            var currentTime = new Date();

            // Calculate the time difference in seconds
            var timeDifferenceInSeconds = Math.floor((examEndTime - currentTime) / 1000);

            // Calculate remaining hours, minutes, and seconds
            var remainingHours = Math.floor(timeDifferenceInSeconds / 3600);
            var remainingMinutes = Math.floor((timeDifferenceInSeconds % 3600) / 60);
            var remainingSeconds = timeDifferenceInSeconds % 60;

            $('#time').text('Time remaining: ' + remainingHours + ':' + remainingMinutes + ":" + (remainingSeconds < 10 ? '0' : '') + remainingSeconds);
            if (timeDifferenceInSeconds <= 0) {
                clearInterval(intervalId);
                submitQuiz();
            }

        }

        function submitQuiz() {
            // console.log("first");
            var formData = $("#quizForm").serialize();
            var baseUrl = $('meta[name="base-url"]').attr("content");
            var quiz_id = <?php echo $quiz_id; ?>;
            $.ajax({
                url: `${baseUrl}/submit-quiz/${quiz_id}`,
                method: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        clearInterval(intervalId);
                        localStorage.removeItem("quizAnswers");
                        if(response.passed === 'required'){
                            swal({
                                title: "",
                                text: "Please select all questions !",
                                icon: "warning",
                            })
                            return;
                        } else  if (response.passed) {
                            let user_quiz_id = response.user_quiz_id;
                            window.location.href = `${baseUrl}/candidate-quizes/`;
                            quizAlert(true,response.score,user_quiz_id);

                            // swal({
                            //     title: "",
                            //     text: "You have  passed the Assessment and score is: " + response.score + " /100",
                            //     icon: "success",
                            //     button: "View & Download Certificate",
                            // }).then(() => {
                            //     $url = `${baseUrl}/generate-pdf/${user_quiz_id}`;
                            //     window.location.href = $url; 
                            // });
                            // return;
                        } 
                        else {
                            $url = `${baseUrl}/candidate-quizes/`;
                            window.location.href = $url; // Move the redirection here
                            quizAlert(false,response.score);
                        }
                        // window.location.href = $url;
                        // window.location.href = `${baseUrl}/candidate-quizes/`;

                    } else {
                        // outside the valid time span
                        // console.log(response);
                        window.location.href = `${baseUrl}/candidate-quizes/`;
                    }
                }
            });
        }

        $("#quizForm").submit(function(e) {
            e.preventDefault();
            submitQuiz();
        })

    });
</script>

@endsection