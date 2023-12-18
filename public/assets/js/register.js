$(document).ready(function () {
    $("#register-button").click(function (event) {
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var password = $("#password").val();
        var experience = $("#experience").val();
        var preferred_line = $("#preferred_line").val();
        var city = $("#city").val();

        $("#register_status").html("");

        if (
            name == "" ||
            name == null ||
            name == "undefined" ||
            name == undefined
        ) {
            $("#register_status").html(
                "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>EMPTY!</b> Full Name is required.</div>"
            );
            $("#name").focus();
            return false;
        }

        if (
            phone == "" ||
            phone == null ||
            phone == "undefined" ||
            phone == undefined
        ) {
            $("#register_status").html(
                "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>EMPTY!</b> Mobile number is required.</div>"
            );
            $("#phone").focus();
            return false;
        }

        function validatePhoneNumber(phone) {
            var phonePattern = /^[0-9]{10}$/;
            return phonePattern.test(phone);
        }

        if (!validatePhoneNumber(phone)) {
            $("#register_status").html(
                "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>Invalid!</b> Phone is invalid.</div>"
            );
            $("#phone").focus();
            return false;
        }

        if (
            email == "" ||
            email == null ||
            email == "undefined" ||
            email == undefined
        ) {
            $("#register_status").html(
                "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>EMPTY!</b> Email is required.</div>"
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
            $("#register_status").html(
                "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>Invalid!</b> Email is invalid.</div>"
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
            $("#register_status").html(
                "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>EMPTY!</b> Password is required.</div>"
            );
            $("#password").focus();
            return false;
        }

        function validatePassword(password) {
            // Minimum 8 characters, at least one uppercase letter,
            // one lowercase letter, one number, and one special character
            var passwordRegex =
                /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            return passwordRegex.test(password);
        }

        if (!validatePassword(password)) {
            $("#register_status").html(
                "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>Invalid!</b> Password must contain Minimum 8 characters, at least one uppercase letter, one lowercase letter, one number, and one special character is invalid.</div>"
            );
            $("#password").focus();
            return false;
        }

        if (
            city == "" ||
            city == null ||
            city == "undefined" ||
            city == undefined
        ) {
            $("#register_status").html(
                "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>EMPTY!</b> City is required.</div>"
            );
            $("#city").focus();
            return false;
        }

        if (
            experience == "" ||
            experience == null ||
            experience == "undefined" ||
            experience == undefined
        ) {
            $("#register_status").html(
                "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>EMPTY!</b>Please select experience option is required.</div>"
            );
            $("#experience").focus();
            return false;
        }

        if (experience == "experienced") {
            if (
                organization == "" ||
                organization == null ||
                organization == "undefined" ||
                organization == undefined
            ) {
                $("#register_status").html(
                    "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>EMPTY!</b>Current Organization is required.</div>"
                );
                $("#organization").focus();
                return false;
            }

            if (
                designation == "" ||
                designation == null ||
                designation == "undefined" ||
                designation == undefined
            ) {
                $("#register_status").html(
                    "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>EMPTY!</b>Current Role is required.</div>"
                );
                $("#designation").focus();
                return false;
            }
        }

        if (
            preferred_line == "" ||
            preferred_line == null ||
            preferred_line == "undefined" ||
            preferred_line == undefined
        ) {
            $("#register_status").html(
                "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>EMPTY!</b>Please select preferred line is required.</div>"
            );
            $("#preferred_line").focus();
            return false;
        }

        if ($("#flexCheckDefault").prop("checked") == false) {
            $("#register_status").html(
                "<div class='alert alert-secondary text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> <b>EMPTY!</b> Agree terms & condition is required.</div>"
            );
            return false;
        } else {
            terms_and_policy = "1";
        }

        var data = {
            name: name,
            phone: phone,
            email: email,
            password: password,
            city: city,
            experience: experience,
            preferred_line: preferred_line,
        };

        // console.log(data);

        event.preventDefault();
        // var formData = $("#candidate_register_form").serialize();

        var url = window.location.origin + "/candidate";
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
                    $("#register-button").attr("disabled", true);
                    $("#register_status").html(
                        "<div class='alert alert-success text-center' style='padding: 3px; margin-bottom: 3px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-check'></i> " +
                            response.message +
                            "</div>"
                    );
                    $("#candidate_register_form")[0].reset();
                    return false;
                } else {
                    if (response.errors) {
                    }
                    $("#register-button").attr("disabled", false);
                    $("#register_status").html(
                        "<div class='alert alert-secondary text-center' style='padding: 10px; margin-bottom: 10px;margin-left: 5px;margin-right: 5px;'><i class='fa fa-times-circle'></i> " +
                            response.message +
                            "</div>"
                    );
                    return false;
                }
            },
            error: function (error) {
                console.error("Error:", error);
            },
        });
    });
});
