<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 my-3">
  <div class="profile-birth-section card">
    <div class="d-flex justify-content-between p-3">
      <h4>User Profile Details</h4>
      <button class="btn btn-gradient-primary btn-sm " id="profile_details_edit_button"><i class="mdi mdi-table-edit"></i></button>
    </div>
    <div class="profile-birth-div p-3">
      <form class="forms-sample">
      <div id="profile_details_status"></div>
        @csrf
        <div class="form-group">
          <label for="date_of_birth">Date of birth</label>
          <input type="date" class="form-control p-4" id="date_of_birth" placeholder="Date Of Birth" disabled value='{{ $data->user_profile->date_of_birth ?? "N/A" }}'>
          <div id="date_of_birth_error"></div>
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control p-4" id="gender" placeholder="Gender" disabled value='{{ $data->user_profile->gender ?? "N/A" }}'>
            <option value="" selected disabled>--Select--</option>
            <option value="M">Male</option>
            <option value="F">Female</option>
            <option value="O">Other</option>
          </select>
          <div id="gender_error"></div>
        </div>
        <div class="form-group">
          <label for="age">Age</label>
          <input type="number" class="form-control p-4" id="age"  rows="8" placeholder="Age" disabled value='{{ $data->user_profile->age ?? "N/A" }}'>
          <div id="age_error"></div>
        </div>
        <div class="form-group">
        <label for="preffred_line" class="form-label ">Prefered Line</label>
                                <select  class="form-control p-5" name="preffred_line" id="preffred_line" aria-label="work status" value='{{ $data->user_profile->preffred_line ?? "N/A" }}' disabled>
                                    <option selected disabled>-- Select --</option>
                                    <option value="life">Life</option>
                                    <option value="general">General</option>
                                    <option value="health">Health</option>
                                    <option value="other">Other</option>
                                </select>
          <div id="preffred_line_error"></div>
        </div>
        

        <div class="form-group">
          <label for="spoc">SPOC</label>
          <textarea class="form-control p-3" id="spoc" rows="6" disabled>{{ $data->user_profile->spoc ?? "N/A" }}</textarea>
          <div id="spoc_error"></div>
        </div>

        <div id="profile_details_update_button_div">
          <button type="submit" class="btn btn-gradient-primary me-2" id="profile_details_update_button">Submit</button>
          <button class="btn btn-light" id="profile_details_cancel_button">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>