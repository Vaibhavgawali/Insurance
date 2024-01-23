let SubmittedAlert = () => {
    swal("Good job!", "Contact Submitted sucessfully!", "success");
};

$(document).ready(function () {
    // contact form
    $("#contact_sub_btn").on("click", function (e) {
        e.preventDefault();

        $("#bsalert").removeClass("alert alert-danger");

        $("#name_error").html("");
        $("#phone_error").html("");
        $("#email_error").html("");
        $("#subject_error").html("");
        $("#message_error").html("");

        var name = $("#name").val();

        if (!name || name.trim() === "") {
            showError("name", "Please enter name");
            return false;
        } else if (!/^[a-zA-Z ]{2,30}$/.test(name)) {
            showError("name", "Please enter valid name");
            return false;
        }

        var email = $("#email").val();

        if (!email || email.trim() === "") {
            showError("email", "Please enter email");
            return false;
        } else {
            var emailRegex = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;

            if (!emailRegex.test(email)) {
                showError("email", "Please enter a valid email");
                return false;
            }
        }

        var phone = $("#phone").val();

        if (!phone || phone.trim() === "") {
            showError("phone", "Mobile number is required.");
            $("#phone").focus();
            return false;
        } else {
            var phoneRegex = /^[6-9]\d{9}$/;

            if (!phoneRegex.test(phone)) {
                showError(
                    "phone",
                    "Please enter a 10-digit valid phone number"
                );
                return false;
            }
        }

        var subject = $("#subject").val();

        if (subject && subject.length >= 100) {
            showError("subject", "Please subject must be less than 100 words ");
            return false;
        }

        var message = $("#message").val();

        if (message && message.length >= 250) {
            showError("message", "Please message must be less than 250 words ");
            return false;
        }

        function showError(field, message) {
            $(`#${field}_error`).html(
                `<div class=" invalid-feedback d-block">${message}</div>`
            );
            $(`#${field}`).focus();
        }

        var url = window.location.origin + "/submit-contact";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#contact_form").serialize(),
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },

            success: function (response) {
                if (response.status == true) {
                    $(".error-message").remove();

                    $("#contact_sub_btn").attr("disabled", true);
                    SubmittedAlert();
                    $("#contact_form")[0].reset();
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
            },
        });
        return false;
    });
});
