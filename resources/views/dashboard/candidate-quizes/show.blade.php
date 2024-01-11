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
                // Submit quiz when time is over
                clearInterval(intervalId);
                submitQuiz();
            }

        }

        function submitQuiz() {
            console.log("first");
            var formData = $("#quizForm").serialize();
            var baseUrl = $('meta[name="base-url"]').attr("content");
            var quiz_id = <?php echo $quiz_id; ?>;
            $.ajax({
                url: `${baseUrl}/submit-quiz/${quiz_id}`, // Adjust the URL as needed
                method: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        clearInterval(intervalId);
                        localStorage.removeItem("quizAnswers");
                        window.location.href = `${baseUrl}/candidate-quizes/`;
                    
                        // Handle success (e.g., redirect to a result page)
                    }else{
                        // outside the valid time span
                        console.log(response);
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