let createQuestionAlert = () => {
    swal("Good job!", "Question created successfully !", "success");
};
let editQuestionAlert = () => {
    swal("Good job!", "Question updated successfully !", "success");
};

$(document).ready(function () {
    $("#create_question").submit(function (event) {
        var quiz_id = $("#quiz_id").val();
        var question_text = $("#question_text").val();
        var correct = $('input[name="correct"]:checked').val();
        var answerTextArray = [];

        for (var i = 0; i < 4; i++) {
            answerTextArray.push($("#answerText_" + i).val());
        }

        $(".error-message").remove(); // Remove existing error messages
        $("#question_text_error").html("");
        event.preventDefault();

        // Perform your custom validation here
        if (!question_text || question_text.trim() === "") {
            $("#question_text_error").html(
                '<div class="invalid-feedback d-block">Question is required.</div>'
            );
            // console.log('question_text:'+question_text);
            return false;
        }

        var answerTextEmpty = false;

        $.each(answerTextArray, function (index, answerText) {
            $("#answerText_" + index + "_error").html("");
            if (!answerText || answerText.trim() === "") {
                console.log(index);
                $("#answerText_" + index + "_error").html(
                    '<div class="invalid-feedback d-block">Answer is required.</div>'
                );
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
            correct_answer: correct,
        };

        var url = window.location.origin + `/questions`;
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
                    setTimeout(function () {
                        window.location.href =
                            window.location.origin + `/quizes/${quiz_id}`;
                    }, 2000);

                    return false;
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    var errors = response.responseJSON.errors;

                    $.each(errors, function (field, messages) {
                        var input = $('[name="' + field + '"]');
                        input.after(
                            '<div class="error-message invalid-feedback d-block">' +
                                messages.join(", ") +
                                "</div>"
                        );
                    });
                }
            },
        });
    });
});

//Edit question
$(document).ready(function () {
    $("#edit_question").submit(function (event) {
        var question_id = $("#question_id").val();
        var quiz_id = $("#quiz_id").val();
        var question_text = $("#question_text").val();
        var correct = $('input[name="correct"]:checked').val();
        // console.log("Question edit:" + question_id);
        // console.log(quiz_id);

        var answerTextArray = [];

        for (var i = 1; i <= 4; i++) {
            answerTextArray.push($("#answerText_" + i).val());
        }
        // console.log(answerTextArray)
        // debugger;

        $(".error-message").remove(); // Remove existing error messages
        $("#question_text_error").html("");
        event.preventDefault();

        // Perform your custom validation here
        if (!question_text || question_text.trim() === "") {
            $("#question_text_error").html(
                '<div class="invalid-feedback d-block">Question is required.</div>'
            );
            console.log("question_text:" + question_text);
            return false;
        }

        var answerTextEmpty = false;

        $.each(answerTextArray, function (index, answerText) {
            $("#answerText_" + index + "_error").html("");
            if (!answerText || answerText.trim() === "") {
                console.log(index);
                $("#answerText_" + index + "_error").html(
                    '<div class="invalid-feedback d-block">Answer is required.</div>'
                );
                answerTextEmpty = true;
            }
        });

        if (answerTextEmpty) {
            return false;
        }

        var data = {
            question_id: question_id,
            question_text: question_text,
            answers: answerTextArray,
            correct_answer: correct,
        };
        console.log(data);

        var url = window.location.origin + `/questions/${question_id}`;
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
                    setTimeout(function () {
                        window.location.href =
                            window.location.origin + `/quizes/${quiz_id}`;
                    }, 2000);

                    return false;
                }
            },
            error: function (response) {
                if (response.status === 422) {
                    var errors = response.responseJSON.errors;

                    $.each(errors, function (field, messages) {
                        var input = $('[name="' + field + '"]');
                        input.after(
                            '<div class="error-message invalid-feedback d-block">' +
                                messages.join(", ") +
                                "</div>"
                        );
                    });
                }
            },
        });
    });
});

$(document).on("click", ".delete-question-button", function (e) {
    e.preventDefault();
    let question_id = $(this)
        .closest(".delete-question-form")
        .data("question-id");
    console.log("Clicked delete button with ID:", question_id);
    questionDeleteAlert(question_id);
    debugger;
});

let questionDeleteAlert = (question_id) => {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this question!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            deleteQuestionFunction(question_id);
            setTimeout(function () {
                window.location.reload();
            }, 1000);
            swal("! Your question file has been deleted!", {
                icon: "success",
            });
        } else {
            swal("Your question is safe!");
        }
    });
};

// Delete question
const deleteQuestionFunction = (question_id) => {
    var data = {
        question_id: question_id,
    };
    console.log(data);
    let question_url = window.location.origin + `/questions/${question_id}`;
    console.log("question_url:" + question_url);
    debugger;
    $.ajax({
        url: question_url,
        type: "DELETE",
        data: data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            console.log(response);
            if (response.status == true) {
                $(
                    ".delete-question-button[data-question-id='" +
                        question_id +
                        "']"
                ).attr("disabled", true);
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
                    input.after(
                        '<div class="error-message invalid-feedback d-block">' +
                            messages.join(", ") +
                            "</div>"
                    );
                });
            }
        },
    });
};
