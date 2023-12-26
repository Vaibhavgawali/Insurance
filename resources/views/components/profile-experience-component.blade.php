<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-3">
  <div class="profile-birth-section card">
    <div class="d-flex justify-content-between p-3">
      <h4>Experience</h4>
      <button class="btn btn-gradient-primary btn-sm " id="profile_experience_edit_button"><i class="mdi mdi-table-edit"></i></button>
    </div>
    <div class="profile-birth-div p-3">
      @csrf
      <form class="forms-sample">
        <div class="form-group">
          <label for="is_current_company">Current Company</label>
          <input type="text" class="form-control" id="is_current_company" placeholder="Current Company" disabled value='{{ $data->experience->is_current_company ?? "N/A" }}'>
        </div>
        <div class="form-group">
          <label for="organization">Organization</label>
          <input type="text" class="form-control" id="oraganization" placeholder="Oraganization" disabled value='{{ $data->experience->organization ?? "N/A" }}'>
        </div>
        <div class="form-group">
          <label for="age">Designation</label>
          <input type="text" class="form-control" id="designation" placeholder="Designation" disabled value='{{ $data->experience->designation ?? "N/A" }}'>
        </div>
        <div class="form-group">
          <label for="ctc">CTC</label>
          <input type="text" class="form-control" id="ctc" placeholder="CTC" disabled value='{{ $data->experience->ctc ?? "N/A" }}'>
        </div>
        <div class="form-group">
          <label for="job_profile_description">Job Profile Description</label>
          <textarea class="form-control" id="job_profile_description" rows="4" disabled>{{ $data->user_profile->job_profile_description ?? "N/A" }}</textarea>
        </div>
        <div class="form-group">
          <label for="job_state">State</label>
          <input type="text" class="form-control" id="job_state" placeholder="State" disabled value='{{ $data->experience->state ?? "N/A" }}'>
        </div>
        <div class="form-group">
          <label for="joining_date">Joining Date</label>
          <input type="date" class="form-control" id="joining_date" disabled value='{{ $data->experience->joining_date ?? "N/A" }}'>
        </div>
        <div class="form-group">
          <label for="relieving_date">Reliving Date</label>
          <input type="date" class="form-control" id="relieving_date" disabled value='{{ $data->experience->relieving_date ?? "N/A" }}'>
        </div>

        <div id="profile_experience_update_button_div">
          <button type="submit" class="btn btn-gradient-primary me-2"  id="profile_experience_update_button">Submit</button>
          <button class="btn btn-light" id="profile_experience_cancel_button">Cancel</button>
        </div>

      </form>
    </div>
  </div>
</div>