<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-3 profile-info-section">
  <div class="card">
    <div class="d-flex justify-content-between p-3">
      <h4>Your Profile</h4>
      <h6>Registered on {{ $data->created_at->format('Y-m-d') }}</h6>

    </div>
    <div class="profile-img-div text-center">
      <form action="">
        <label for="input-file" id="drop-area">
          <input type="file" accept="image/*" id="input-file" hidden>
          <div id="image-view">
            <!-- <img src="icon.png" alt=""> -->
            <i class="mdi mdi-cloud-upload "></i>

            <p>Drag and drop or click here <br>to upload image</p>
            <!-- <span>Upload any images From dekstop</span> -->
          </div>
        </label>
        <br>
        <div class="d-flex w-100 justify-content-center align-items-center ">
          <button style="display:none" ; type="submit" class="btn btn-gradient-primary me-2  my-3" id="image-upload-button">Upload</button>
        </div>
      </form>
    </div>

    <div class="profie-cv-upload-section">
      <div class="profile-personal-cv-div p-3">
        <div class="text-end">
          <button class="btn btn-gradient-primary btn-sm " id="profile_cv_edit_button"><i class="mdi mdi-cloud-upload"> Upload CV</i></button>
        </div>

        <form class="forms-sample" id="" action="user-documents" method="post">
          <div id="profile_cv_status"></div>
          @csrf
          <div class="form-group">
            <label for="name">Documents Title</label>
            <input type="text" class="form-control" id="document_title" name="document_title" placeholder="Provide documents title" disabled value=" {{ $data->name }}">
            <div id="document_title_error"></div>
          </div>

          <div class="form-group">
            <label for="name">Upload your Documents</label>
            <input type="file" class="form-control" id="document_url" name="document_url" placeholder="Upload your cv" disabled value=" {{ $data->name }}">
            <div id="document_url_error"></div>
          </div>

          <div class="form-group">
            <label for="user_id"></label>
            <input type="text" class="form-control" id="user_id" placeholder="user_id" value=" {{$data->user_id}}" hidden>
          </div>

          <div id="profile_cv_update_button_div">
            <button type="submit" class="btn btn-gradient-primary me-2" id="profile_cv_update_button">Upload</button>
            <button class="btn btn-light" id="profile_cv_cancel_button">Cancel</button>
          </div>

        </form>

      </div>
    </div>

    <div class="profile-personal-info-section">
      <div class="profile-personal-info-div p-3">
        <div class="text-end">
          <button class="btn btn-gradient-primary btn-sm " id="profile_info_edit_button"><i class="mdi mdi-table-edit"></i></button>
        </div>

        <form class="forms-sample" id="profile_info_update_form">
          <div id="profile_info_status"></div>
          @csrf
          <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Username" disabled value=" {{ $data->name }}">
            <div id="name_error"></div>
          </div>

          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" disabled value=" {{ $data->email }}">
            <div id="name_error"></div>
          </div>

          <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" disabled value="{{$data->phone}}">
            <div id="phone_error"></div>
          </div>
          <div class="form-group">
            <label for="user_id"></label>
            <input type="text" class="form-control" id="user_id" placeholder="user_id" value=" {{$data->user_id}}" hidden>
          </div>

          <div id="profile_info_update_button_div">
            <button type="submit" class="btn btn-gradient-primary me-2" id="profile_info_update_button">Update</button>
            <button class="btn btn-light" id="profile_info_cancel_button">Cancel</button>
          </div>

        </form>

      </div>
    </div>
  </div>
</div>