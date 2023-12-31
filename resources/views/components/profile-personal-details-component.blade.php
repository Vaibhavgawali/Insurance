<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 my-3">
  <div class="profile-birth-section card">
    <div class="d-flex justify-content-between p-3">
      <h4>User Profile Details</h4>
      @if(auth()->user()->user_id == $data->user_id)
      <button class="btn btn-gradient-primary btn-sm " id="profile_details_edit_button"><i class="mdi mdi-table-edit"></i></button>
      @endif
    </div>
    <div class="profile-birth-div p-3">
      <form class="forms-sample" id="profile_details_update_form">
        <div id="profile_details_status"></div>
        @csrf
        <div class="form-group">
          <label for="date_of_birth">Date of birth</label>
          <input type="date" class="form-control p-4" name="date_of_birth" id="date_of_birth" placeholder="Date Of Birth" disabled value='{{ $data->profile->date_of_birth ?? "N/A" }}'>
          <div id="date_of_birth_error"></div>
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control p-4" id="gender" name="gender" placeholder="Gender" disabled>
            <option value="" selected disabled>--Select--</option>
            <option value="M" {{ isset($data->profile) && $data->profile->gender === 'M' ? 'selected' : '' }}>Male</option>
            <option value="F" {{ isset($data->profile) && $data->profile->gender === 'F' ? 'selected' : '' }}>Female</option>
            <option value="O" {{ isset($data->profile) && $data->profile->gender === 'O' ? 'selected' : '' }}>Other</option>

          </select>

          <div id="gender_error"></div>
        </div>
        <div class="form-group">
          <label for="age">Age</label>
          <input type="number" class="form-control p-4" id="age" name="age" rows="8" placeholder="Age" disabled value='{{ $data->profile->age ?? "N/A" }}'>
          <div id="age_error"></div>
        </div>



        @if($data->hasAnyRole(['Candidate','Insurer','Superadmin']))
        <div class="form-group">
          <label for="preffered_line" class="form-label ">Preffered Line</label>
          <select class="form-control p-5" name="preffered_line" id="preffered_line" aria-label="work status" disabled>
            <option value="" selected disabled>-- Select --</option>
            <option value="life" {{ isset($data->profile) && $data->profile->preffered_line === 'life' ? 'selected' : '' }}>Life</option>
            <option value="general" {{ isset($data->profile) && $data->profile->preffered_line === 'general' ? 'selected' : '' }}>General</option>
            <option value="health" {{ isset($data->profile) && $data->profile->preffered_line === 'health' ? 'selected' : '' }}>Health</option>
            <option value="other" {{ isset($data->profile) && $data->profile->preffered_line === 'other' ? 'selected' : '' }}>Other</option>
          </select>


            <div id="preffered_line_error"></div>
          </div>
        @endif

        @if($data->hasAnyRole(['Institute','Insurer','Superadmin']))
        <div class="form-group">
          <label for="spoc">SPOC</label>
          <textarea class="form-control p-4" id="spoc" name="spoc" rows="8" disabled>{{ $data->profile->spoc ?? "N/A" }}</textarea>
          <div id="spoc_error"></div>
        </div>
        @endif


        @if(auth()->user()->user_id == $data->user_id)

        <div id="profile_details_update_button_div">
          <button type="submit" class="btn btn-gradient-primary me-2" id="profile_details_update_button">Submit</button>
          <button class="btn btn-light" id="profile_details_cancel_button">Cancel</button>
        </div>
        @endif
      </form>
      <script>
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
          let prefferedLineInput = document.getElementById("preffered_line");
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
      </script>
    </div>
  </div>
</div>