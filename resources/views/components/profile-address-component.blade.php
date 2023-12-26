<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 my-3">
  <div class="profile-address-section card">
    <div class="d-flex justify-content-between p-3">
      <h4>Address</h4>
      <button class="btn btn-gradient-primary btn-sm " id="profile_address_edit_button"><i class="mdi mdi-table-edit"></i></button>
    </div>
    <div class="profile-address-div p-3">

      <form class="forms-sample">
        <div class="form-group">
          <label for="city">City</label>
          <input type="text" class="form-control" id="city" placeholder="City" disabled value='{{ $data->address->city ?? "N/A" }}'>
        </div>
        <div class="form-group">
          <label for="pincode">Pincode</label>
          <input type="text" class="form-control" id="pincode" placeholder="Pincode" disabled value='{{ $data->address->pincode ?? "N/A" }}'>
        </div>
        <div class="form-group">
          <label for="state">State</label>
          <input type="text" class="form-control" id="state" placeholder="State" disabled value='{{ $data->address->state ?? "N/A" }}'>
        </div>
        <div class="form-group">
          <label for="country">Country</label>
          <input type="text" class="form-control" id="country" placeholder="Country" disabled value='{{ $data->address->preffred_line ?? "India" }}'>
        </div>
        <div class="form-group">
          <label for="line1">Address Line 1</label>
          <textarea class="form-control" id="line1" rows="1" disabled>{{ $data->address->line1 ?? "N/A" }}</textarea>
        </div>
        <div class="form-group">
          <label for="line2">Address Line 2</label>
          <textarea class="form-control" id="line2" rows="1" disabled>{{ $data->address->line2 ?? "N/A" }}</textarea>
        </div>
        <div class="form-group">
          <label for="line3">Address Line 3</label>
          <textarea class="form-control" id="line3" rows="1" disabled>{{ $data->address->line3 ?? "N/A" }}</textarea>
        </div>

        <div id="profile_address_update_button_div">
          <button type="submit" class="btn btn-gradient-primary me-2" id="profile_address_update_button">Submit</button>
          <button class="btn btn-light" id="profile_address_cancel_button">Cancel</button>
        </div>

      </form>

    </div>
  </div>
</div>