<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Information-form</title>

    <!-- css link -->

    <link rel="stylesheet" href="admin-panel/assets/css/information_form.css" />

    <!--font awsom...-->

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
  </head>
  <style>
    .background {
      background-color: rgba(160, 160, 207, 0.072);
      border: 2px solid rgba(176, 176, 232, 0.277);
      border-radius: 10px;
      position: relative;
      height: 187vh;
      margin-top: 50px;
      margin-right: 12%;
      margin-left: 12%;
    }

    .text-border {
      border-bottom: solid 2px rgba(17, 82, 180, 0.867);
      width: 40% !important;
    }

    .name-text-div {
      text-align: center !important;
      display: flex;
      justify-content: center;
    }

    .info-text-style {
      word-spacing: 1px;
      letter-spacing: 1px;
      font-weight: bolder;
      font-size: 48px;
      font-family: "Courier New", Courier, monospace;
      color: #222121d6;
    }

    .logo-image {
      margin-left: 41%;
      border-radius: 50%;
      border: 1px solid rgb(168, 166, 166);
    }

    .user-info-text {
      border: 2px solid rgba(83, 83, 100, 0.277);
    }

    .spoc-style {
      background-color: rgba(165, 165, 203, 0.09);
      border: 1px solid rgba(160, 160, 207, 0.415);
      border-radius: 5px;
      font-size: 18px;
      font-weight: 500;
      color: rgb(113, 111, 111);
    }

    .input-style {
      width: 70%;
      font-size: 18px;
      font-weight: 500;
      color: rgb(113, 111, 111);
      background-color: rgba(165, 165, 203, 0.09);
      border: 1px solid rgba(160, 160, 207, 0.415);
      border-radius: 5px;
    }

    .labet-style {
      font-size: 17px;
      font-weight: 500;
    }

    .number-text {
      font-size: 17px;
      font-weight: 500;
    }

    .bg-style {
      /* background-color: rgb(75, 77, 77); */
      background-color: #222121d6;
      /* background-color: red; */
      border-radius: 8px;
    }

    .Age-text {
      font-size: 17px;
      font-weight: 500;
    }

    .preffered-text {
      font-size: 17px;
      font-weight: 500;
    }

    .spoc-text {
      font-size: 16px;
      font-weight: 700;
      margin-left: 1%;
    }

    .state-text {
      font-size: 16px;
      font-weight: 700;
    }

    .Number-text {
      font-size: 16px;
      font-weight: 700;
    }

    .Address-text1 {
      font-size: 16px;
      font-weight: 700;
    }

    .Address-text2 {
      font-size: 16px;
      font-weight: 700;
      margin-left: -8%;
    }

    .Address-input-style {
      width: 34%;
      height: 69px;
      font-size: 18px;
      font-weight: 500;
      color: rgb(113, 111, 111);
      background-color: rgba(165, 165, 203, 0.09);
      border: 1px solid rgba(160, 160, 207, 0.415);
      border-radius: 5px;
    }

    .border-style {
      border: 1px solid rgba(180, 177, 177, 0.721);
      background-color: rgba(160, 160, 207, 0.178);
      border-radius: 8px;
    }

    .logo-image-style {
      padding-top: 1%;
      margin-left: 79%;
    }
  </style>

  <body>
    <div class="background">
      <div class="pt-3 text-center name-text-div">
        <div class="text-border">
          <h2 class="name-text fw-bold pt-3 text-center p-2 info-text-style">
            INFORMATION FORM
          </h2>
        </div>
      </div>

      <div class="pt-4">
        <!-- <img class="logo-image" src="admin-panel/assets/images/certificate-logo1.png" height="150px"> -->
        <img
          class="rounded-circle logo-image"
          src="admin-panel/assets/images/person-image.jpg"
          height="230px"
          width="220px"
        />
      </div>

      <div class="container pt-4">
        <div class="row">
          <div
            class="col-lg-12 user-info-text bg-style text-white pt-1 pb-1 text-center"
          >
            <h4>User Details</h4>
          </div>
        </div>
      </div>
      <br />

      <div class="container p-5 border-style">
        <div class="row">
          <div class="col-lg-6">
            <label for="username" class="labet-style">Full Name :</label>
            <input
              class="input-style px-2 pt-1 pb-1"
              type="text"
              id="username"
              name="username"
              disabled
              value="Prabhat Bajaj"
            />
          </div>

          <div class="col-lg-6">
            <label for="username" class="labet-style">Email :</label>
            <input
              class="input-style px-2 pt-1 pb-1"
              type="text"
              id="username"
              name="username"
              disabled
              value="Enter Your Email"
            />
          </div>

          <div class="col-lg-6 pt-4">
            <label for="username" class="number-text">Number :</label>
            <input
              class="input-style px-2 pt-1 pb-1"
              type="number"
              id="username"
              name="username"
              disabled
              value="6456147"
            />
          </div>
        </div>
      </div>
      <br />

      <!-- **************User address section************** -->

      <div class="container">
        <div class="row">
          <div
            class="col-lg-12 user-info-text bg-style text-white pt-1 pb-1 text-center"
          >
            <h4>User Profile Details</h4>
          </div>
        </div>
      </div>
      <br />

      <div class="container p-5 border-style">
        <div class="row">
          <div class="col-lg-6">
            <label for="username" class="labet-style">DOB :</label>
            <input
              class="input-style px-2 pt-1 pb-1"
              type="date"
              id="username"
              name="username"
              disabled
              value=""
            />
          </div>

          <div class="col-lg-6">
            <label for="username" class="labet-style">Gender :</label>
            <input
              class="input-style px-2 pt-1 pb-1"
              type="text"
              id="username"
              name="username"
              disabled
              disabled
              value="Male/Female"
            />
          </div>

          <div class="col-lg-6 pt-4">
            <label for="username" class="Age-text">Age :</label>
            <input
              class="input-style px-2 pt-1 pb-1"
              type="number"
              id="username"
              name="username"
              disabled
              value="20"
            />
          </div>

          <div class="col-lg-6 pt-4">
            <label for="username" class="preffered-text"
              >Preffered Line :</label
            >
            <input
              class="input-style px-2 pt-1 pb-1"
              type="text"
              id="username"
              name="username"
              disabled
              value="Life"
            />
          </div>
          <br /><br /><br /><br />

          <label for="" class="spoc-text">SPOC :</label>
          <textarea
            id="message"
            class="spoc-style"
            name="message"
            rows="4"
            cols="47"
            required
            disabled
          >
