//Quiz create
let quizCreatedAlert = () => {
    swal("Good job!", "Quiz created successfully !", "success");
};
let quizUpdateAlert = () => {
    swal("Good job!", "Quiz Updated successfully !", "success");
};

$(document).ready(function () {
    $("#create_quiz").submit(function (e) {
        var title = $("#title").val();
        var description = $("#description").val();
        var level = $("#level").val();
        var quiz_time = $("#quiz_time").val();

        $(".error-message").remove(); // Remove existing error messages
        $("#title_error").html("");
        $("#description_error").html("");
        $("#level_error").html("");
        $("#quiz_time_error").html("");

        e.preventDefault();

        if (!title || title.trim() === "") {
            $("#title_error").html(
                '<div class="invalid-feedback d-block">Title is ruequired.</div>'
            );
            console.log("question_text:" + question_text);
            return false;
        }
        if (!title || title.trim() === "") {
            $("#description_error").html(
                '<div class="invalid-feedback d-block">Description is ruequired.</div>'
            );
            console.log("question_text:" + question_text);
            return false;
        }
        if (!title || title.trim() === "") {
            $("#level_error").html(
                '<div class="invalid-feedback d-block">Level is ruequired.</div>'
            );
            console.log("question_text:" + question_text);
            return false;
        }
        if (!title || title.trim() === "") {
            $("#quiz_time_error").html(
                '<div class="invalid-feedback d-block">Time is ruequired.</div>'
            );
            console.log("question_text:" + question_text);
            return false;
        }
        var data = {
            title: title,
            description: description,
            level: level,
            quiz_time,
        };
        var url = window.location.origin + `/quizes/`;

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response);
                if (response.status == true) {
                    $("#quiz_create_button").attr("disabled", true);
                    quizCreatedAlert();
                    setTimeout(function () {
                        window.location.href =
                            window.location.origin + "/quizes/";
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

$(document).ready(function () {
    $("#edit_quiz").submit(function (e) {
        var quiz_id = $("#quiz_id").val();
        var title = $("#title").val();
        var description = $("#description").val();
        var level = $("#level").val();
        var quiz_time = $("#quiz_time").val();

        $(".error-message").remove(); // Remove existing error messages
        $("#title_error").html("");
        $("#description_error").html("");
        $("#level_error").html("");
        $("#quiz_time_error").html("");

        e.preventDefault();

        if (!title || title.trim() === "") {
            $("#title_error").html(
                '<div class="invalid-feedback d-block">Title is ruequired.</div>'
            );
            console.log("question_text:" + question_text);
            return false;
        }
        if (!title || title.trim() === "") {
            $("#description_error").html(
                '<div class="invalid-feedback d-block">Description is ruequired.</div>'
            );
            console.log("question_text:" + question_text);
            return false;
        }
        if (!title || title.trim() === "") {
            $("#level_error").html(
                '<div class="invalid-feedback d-block">Level is ruequired.</div>'
            );
            console.log("question_text:" + question_text);
            return false;
        }
        if (!title || title.trim() === "") {
            $("#quiz_time_error").html(
                '<div class="invalid-feedback d-block">Time is ruequired.</div>'
            );
            console.log("question_text:" + question_text);
            return false;
        }
        var data = {
            quiz_id: quiz_id,
            title: title,
            description: description,
            level: level,
            quiz_time,
        };
        var url = window.location.origin + `/quizes/${quiz_id}`;

        $.ajax({
            url: url,
            type: "PATCH",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                console.log(response);
                if (response.status == true) {
                    $("#quiz_create_button").attr("disabled", true);
                    quizUpdateAlert();
                    setTimeout(function () {
                        // window.location.reload();
                        window.location.href =
                            window.location.origin + "/quizes/";
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

// Event delegation for delete buttons
$(document).on("click", ".delete-button", function (e) {
    e.preventDefault();
    let quiz_id = $(this).closest(".delete-form").data("quiz-id");
    quizDeleteAlert(quiz_id);
    // console.log("quiz_id:" + quiz_id);
    // debugger;
});

let quizDeleteAlert = (quiz_id) => {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this quiz!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            console.log(first)
            deleteQuizFunction(quiz_id);
            setTimeout(function () {
                window.location.reload();
            }, 1000);
            swal(" Your quiz file has been deleted !", {
                icon: "success",
            });
        } else {
            swal("Your quiz is safe !");
        }
    });
};

// Delete quiz
const deleteQuizFunction = (quiz_id) => {
    var data = {
        quiz_id: quiz_id,
    };
    var url = window.location.origin + `/quizes/${quiz_id}`;
    console.log(url);
    debugger;

    $.ajax({
        url: url,
        type: "DELETE",
        data: data,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (response) {
            // console.log(response);
            if (response.status == true) {
                $(".delete-button[data-quiz-id='" + quiz_id + "']").attr(
                    "disabled",
                    true
                );
                // quizUpdateAlert();
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
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
const quizStatusString = localStorage.getItem("quizstatus");
if (quizStatusString) {
  const quizStatusObject = JSON.parse(quizStatusString);
  const isPassValue = quizStatusObject.isPass;
  

  if (isPassValue===false) {
    console.log("False value:"+isPassValue);
    // Show success alert
    swal({
      title: "Better Luck!",
      text: "You are Failed!",
      icon: "warning",
      button: "Ok",
    }).then(() => {
      // Delete the 'quizstatus' key from localStorage after showing the alert
      localStorage.removeItem("quizstatus");
    });
  }
} 
