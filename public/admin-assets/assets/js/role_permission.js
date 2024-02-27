$(document).ready(function () {
    let roleCreatedAlert = () => {
        swal("Good job!", "Role created successfully !", "success");
    };

    let roleUpdateAlert = () => {
        swal("Good job!", "Role Updated successfully !", "success");
    };

    let userUpdateAlert = () => {
        swal("Good job!", "Role Updated successfully !", "success");
    };

    // Create role
    $("#create_role").submit(function (e) {
        var role_title = $("#role_title").val();

        var permissionsArray = $("input[name='permissions[]']:checked")
            .map(function () {
                return this.value;
            })
            .get();
        $(".error-message").remove();
        $("#role_title_error").html("");
        $("#permissions_error").html("");

        e.preventDefault();

        if (
            role_title == "" ||
            role_title == null ||
            role_title == "undefined" ||
            role_title == undefined
        ) {
            $("#role_title_error").html(
                '<div class=" invalid-feedback d-block">Role Title is required.</div>'
            );
            $("#role_title").focus();
            return false;
        }

        var permissions = $("input[name='permissions[]']:checked").length;
        if (permissions === 0) {
            $("#permissions_error").html(
                '<div class=" invalid-feedback d-block">Permissions are required.</div>'
            );
            $("#permissions").focus();
            return false;
        }

        var data = {
            role_title: role_title,
            permissions: permissionsArray,
        };
        var url = window.location.origin + `/roles/`;

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.status == true) {
                    $("#role_create_button").attr("disabled", true);
                    roleCreatedAlert();
                    setTimeout(function () {
                        window.location.href =
                            window.location.origin + "/roles/";
                    }, 2000);

                    return false;
                }
            },
            error: function (response) {
                // console.log(response);
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

    // Update role
    $("#update_role").submit(function (e) {
        var role_id = $("#role_id").val();
        var role_title = $("#role_title").val();

        var permissionsArray = $("input[name='permissions[]']:checked")
            .map(function () {
                return this.value;
            })
            .get();
        $(".error-message").remove();
        $("#role_title_error").html("");
        $("#permissions_error").html("");

        e.preventDefault();

        if (
            role_title == "" ||
            role_title == null ||
            role_title == "undefined" ||
            role_title == undefined
        ) {
            $("#role_title_error").html(
                '<div class=" invalid-feedback d-block">Role Title is required.</div>'
            );
            $("#role_title").focus();
            return false;
        }

        var permissions = $("input[name='permissions[]']:checked").length;
        if (permissions === 0) {
            $("#permissions_error").html(
                '<div class=" invalid-feedback d-block">Permissions are required.</div>'
            );
            $("#permissions").focus();
            return false;
        }

        var data = {
            role_title: role_title,
            permissions: permissionsArray,
        };

        var url = window.location.origin + `/roles/${role_id}`;

        $.ajax({
            url: url,
            type: "PATCH",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.status == true) {
                    $("#role_update_button").attr("disabled", true);

                    roleUpdateAlert();

                    setTimeout(function () {
                        window.location.href =
                            window.location.origin + "/roles/";
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

                        $("#permissions_error").empty();

                        if ("permissions" in errors) {
                            var permissionMessages = errors.permissions;

                            // Display error messages for 'permissions' field
                            $("#permissions_error").append(
                                '<div class="error-message invalid-feedback d-block">' +
                                    permissionMessages.join(", ") +
                                    "</div>"
                            );
                        }
                    });
                }
            },
        });
    });

    // Delete role
    // $(".delete-role-button").on("click", function (e) {
    $(document).on("click", ".delete-role-button", function (e) {
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this role!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                e.preventDefault();
                let role_id = $(this)
                    .closest(".delete-role-form")
                    .data("role-id");

                var data = {
                    role_id: role_id,
                };

                var url = window.location.origin + `/roles/${role_id}`;

                $.ajax({
                    url: url,
                    type: "DELETE",
                    data: data,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        if (response.status == true) {
                            $(
                                ".delete-role-button[data-role-id='" +
                                    role_id +
                                    "']"
                            ).attr("disabled", true);

                            setTimeout(function () {
                                window.location.reload();
                            }, 1000);

                            swal(" Your role has been deleted !", {
                                icon: "success",
                            });
                            return false;
                        }
                    },
                    error: function (response) {
                        swal("Something went wrong!", {
                            icon: "error",
                        });
                    },
                });
            } else {
                swal("Your role is safe !");
            }
        });
    });

    // Change users role
    $(".editButton").on("click", function () {
        var userId = $(this).data("user-id");
        showModal(userId);
    });

    // Function to show modal and fetch user details
    function showModal(userId) {
        $.ajax({
            url: "get-role/" + userId,
            type: "GET",
            success: function (response) {
                $("#user_id").val(response.user_id);
                $("#currentRole").val(response.current_role);

                // Populate roles dropdown
                var newRoleDropdown = $("#newRole");

                // newRoleDropdown.unbind("change");
                newRoleDropdown.empty();
                $.each(response.all_roles, function (index, role) {
                    var option = $("<option>").val(role).text(role);

                    // Set the selected attribute for the current role
                    if (role === response.current_role) {
                        option.prop("selected", true);
                    }
                    newRoleDropdown.append(option);
                });

                $("#editUserModal").modal("show");
            },
            error: function (error) {
                console.error(error);
            },
        });
    }

    // Function to hide modal
    function hideModal() {
        $("#editUserModal").hide();
    }

    // Event listener for Close button click
    $("#closeModal").on("click", function () {
        hideModal();
    });

    // Event listener for Submit button click
    $("#editUserRoleForm").submit(function (e) {
        e.preventDefault();

        var userId = $("#user_id").val();
        var formData = $("#editUserRoleForm").serialize();

        $.ajax({
            url: "assign-role/" + userId,
            type: "POST",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                hideModal();
                userUpdateAlert();
                var currentURL = window.location.href;
                setTimeout(function () {
                    window.location.href = currentURL;
                }, 2000);
            },
            error: function (error) {
                console.error(error);
            },
        });
    });
});
