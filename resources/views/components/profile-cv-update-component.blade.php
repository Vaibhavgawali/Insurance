<div class="profie-cv-update-section" id="profie-cv-update-section">
    <div class="card">
        <div class="d-flex justify-content-center align-items-center gap-5 gap-sm-2 p-3">
            <div><a class="btn btn-md btn-warning btn-rounded" href="{{asset('storage/documents/'.$data->documents->document_url)}}" target="_blank">View CV</a></div>
            <div><button class="btn btn-md btn-success btn-rounded" id="profile-cv-update-button">Update CV</button></div>
        </div>
    </div>
</div>
<div class="profie-cv-upload-section" id="profie-cv-upload-section" style="display: none;">
    <div class="card">
    <div class="profile-personal-cv-div p-3">
      <div class="text-end">
        <button class="btn btn-gradient-primary btn-sm " id="profile_cv_edit_button"><i class="mdi mdi-cloud-upload"> Upload CV</i></button>
      </div>

      <form class="forms-sample" id="profile_update_cv_form" action="user-documents" method="POST" enctype="multipart/form-data">
        <div id="profile_cv_status"></div>
        @csrf
        <div class="form-group">
          <label for="name">Documents Title</label>
          <input type="text" class="form-control" id="document_title" name="document_title" placeholder="Provide documents title" disabled value="">
          <div id="document_title_error"></div>
        </div>

        <div class="form-group">
          <label for="name">Upload your Documents</label>
          <input type="file" class="form-control" id="document_url" name="document_url" placeholder="Upload your cv"  value="">
          <div id="document_url_error"></div>
        </div>

        <div class="form-group">
          <label for="user_id"></label>
          <input type="hidden" class="form-control" id="user_id" placeholder="user_id" value="{{$data->user_id}}">
        </div>
        <div id="profile_cv_update_button_div">
          <button type="button" class="btn btn-gradient-primary me-2" id="profile_cv_update-1_button">Upload</button>
          <a href="{{$data->user_id}}" class="btn btn-light" id="profile_cv_cancel-1_button">Cancel</a>
        </div>
      </form>
    

      <script>

        let Profile_Cv_Toggle = () => {
          let editProfileButton = document.getElementById("profile_cv_edit_button");
          let profileUpdateButtonDiv = document.getElementById("profile_cv_update_button_div");
          let profileCancelButton = document.getElementById("profile_cv_cancel_button");
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

    <script>
        console.log("Script is running.");
        let cvUpdateToggle = () => {
            let updateButton = document.getElementById("profile-cv-update-button");
            let updateDiv = document.getElementById("profie-cv-update-section");
            let uploadDiv = document.getElementById("profie-cv-upload-section");

            updateButton.addEventListener("click", () => {
                updateDiv.style.display = "none";
                uploadDiv.style.display = "block";
                console.log("clicked");
            });
        }
        cvUpdateToggle();
    </script>
</div>
