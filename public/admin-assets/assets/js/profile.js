const dropArea = document.getElementById("drop-area");
const inputFile = document.getElementById("input-file");
const imageView = document.getElementById("image-view");
const imageUploadButton = document.getElementById("image-upload-button");

inputFile.addEventListener("change", uploadImage);

function uploadImage() {
    // Get the file from the input
    const file = inputFile.files[0];

    if (file) {
        // Create an object URL for the file
        let imgLink = URL.createObjectURL(file);

        // Set background image using background-image property
        //   imageView.style.backgroundImage = `url(${imgLink})`;
        //   imageView.style.backgroundRepeat = 'no-repeat';

        // Clear text content (not necessary when using background image)
        imageView.textContent = "";

        // Create an img element for src attribute
        const imgElement = document.createElement("img");
        imgElement.src = imgLink;
        imageView.style.border = 0;
        imgElement.alt = "Uploaded Image";
        imageUploadButton.style.display = "block";
        //   imageUploadButton.style.textAlign="center";

        // Append the img element to the image view
        imageView.appendChild(imgElement);
    }
}
dropArea.addEventListener("dragover", function (e) {
    e.preventDefault();
});

dropArea.addEventListener("drop", function (e) {
    e.preventDefault();
    inputFile.files = e.dataTransfer.files;
    uploadImage();
});




$(document).ready(function () {  // Profile info Update function
    $("#profile_info_update_button").click(function (event) {
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var user_id = $("#user_id").val();

        $("#name_error").html("");
        $("#phone_error").html("");
        $("#email_error").html("");

        $("#profile_status").html("");

        if (
            name == "" ||
            name == null ||
            name == "undefined" ||
            name == undefined
        ) {
            $("#name_error").html(
                '<div class=" invalid-feedback d-block">Full Name is required.</div>'
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
            $("#phone_error").html(
                '<div class=" invalid-feedback d-block">Mobile number is required.</div>'
            );
            $("#phone").focus();
            return false;
        }

        function validatePhoneNumber(phone) {
            var phonePattern = /^[0-9]{10}$/;
            return phonePattern.test(phone);
        }

        if (!validatePhoneNumber(phone)) {
            $("#phone_error").html(
                '<div class=" invalid-feedback d-block">Mobile number is invalid.</div>'
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

        var data = {
            name:name,
            phone:phone,
            email:email,
            user_id:user_id,
        };
        function extractAndConvertToInteger(str) {
            const trimmedStr = str.trim(); // Trim leading and trailing spaces
            const numericPart = trimmedStr.replace(/\D/g, ''); // Remove non-numeric characters
            return parseInt(numericPart, 10); // Convert to integer
        }
        
        // Update the user_id value in the data object
        data.user_id = extractAndConvertToInteger(data.user_id);
        console.log(data);

        event.preventDefault();

        var url = window.location.origin + `/candidate/${user_id.trim()}`;
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
                    $(".error-message").remove();
                    $("#profile_info_update_button").attr("disabled", true);
                    $("#profile_info_status").html(
                        "<div class='alert alert-success text-center p-2 my-3 mx-1'><i class='fa fa-check'></i> " +
                        response.message +
                        "</div>"
                    );
            
                    // Optional: You can add a delay before reloading the page
                    setTimeout(function () {
                        window.location.reload();
                    },1000); // 2000 milliseconds (2 seconds) delay, adjust as needed
            
                    return false;
                }
            }
            ,

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
    });
});



$(document).ready(function () {   ///    Profile Details Update Function
    $("#profile_details_update_button").click(function (event) {
        var date_of_birth = $("#date_of_birth").val();
        var gender = $("#gender").val();
        var age = $("#age").val();
        var preffered_line =$("#preffred_line").val();
        var spoc =$("#spoc").val();
        var user_id = $("#user_id").val();

        $("#date_of_birth_error").html("");
        $("#gender_error").html("");
        $("#age_error").html("");
        $("#preffred_line_error").html("");
        $("#aspoc_error").html("");


        $("#profile_status").html("");

        if (
            date_of_birth == "" ||
            date_of_birth == null ||
            date_of_birth == "undefined" ||
            date_of_birth == undefined
        ) {
            $("#date_of_birth_error").html(
                '<div class=" invalid-feedback d-block">Date Of Birth is required.</div>'
            );
            $("#date_of_birth").focus();
            return false;
        }

        if (
            gender == "" ||
            gender == null ||
            gender == "undefined" ||
            gender == undefined
        ) {
            $("#gender_error").html(
                '<div class=" invalid-feedback d-block">Gender is required.</div>'
            );
            $("#gender").focus();
            return false;
        }

        if (
            age == "" ||
            age == null ||
            age == "undefined" ||
            age == undefined
        ) {
            $("#age_error").html(
                '<div class=" invalid-feedback d-block">Age is required.</div>'
            );
            $("#age").focus();
            return false;
        }

        if (
            preffered_line == "" ||
            preffered_line == null ||
            preffered_line == "undefined" ||
            preffered_line == undefined
        ) {
            $("#preffred_line_error").html(
                '<div class=" invalid-feedback d-block">Prefferd Line is required.</div>'
            );
            $("#preffred_line").focus();
            return false;
        }
        if (
            spoc == "" ||
            spoc == null ||
            spoc == "undefined" ||
            spoc == undefined
        ) {
            $("#spoc_error").html(
                '<div class=" invalid-feedback d-block">SPOC is required.</div>'
            );
            $("#spoc").focus();
            return false;
        }

       

        var data = {
            date_of_birth :date_of_birth,
            gender:gender,
            age:age,
            preffered_line:preffered_line,
            spoc:spoc,
            user_id:user_id,
        };
        function extractAndConvertToInteger(str) {
            const trimmedStr = str.trim(); // Trim leading and trailing spaces
            const numericPart = trimmedStr.replace(/\D/g, ''); // Remove non-numeric characters
            return parseInt(numericPart, 10); // Convert to integer
        }
        
        // Update the user_id value in the data object
        data.user_id = extractAndConvertToInteger(data.user_id);
        console.log(data);

        event.preventDefault();

        var url = window.location.origin + `/user-profile/${user_id.trim()}`;
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
                    $(".error-message").remove();
                    $("#profile_details_update_button").attr("disabled", true);
                    $("#profile_details_status").html(
                        "<div class='alert alert-success text-center p-2 my-3 mx-1'><i class='fa fa-check'></i> " +
                        response.message +
                        "</div>"
                    );
            
                    // Optional: You can add a delay before reloading the page
                    setTimeout(function () {
                        window.location.reload();
                    },1000); // 2000 milliseconds (2 seconds) delay, adjust as needed
            
                    return false;
                }
            }
            ,

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
    });
});