Message</textarea
          >
        </div>
      </div>

      <!-- ***************User Address********************** -->

      <div class="container pt-4">
        <div class="row">
          <div
            class="col-lg-12 user-info-text bg-style text-white pt-1 pb-1 text-center"
          >
            <h4>User Address</h4>
          </div>
        </div>
      </div>
      <br />

      <div class="container p-5 border-style">
        <div class="row">
          <div class="col-lg-6">
            <label for="city" class="labet-style">City :</label>
            <input
              class="input-style px-2 pt-1 pb-1"
              type="text"
              id="username"
              name="username"
              value="Enter Your City"
              disabled
            />
          </div>

          <div class="col-lg-6">
            <label for="PIN" class="labet-style">PinCode :</label>
            <input
              class="input-style px-2 pt-1 pb-1"
              type="number"
              id="username"
              name="username"
              disabled
              value="000000"
            />
          </div>

          <div class="col-lg-6 pt-4">
            <label for="state" class="state-text">State :</label>
            <input
              class="input-style px-2 pt-1 pb-1"
              type="text"
              id="username"
              name="username"
              disabled
              value="Enter Your State"
            />
          </div>

          <div class="col-lg-6 pt-4">
            <label for="Number" class="Number-text">Number :</label>
            <input
              class="input-style px-2 pt-1 pb-1"
              type="number"
              id="username"
              name="username"
              disabled
              value="0000000000"
            />
          </div>

          <div class="col-lg-12 pt-4">
            <label for="Address" class="Address-text1">Address Line 1 :</label>
            <input
              class="Address-input-style px-2"
              type="text"
              id="username"
              name="username"
              disabled
              value="Enter Address 1"
            />
          </div>

          <div class="col-lg-12 pt-4">
            <label for="Address" class="Address-text1">Address Line 1 :</label>
            <input
              class="Address-input-style px-2"
              type="text"
              id="username"
              name="username"
              disabled
              value="Enter Address 2"
            />
          </div>

          <div class="col-lg-12 pt-4">
            <label for="Address" class="Address-text1">Address Line 1 :</label>
            <input
              class="Address-input-style px-2"
              type="text"
              id="username"
              name="username"
              disabled
              value="Enter Address 3"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
