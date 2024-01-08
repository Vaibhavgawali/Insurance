// Create Question 
// let button = document.getElementById("add_question_button");

// button.addEventListener('click',()=>
// {
//  console.log("clicked");
// })
let createQuestionAlert =()=>
{
    swal("Good job!", "Question created successfully!", "success");
}
let editQuestionAlert =()=>
{
    swal("Good job!", "Question updated successfully!", "success");
}

$(document).ready(function () {
    $("#create_question").submit(function (event) {
        var quiz_id = $("#quiz_id").val();
        var question_text = $("#question_text").val();
        var correct = $('input[name="correct"]:checked').val();
        var answerTextArray = [];

        for (var i = 0; i < 4; i++) {
            answerTextArray.push($('#answerText_' + i).val());
        }

        $(".error-message").remove(); // Remove existing error messages
        $("#question_text_error").html("");
        event.preventDefault();
      
        // Perform your custom validation here
        if (!question_text || question_text.trim() === "") {
            $("#question_text_error").html('<div class="invalid-feedback d-block">Question is required.</div>');
            // console.log('question_text:'+question_text);
            return false;
            
        }
    
        var answerTextEmpty = false;

        $.each(answerTextArray, function (index, answerText) {
            $("#answerText_" + index + "_error").html("");
            if (!answerText || answerText.trim() === "") {
            console.log(index);
                $("#answerText_" + index + "_error").html('<div class="invalid-feedback d-block">Answer is required.</div>');
                answerTextEmpty = true;
            }
        });

        if (answerTextEmpty) {
            return false;
        }

        var data = {
            quiz_id: quiz_id,
            question_text: question_text,
            answers: answerTextArray,
            correct_answer: correct
        };

        var url =window.location.origin +`/questions`;
        // console.log(url);

        $.ajax({
            type: "POST",
            url: url,
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response);
                if (response.status == true) {
                    $("#add_question_button").attr("disabled", true);
                     createQuestionAlert();
                    // setTimeout(function () {
                    //     window.location.reload();
                    // }, 1000);

                    return false;
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    var errors = response.responseJSON.errors;

                    $.each(errors, function (field, messages) {
                        var input = $('[name="' + field + '"]');
                        input.after('<div class="error-message invalid-feedback d-block">' + messages.join(", ") + "</div>");
                    });
                }
            },
        });
    });
});


//Edit question
$(document).ready(function () {
    $("#edit_question").submit(function (event) {
        var quiz_id = $("#quiz_id").val();
        var question_text = $("#question_text").val();
        var correct = $('input[name="correct"]:checked').val();
        // console.log(quiz_id)

        
        var answerTextArray = [];

        for (var i = 1; i <=4; i++) {
            answerTextArray.push($('#answerText_' + i).val());
        }
        // console.log(answerTextArray)
        // debugger;

        $(".error-message").remove(); // Remove existing error messages
        $("#question_text_error").html("");
        event.preventDefault();
      
        // Perform your custom validation here
        if (!question_text || question_text.trim() === "") {
            $("#question_text_error").html('<div class="invalid-feedback d-block">Question is required.</div>');
            console.log('question_text:'+question_text);
            return false;
            
        }
    
        var answerTextEmpty = false;

        $.each(answerTextArray, function (index, answerText) {
            $("#answerText_" + index + "_error").html("");
            if (!answerText || answerText.trim() === "") {
            console.log(index);
                $("#answerText_" + index + "_error").html('<div class="invalid-feedback d-block">Answer is required.</div>');
                answerTextEmpty = true;
            }
        });
        

        if (answerTextEmpty) {
            return false;
        }

        var data = {
            quiz_id: quiz_id,
            question_text: question_text,
            answers: answerTextArray,
            correct_answer: correct
        };
        console.log(data);
        

        var url =window.location.origin +`/questions/${quiz_id}`;
        console.log(url);
       

        $.ajax({
            type: "PATCH",
            url: url,
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response);
                if (response.status == true) {
                    $("#edit_question_button").attr("disabled", true);
                     editQuestionAlert();
                    // setTimeout(function () {
                    //     window.location.reload();
                    // }, 1000);

                    return false;
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    var errors = response.responseJSON.errors;

                    $.each(errors, function (field, messages) {
                        var input = $('[name="' + field + '"]');
                        input.after('<div class="error-message invalid-feedback d-block">' + messages.join(", ") + "</div>");
                    });
                }
            },
        });
    });
});
