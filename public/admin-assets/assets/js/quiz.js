$(document).ready(function () {
    $("#quizForm").submit(function (e) {
        e.preventDefault();
        // alert("quiz :" + localStorage.getItem("quizTime"));
        var quiz_id = $("#quiz_id").val().trim();

        // Serialize form data
        var formData = $(this).serialize();
        console.log(formData);
        $.ajax({
            url: "/submit-quiz/" + quiz_id,
            type: "POST",
            data: formData,
            success: function (response) {
                console.log(response);
                // alert(localStorage.getItem("quizTime"));
                // Remove local storage items
                try {
                    localStorage.clear();
                    // localStorage.removeItem("quizTime");
                    // localStorage.removeItem("timerSeconds");
                    // localStorage.removeItem("quizAnswers");
                } catch (error) {
                    console.error(
                        "Error removing items from local storage:",
                        error
                    );
                }

                if (response.pdf_path) {
                    // Construct the download link
                    var downloadLink = $("<a>", {
                        href: response.pdf_path,
                        download: "itsolutionstuff.pdf",
                        target: "_blank",
                    });

                    // Append the link to the body and trigger a click event to initiate the download
                    $("body").append(downloadLink);
                    downloadLink[0].click();
                    downloadLink.remove();
                    alert("Congratulations! You have passed.");
                } else {
                    alert("Sorry, you did not pass.");
                }

                alert("Quiz submitted successfully!");

                window.location.href = "/candidate-quizes";
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert("Error submitting quiz. Please try again.");
            },
        });
    });
});
