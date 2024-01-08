@extends('dashboard/layouts/dashboard-layout')
@section('main-section')

<!-- quiz dynamic -->
<div>
    <div class="main-panel Quiz-content">
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
            <x-quiz-component :questions="$questions" :quizId="$quiz_id"/>
           

        </div>
    </div>
</div>

<script>
   let initialQuizTime =  window.localStorage.getItem('quizTime') || {{$quiz_time}}; 

   function updateTimerDisplay(minutes, seconds) {
        const formattedMinutes = String(minutes).padStart(2, '0');
        const formattedSeconds = String(seconds).padStart(2, '0');

         document.getElementById('time').innerText = `Remaining Time : ${formattedMinutes}:${formattedSeconds} min`;
   }

   function startTimer() {
      let quizTime = initialQuizTime;
      let seconds = localStorage.getItem('timerSeconds') || 0;

      const timerInterval = setInterval(function() {
         if (quizTime <= 0 && seconds <= 0) {
            clearInterval(timerInterval);

            // Handle quiz submission or timeout here
            if (confirm("Time's up! Do you want to submit your quiz?")) {
                $("#quizForm").submit();
            }

         } else {
            if (seconds <= 0) {
               quizTime--;
               seconds = 59;
            } else {
               seconds--;
            }

            localStorage.setItem('quizTime', quizTime);
            localStorage.setItem('timerSeconds', seconds);

            updateTimerDisplay(quizTime, seconds);
         }
      }, 1000);
   }

  // Start the timer when the page loads
    window.onload = function() {
      startTimer();

      // Prompt the user before leaving the page
      window.addEventListener('beforeunload', function (event) {
         const confirmationMessage = "You have unsaved changes. Are you sure you want to leave ?";
         event.returnValue = confirmationMessage;
         return confirmationMessage;
      });
   };

    // Disable keys    
    document.addEventListener('keydown', function (event) {
        if (event.ctrlKey && (event.key === 'p' || event.keyCode === 80)) {
            event.preventDefault();
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
       storeAnswers();
    });

    function storeAnswers(){
        const storedAnswers = JSON.parse(localStorage.getItem('quizAnswers')) || {};
   
        document.querySelectorAll('.question').forEach(function (radio) {
            const questionId = radio.name;
            const storedAnswer = storedAnswers[questionId];

            if (storedAnswer && radio.value === storedAnswer) {
                radio.checked = true;
            }

            // Attach an event listener to update local storage when a new option is selected
            radio.addEventListener('change', function () {
                const selectedAnswer = this.value;
                storedAnswers[questionId] = selectedAnswer;
                console.log(storedAnswers);
                // Save the updated answers to local storage
                localStorage.setItem('quizAnswers', JSON.stringify(storedAnswers));
            });
        });
    }

</script>

@endsection