let Profile_Info_Toggle = () => {
    let editProfileButton = document.getElementById("profile_info_edit_button");
    let profileUpdateButtonDiv = document.getElementById(
        "profile_info_update_button_div"
    );
    let profileCancelButton = document.getElementById(
        "profile_info_cancel_button"
    );
    let profileUpdateButton =document.getElementById("profile_info_update_button");

    let nameInput = document.getElementById("name");
    let emailInput = document.getElementById("email");
    let phoneInput = document.getElementById("phone");

    let toggle = false;
    profileUpdateButtonDiv.style.display = "none";
    editProfileButton.addEventListener("click", () => {
        toggle = !toggle;
        if (toggle) {
            profileUpdateButtonDiv.style.display = "block";
            nameInput.removeAttribute("disabled");
            emailInput.removeAttribute("disabled");
            phoneInput.removeAttribute("disabled");
        } else {
            profileUpdateButtonDiv.style.display = "none";
            nameInput.setAttribute("disabled", true);
            emailInput.setAttribute("disabled", true);
            phoneInput.setAttribute("disabled", true);
        }
    });
    profileCancelButton.addEventListener("click", () => {
        toggle = false;

        profileUpdateButtonDiv.style.display = "none";
        nameInput.setAttribute("disabled", true);
        emailInput.setAttribute("disabled", true);
        phoneInput.setAttribute("disabled", true);
    });
};

Profile_Info_Toggle();

let Profile_Details_toggle = () => {
    let editProfileButton = document.getElementById(
        "profile_details_edit_button"
    );
    let profileUpdateButtonDiv = document.getElementById(
        "profile_details_update_button_div"
    );
    let profileCancelButton = document.getElementById(
        "profile_details_cancel_button"
    );

    let dateBirthInput = document.getElementById("date_of_birth");
    let genderInput = document.getElementById("gender");
    let ageInput = document.getElementById("age");
    let prefferedLineInput = document.getElementById("preffred_line");
    let spocInput = document.getElementById("spoc");

    let toggle = false;

    profileUpdateButtonDiv.style.display = "none";
    editProfileButton.addEventListener("click", () => {
        toggle = !toggle;
        if (toggle) {
            profileUpdateButtonDiv.style.display = "block";
            dateBirthInput.removeAttribute("disabled");
            genderInput.removeAttribute("disabled");
            ageInput.removeAttribute("disabled");
            prefferedLineInput.removeAttribute("disabled");
            spocInput.removeAttribute("disabled");
        } else {
            profileUpdateButtonDiv.style.display = "none";
            dateBirthInput.setAttribute("disabled", true);
            genderInput.setAttribute("disabled", true);
            ageInput.setAttribute("disabled", true);
            prefferedLineInput.setAttribute("disabled", true);
            spocInput.setAttribute("disabled", true);
        }
    });
    profileCancelButton.addEventListener("click", () => {
        toggle = false;

        profileUpdateButtonDiv.style.display = "none";
        dateBirthInput.setAttribute("disabled", true);
        genderInput.setAttribute("disabled", true);
        ageInput.setAttribute("disabled", true);
        prefferedLineInput.setAttribute("disabled", true);
        spocInput.setAttribute("disabled", true);
    });
};

