$(document).ready(function () {
    // Function to show modal and fetch user details
    function showModal(userId) {
        // AJAX request to get user details, including roles and permissions
        $.ajax({
            url: "/admin/role_permission/get_user_details",
            type: "GET",
            data: { user_id: userId },
            success: function (response) {
                // Populate modal content with user details
                $("#currentRole").val(response.currentRole);

                // Populate permissions list with checkboxes
                var permissionsList = $("#permissionsList");
                permissionsList.empty();
                console.log(response);
                $.each(response.permissions, function (index, permission) {
                    var checkbox = $(
                        '<div class="form-check">' +
                            '<input class="form-check-input" type="checkbox" value="' +
                            permission.id +
                            '" name="permissions[]" ' +
                            (permission.assigned ? "checked" : "") +
                            ">" +
                            '<label class="form-check-label">' +
                            permission.name +
                            "</label>" +
                            "</div>"
                    );

                    permissionsList.append(checkbox);
                });

                // Show the modal
                // $("#editUserModal").show();
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

    // Event listener for Edit button click
    $(".editButton").on("click", function () {
        var userId = $(this).data("user-id");
        showModal(userId);
    });

    // Event listener for Close button click
    $("#closeModal").on("click", function () {
        hideModal();
    });

    // Event listener for Submit button click
    $("#submitForm").on("click", function () {
        console.log("first");
        var userId = $("#user_id").val();
        var formData = $("#editUserForm").serialize();

        // AJAX request to update user roles and permissions
        $.ajax({
            url: "/admin/role_permission/update_user_roles_permissions",
            type: "POST",
            data: formData,
            success: function (response) {
                alert(response.message);
                hideModal();
            },
            error: function (error) {
                console.error(error);
            },
        });
    });
});
// $(document).ready(function () {
//     // Function to show modal and fetch user details
//     function showModal(userId, defaultRoleId) {
//         // AJAX request to get user details, including roles and permissions
//         $.ajax({
//             url: "/admin/role_permission/get_role_permissions",
//             type: "GET",
//             data: { user_id: userId },
//             success: function (response) {
//                 // Populate roles dropdown
//                 var rolesDropdown = $("#rolesDropdown");
//                 rolesDropdown.empty();
//                 $.each(response.roles, function (index, role) {
//                     var option = $(
//                         '<option value="' +
//                             role.id +
//                             '">' +
//                             role.name +
//                             "</option>"
//                     );
//                     rolesDropdown.append(option);
//                 });

//                 // Set the selected role in the dropdown
//                 rolesDropdown.val(defaultRoleId);

//                 // Trigger change event to fetch permissions for the default role
//                 rolesDropdown.trigger("change");
//             },
//             error: function (error) {
//                 console.error(error);
//             },
//         });
//     }

//     // Function to fetch permissions based on selected role
//     function fetchRolePermissions(roleId) {
//         $.ajax({
//             url: "/admin/role_permission/get_role_permissions",
//             type: "GET",
//             data: { role_id: roleId },
//             success: function (response) {
//                 // Populate permissions list with checkboxes
//                 var permissionsList = $("#permissionsList");
//                 permissionsList.empty();

//                 $.each(response.permissions, function (index, permission) {
//                     var checkbox = $(
//                         '<div class="form-check">' +
//                             '<input class="form-check-input" type="checkbox" value="' +
//                             permission.id +
//                             '" name="permissions[]" ' +
//                             (permission.assigned ? "checked" : "") +
//                             ">" +
//                             '<label class="form-check-label">' +
//                             permission.name +
//                             "</label>" +
//                             "</div>"
//                     );

//                     permissionsList.append(checkbox);
//                 });
//             },
//             error: function (error) {
//                 console.error(error);
//             },
//         });
//     }

//     // Event listener for roles dropdown change
//     $("#rolesDropdown").on("change", function () {
//         var roleId = $(this).val();
//         fetchRolePermissions(roleId);
//     });

//     // Event listener for Edit button click
//     $(".editButton").on("click", function () {
//         var userId = $(this).data("user-id");
//         var defaultRoleId = $(this).data("default-role-id"); // Add this data attribute to your Edit button
//         showModal(userId, defaultRoleId);
//     });

//     // Event listener for Close button click
//     $("#closeModal").on("click", function () {
//         hideModal();
//     });

//     // Event listener for Submit button click
//     $("#submitForm").on("click", function () {
//         var userId = $("#user_id").val();
//         var formData = $("#editUserForm").serialize();

//         // AJAX request to update user roles and permissions
//         $.ajax({
//             url: "/admin/role_permission/update_user_roles_permissions",
//             type: "POST",
//             data: formData,
//             success: function (response) {
//                 alert(response.message);
//                 hideModal();
//             },
//             error: function (error) {
//                 console.error(error);
//             },
//         });
//     });
// });
