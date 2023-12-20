$(document).ready(function () {
    $("#login_btn").click(function (event) {
        var email = $("#email").val();
        var password = $("#password").val();

        $("#email_error").html("");
        $("#password_error").html("");

        $("#register_status").html("");

        if (
            email == "" ||
            email == null ||
            email == "undefined" ||
            email == undefined
        ) {
            $("#email_error").html(
                '<div class=" invalid-feedback d-block">Email Id is required.</div>'
            );
            $("#email").focus();
            return false;
        }

        function validateEmail($email) {
            var emailReg =
                /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            return emailReg.test($email);
        }

        if (!validateEmail(email)) {
            $("#email_error").html(
                '<div class=" invalid-feedback d-block">Email Id is invalid.</div>'
            );
            $("#email").focus();
            return false;
        }

        if (
            password == "" ||
            password == null ||
            password == "undefined" ||
            password == undefined
        ) {
            $("#password_error").html(
                '<div class=" invalid-feedback d-block">Password is required.</div>'
            );
            $("#password").focus();
            return false;
        }

        var data = {
            email: email,
            password: password,
        };

        event.preventDefault();

        var url = window.location.origin + "/login";
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                // console.log(response);
                if (response.status == true) {
                    $(".error-message").remove();

                    $("#login_btn").attr("disabled", true);
                    $("#register_status").html(
                        "<div class='alert alert-success text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-check'></i> " +
                            response.message +
                            "</div>"
                    );
                    $("#login_form")[0].reset();
                    return false;
                }
            },

            error: function (response) {
                if (response.status === 422) {
                    var errors = response.responseJSON.errors;
                    $(".error-message").remove();

                    // Display new errors
                    $.each(errors, function (field, messages) {
                        var input = $('[name="' + field + '"]');
                        input.after(
                            '<div class="error-message invalid-feedback d-block">' +
                                messages.join(", ") +
                                "</div>"
                        );
                    });
                }
                if (response.status === 401) {
                    $("#register_status").html(
                        "<div class='alert alert-danger text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times'></i> " +
                            response.responseJSON.message +
                            "</div>"
                    );
                }
            },
        });
    });
});