Profile_Details_toggle();

let Profile_Address_toggle = () => {
    let editProfileButton = document.getElementById(
        "profile_address_edit_button"
    );
    let profileUpdateButtonDiv = document.getElementById(
        "profile_address_update_button_div"
    );
    let profileCancelButton = document.getElementById(
        "profile_address_cancel_button"
    );

    let cityInput = document.getElementById("city");
    let pincodeyInput = document.getElementById("pincode");
    let stateInput = document.getElementById("state");
    let countryInput = document.getElementById("country");
    let line1Input = document.getElementById("line1");
    let line2Input = document.getElementById("line2");
    let line3Input = document.getElementById("line3");

    let toggle = false;

    profileUpdateButtonDiv.style.display = "none";
    editProfileButton.addEventListener("click", () => {
        toggle = !toggle;
        if (toggle) {
            profileUpdateButtonDiv.style.display = "block";
            cityInput.removeAttribute("disabled");
            pincodeyInput.removeAttribute("disabled");
            stateInput.removeAttribute("disabled");
            countryInput.removeAttribute("disabled");
            line1Input.removeAttribute("disabled");
            line2Input.removeAttribute("disabled");
            line3Input.removeAttribute("disabled");
        } else {
            profileUpdateButtonDiv.style.display = "none";
            cityInput.setAttribute("disabled", true);
            pincodeyInput.setAttribute("disabled", true);
            stateInput.setAttribute("disabled", true);
            countryInput.setAttribute("disabled", true);
            line1Input.setAttribute("disabled", true);
            line2Input.setAttribute("disabled", true);
            line3Input.setAttribute("disabled", true);
        }
    });
    profileCancelButton.addEventListener("click", () => {
        toggle = false;

        profileUpdateButtonDiv.style.display = "none";
        cityInput.setAttribute("disabled", true);
        pincodeyInput.setAttribute("disabled", true);
        stateInput.setAttribute("disabled", true);
        countryInput.setAttribute("disabled", true);
        line1Input.setAttribute("disabled", true);
        line2Input.setAttribute("disabled", true);
        line3Input.setAttribute("disabled", true);
    });
};


Profile_Address_toggle();

let Profile_Experience_toggle = () => {
    let editProfileButton = document.getElementById(
        "profile_experience_edit_button"
    );
    let profileUpdateButtonDiv = document.getElementById(
        "profile_experience_update_button_div"
    );
    let profileCancelButton = document.getElementById(
        "profile_experience_cancel_button"
    );

    let currentCompanyInput = document.getElementById("is_current_company");
    let organizationInput = document.getElementById("oraganization");
    let designationInput = document.getElementById("designation");
    let ctcInput = document.getElementById("ctc");
    let profileDescriptionInput = document.getElementById(
        "job_profile_description"
    );
    let jobStateInput = document.getElementById("job_state");
    let joiningDateInput = document.getElementById("joining_date");
    let relievingDateInput = document.getElementById("relieving_date");

    let toggle = false;

    profileUpdateButtonDiv.style.display = "none";
    editProfileButton.addEventListener("click", () => {
        console.log(toggle);
        toggle = !toggle;
        if (toggle) {
            profileUpdateButtonDiv.style.display = "block";
            currentCompanyInput.removeAttribute("disabled");
            organizationInput.removeAttribute("disabled");
            designationInput.removeAttribute("disabled");
            ctcInput.removeAttribute("disabled");
            profileDescriptionInput.removeAttribute("disabled");
            jobStateInput.removeAttribute("disabled");
            joiningDateInput.removeAttribute("disabled");
            relievingDateInput.removeAttribute("disabled");
        } else {
            profileUpdateButtonDiv.style.display = "none";
            currentCompanyInput.setAttribute("disabled", true);
            organizationInput.setAttribute("disabled", true);
            designationInput.setAttribute("disabled", true);
            ctcInput.setAttribute("disabled", true);
            profileDescriptionInput.setAttribute("disabled", true);
            jobStateInput.setAttribute("disabled", true);
            joiningDateInput.setAttribute("disabled", true);
            relievingDateInput.setAttribute("disabled", true);
        }
    });
    profileCancelButton.addEventListener("click", () => {
        toggle = false;

        profileUpdateButtonDiv.style.display = "none";
        currentCompanyInput.setAttribute("disabled", true);
        organizationInput.setAttribute("disabled", true);
        designationInput.setAttribute("disabled", true);
        ctcInput.setAttribute("disabled", true);
        profileDescriptionInput.setAttribute("disabled", true);
        jobStateInput.setAttribute("disabled", true);
        joiningDateInput.setAttribute("disabled", true);
        relievingDateInput.setAttribute("disabled", true);
    });
};

Profile_Experience_toggle();
