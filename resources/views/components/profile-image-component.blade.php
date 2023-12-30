<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-3 profile-info-section">
  <div class="card">

    <div class="d-flex justify-content-between p-3">
      <h6>Registered on {{ $data->created_at->format('Y-m-d') }}</h6>
    </div>

    <div class="profile-img-div text-center">
      @if(auth()->user()->user_id == $data->user_id)
      @if($data->profile->profile_image)
    <div id="image-view">
        <img src="{{asset('public/images/cjTve0W21L7ak1OXVPapgcGe9CVqynMEMCE9jraG.jpg')}}" alt="{{$data->profile->profile_image}}">
    </div>
@else


      <form action="" id="Profile-image-upload-form">
        <div id="profile_image_status"></div>
        @csrf
        <label for="profile_image" id="drop-area">
          <input type="file" accept="image/*" id="profile_image" name="profile_image" hidden>
          <div id="image-view">
            <!-- <img src="icon.png" alt=""> -->
            <i class="mdi mdi-cloud-upload "></i>

            <p>Drag and drop or click here <br>to upload image</p>
            <!-- <span>Upload any images From dekstop</span> -->
          </div>
          <div id="profile_image_error"></div>
        </label>
        <div class="form-group">
          <label for="user_id"></label>
          <input type="text" class="form-control" id="user_id" placeholder="user_id" value=" {{$data->user_id}}" hidden>
        </div>
        <br>
        <div class="d-flex w-100 justify-content-center align-items-center ">
          <button style="display:none" ; type="submit" class="btn btn-gradient-primary me-2  my-3" id="image-upload-button">Upload</button>
        </div>
      </form>
      @endif

      @else
      <div id="image-view">
        <img src="{{ asset('images/' . $data->profile->profile_image) }}" alt="{{ asset('images/' . $data->profile->profile_image) }}">
      </div>
      @endif
    </div>






    <div class="profile-personal-info-section">
      <div class="profile-personal-info-div p-3">

        @if(auth()->user()->user_id == $data->user_id)
        <div class="text-end">
          <button class="btn btn-gradient-primary btn-sm " id="profile_info_edit_button"><i class="mdi mdi-table-edit"></i></button>
        </div>
        @endif

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

          @if(auth()->user()->user_id == $data->user_id)
          <div id="profile_info_update_button_div">
            <button type="submit" class="btn btn-gradient-primary me-2" id="profile_info_update_button">Update</button>
            <button class="btn btn-light" id="profile_info_cancel_button">Cancel</button>
          </div>
          @endif
        </form>

      </div>
    </div>
  </div>
  <script>
    let Profile_Info_Toggle = () => {
      let editProfileButton = document.getElementById("profile_info_edit_button");
      let profileUpdateButtonDiv = document.getElementById(
        "profile_info_update_button_div"
      );
      let profileCancelButton = document.getElementById(
        "profile_info_cancel_button"
      );
      let profileUpdateButton = document.getElementById("profile_info_update_button");

      let nameInput = document.getElementById("name");
      let emailInput = document.getElementById("email");
      let phoneInput = document.getElementById("phone");

      let toggle = false;
      profileUpdateButtonDiv.style.display = "none";
      editProfileButton.addEventListener("click", () => {
        toggle = !toggle;
        if (toggle) {
          profileUpdateButtonDiv.style.display = "block";
          nameInput.removeAttribute("disabled");
          emailInput.removeAttribute("disabled");
          phoneInput.removeAttribute("disabled");
        } else {
          profileUpdateButtonDiv.style.display = "none";
          nameInput.setAttribute("disabled", true);
          emailInput.setAttribute("disabled", true);
          phoneInput.setAttribute("disabled", true);
        }
      });
      profileCancelButton.addEventListener("click", () => {
        toggle = false;

        profileUpdateButtonDiv.style.display = "none";
        nameInput.setAttribute("disabled", true);
        emailInput.setAttribute("disabled", true);
        phoneInput.setAttribute("disabled", true);
      });
    };

    Profile_Info_Toggle();
  </script>
</div>