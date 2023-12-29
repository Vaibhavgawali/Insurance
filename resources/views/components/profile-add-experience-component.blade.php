<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-3">
  <div class="profile-birth-section card">

    @if(auth()->user()->user_id == $data->user_id)
    <div class="d-flex justify-content-between p-3">
      <h4>Experience</h4>
      <button class="btn btn-gradient-primary btn-sm " id="profile_experience_edit_button"><i class="mdi mdi-library-plus"></i></button>
    </div>
    @endif

    <div class="profile-birth-div p-3">

      <form class="forms-sample" id="profile_experience_update_form">
        <div id="profile_experience_status"></div>
        @csrf
        <div class="form-group">
          <label for="is_current_company">Current Company</label>
          <input type="text" class="form-control" name="is_current_company" id="is_current_company" placeholder="Current Company" disabled value=''>
          <div id="is_current_company_error"></div>
        </div>

        <div class="form-group">
          <label for="organization">Organization</label>
          <input type="text" class="form-control" name="organization" id="organization" placeholder="Organization" disabled value=''>
          <div id="organization_error"></div>
        </div>

        <div class="form-group">
          <label for="age">Designation</label>
          <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" disabled value=''>
          <div id="designation_error"></div>
        </div>

        <div class="form-group">
          <label for="ctc">CTC</label>
          <input type="text" class="form-control" id="ctc" name="ctc" placeholder="CTC" disabled value=''>
          <div id="ctc_error"></div>
        </div>

        <div class="form-group">
          <label for="job_profile_description">Job Profile Description</label>
          <textarea class="form-control" id="job_profile_description" name="job_profile_description" placeholder="Add a job description" rows="4" disabled></textarea>
          <div id="job_profile_description_error"></div>
        </div>

        <div class="form-group">
          <label for="state">State</label>
          <input type="text" class="form-control" id="job_state" name="job_state" placeholder="State" disabled value=''>
          <div id="job_state_error"></div>
        </div>

        <div class="form-group">
          <label for="joining_date">Joining Date</label>
          <input type="date" class="form-control" name="joining_date" id="joining_date" disabled value=''>
          <div id="joining_date_error"></div>
        </div>

        <div class="form-group">
          <label for="relieving_date">Reliving Date</label>
          <input type="date" class="form-control" name="relieving_date" id="relieving_date" disabled value=''>
          <div id="relieving_date_error"></div>
        </div>

        <div class="form-group">
          <label for="user_id"></label>
          <input type="text" class="form-control" id="user_id" placeholder="user_id" value=" {{$data->user_id}}" hidden>
        </div>
        @if(auth()->user()->user_id == $data->user_id)
        <div id="profile_experience_update_button_div">
          <button type="submit" class="btn btn-gradient-primary me-2" id="profile_experience_add_button">Submit</button>
          <button class="btn btn-light" id="profile_experience_cancel_button">Cancel</button>
        </div>
        @endif
      </form>
      <script>
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
          let organizationInput = document.getElementById("organization");
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
      </script>
    </div>
  </div>
</div>