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
            <option value="M" {{ $data->profile->gender === 'M' ? 'selected' : '' }}>Male</option>
            <option value="F" {{ $data->profile->gender === 'F' ? 'selected' : '' }}>Female</option>
            <option value="O" {{ $data->profile->gender === 'O' ? 'selected' : '' }}>Other</option>
          </select>

          <div id="gender_error"></div>
        </div>
        <div class="form-group">
          <label for="age">Age</label>
          <input type="number" class="form-control p-4" id="age" name="age" rows="8" placeholder="Age" disabled value='{{ $data->profile->age ?? "N/A" }}'>
          <div id="age_error"></div>
        </div>
        <div class="form-group">
          <label for="preffered_line" class="form-label ">Preffered Line</label>
          <select class="form-control p-5" name="preffered_line" id="preffred_line" aria-label="work status" disabled>
            <option value="" selected disabled>-- Select --</option>
            <option value="life" {{ $data->profile->preffered_line === 'life' ? 'selected' : '' }}>Life</option>
            <option value="general" {{ $data->profile->preffered_line === 'general' ? 'selected' : '' }}>General</option>
            <option value="health" {{ $data->profile->preffered_line === 'health' ? 'selected' : '' }}>Health</option>
            <option value="other" {{ $data->profile->preffered_line === 'other' ? 'selected' : '' }}>Other</option>
          </select>

          <div id="preffred_line_error"></div>
        </div>


        <div class="form-group">
          <label for="spoc">SPOC</label>
          <textarea class="form-control p-4" id="spoc" name="spoc" rows="8" disabled>{{ $data->profile->spoc ?? "N/A" }}</textarea>
          <div id="spoc_error"></div>
        </div>

        @if(auth()->user()->user_id == $data->user_id)

        <div id="profile_details_update_button_div">
          <button type="submit" class="btn btn-gradient-primary me-2" id="profile_details_update_button">Submit</button>
          <button class="btn btn-light" id="profile_details_cancel_button">Cancel</button>
        </div>
        @endif
      </form>
    </div>
  </div>
</div>