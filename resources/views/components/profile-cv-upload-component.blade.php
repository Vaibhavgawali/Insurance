<div class="profie-cv-upload-section">
      <div class="card">
      <div class="profile-personal-cv-div p-3">
        <div class="text-end">
          <button class="btn btn-gradient-primary btn-sm " id="profile_cv_edit_button"><i class="mdi mdi-cloud-upload"> Upload CV</i></button>
        </div>

        <form class="forms-sample" id="" action="user-documents" method="post" enctype="multipart-form-data">
          <div id="profile_cv_status"></div>
          @csrf
          <div class="form-group">
            <label for="name">Documents Title</label>
            <input type="text" class="form-control" id="document_title" name="document_title" placeholder="Provide documents title" disabled value="">
            <div id="document_title_error"></div>
          </div>

          <div class="form-group">
            <label for="name">Upload your Documents</label>
            <input type="file" class="form-control" id="document_url" name="document_url" placeholder="Upload your cv" disabled value="">
            <div id="document_url_error"></div>
          </div>

          <div class="form-group">
            <label for="user_id"></label>
            <input type="text" class="form-control" id="user_id" placeholder="user_id" value="" hidden>
          </div>

          <div id="profile_cv_update_button_div">
            <button type="submit" class="btn btn-gradient-primary me-2" id="profile_cv_update_button">Upload</button>
            <button class="btn btn-light" id="profile_cv_cancel_button">Cancel</button>
          </div>

        </form>
        <script>
            let Profile_Cv_Toggle = () => {
    let editProfileButton = document.getElementById("profile_cv_edit_button");
    let profileUpdateButtonDiv = document.getElementById(
        "profile_cv_update_button_div"
    );
    let profileCancelButton = document.getElementById(
        "profile_cv_cancel_button"
    );
    

    let documentTitleInput = document.getElementById("document_title");
    let documentUrlInput = document.getElementById("document_url");

    let toggle = false;
    profileUpdateButtonDiv.style.display = "none";
    editProfileButton.addEventListener("click", () => {
        toggle = !toggle;
        if (toggle) {
            profileUpdateButtonDiv.style.display = "block";
            documentTitleInput.removeAttribute("disabled");
            documentUrlInput.removeAttribute("disabled");
           
        } else {
            profileUpdateButtonDiv.style.display = "none";
            documentTitleInput.setAttribute("disabled", true);
            documentUrlInput.setAttribute("disabled", true);
        }
    });
    profileCancelButton.addEventListener("click", () => {
        toggle = false;

        profileUpdateButtonDiv.style.display = "none";
        documentTitleInput.setAttribute("disabled", true);
        documentUrlInput.setAttribute("disabled", true);
    });
};

Profile_Cv_Toggle();

        </script>

      </div>
      </div>
    </div>