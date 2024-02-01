<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificate of Achievement</title>

  <!-- **************css link************* -->
    

    <!-- ****************** Bootstrap CSS ************* -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
 
 
    <!--font awsom...-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <!-- Custom CSS -->
 <style>
    @import url('https://fonts.googleapis.com/css2?family=Arvo:ital@1&family=Dancing+Script&display=swap');

    @import url('https://fonts.googleapis.com/css2?family=Arvo:ital@1&family=Dancing+Script&family=Sansita+Swashed:wght@300&display=swap');
 
    #btnPrint {
      display: block;
      position: absolute;
      top: 10px;
      right: 10px;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    @media print {
      @page {
        size: auto;
        margin: 5mm;
        height: 100vh; /* Set the height of the printed page */
      }

      #btnPrint {
        display: none;
      }

      .certificate{
        padding: 80px;
        border: 2px solid #000;
        border-radius: 10px;
        position: relative;
        background-color: rgba(255, 255, 255, 0.9);
        background-image: url(http://localhost:8000/admin-assets/assets/images/dashboard/certificate-bg-image3.jpg);
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        height: 100vh;
      }

      .hidden-image {
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
      } 
    }
 </style> 
</head>

<body style="  margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;">
<div class="container">
  <button id="btnPrint">Print</button>

  <div class="certificate" 
      style="padding: 80px;
        border: 2px solid #000;
        border-radius: 10px;
        position: relative;
        background-color: rgba(255, 255, 255, 0.9);
        background-image: url(http://localhost:8000/admin-assets/assets/images/dashboard/certificate-bg-image3.jpg);
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        height: 100vh;">

    <img class="hidden-image" src="http://localhost:8000/admin-assets/assets/images/dashboard/logo-1.avif" width="18%" height="18%">

    <h1 class="certificate-text " 
        style=" text-align: center;
        margin-bottom: 30px;
        font-family:'Times New Roman', Times, serif;
        letter-spacing: 1px;
        word-spacing: 6px;
        font-size: 45px;
        font-weight: 700;
        position: relative;
        color: rgb(197, 172, 101);" >
        Certificate of Achievement</h1>
    <h3 class="text-secondary text-center">This certificate is present to</h3>
    <div class="pt-3 text-center name-text-div" 
        style="text-align: center !important;
        display: flex;
        justify-content: center;"
    >
        <div class="text-border" style=" width:40% !important;">
            <h2 class="name-text fw-bold pt-3 text-center p-2" 
                style="font-family: 'Arvo', serif;
                text-align: center !important;
                font-size: 30px;
                border-bottom: 2px solid rgb(226,202,151);"
            >
            {{ $data['name'] }}
          </h2>
        </div>
    </div>
    <div class="text-center pt-4 fw-bold paragraph" 
        style="font-size: 20px;
        font-weight: 350;
        color: rgb(141, 142, 144);">
        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, porro.</p> -->
        <p>{{ $data['title'] }}</p>
    </div> 
    
    <div class="text-center fw-bold paragraph2" 
        style="font-size: 1.1rem;
        color: rgb(113,120,129);
        font-weight: 500;">
        <p>This certificate is proudly awarded to {{ $data['name'] }} in recognition of their outstanding accomplishment.

        {{ $data['name'] }} has demonstrated exceptional knowledge and skill, scoring {{ $data['score'] }} on the assessment. Moreover, [he/she] has successfully passed Level {{ $data['level'] }}.

With this achievement, {{ $data['name'] }} has exhibited dedication, hard work, and a commitment to excellence. We celebrate [his/her] success and acknowledge the determination shown in reaching this significant milestone.
  </p>
<p>Congratulations on this remarkable achievement</p>
        <!-- <p>This certificate is awarded to {{ $data['name'] }} in recognition of their score {{ $data['score'] }} exceptional bravery and courage in the face of adversity on {{ $data['date'] }}. Your selflessness, courage, and unwavering commitment to Level {{ $data['level'] }} have set a high standard of excellence, and we are honored to recognize your achievement</p> -->
    </div> 


      <div class="container mt-5">
        <div class="row">

          <!-- First Image -->
          <div class="col">
            <img class="signature-text"  src="{{ asset('admin-assets/assets/images/dashboard/signature-image1.png') }}" alt="Image 1" class="img-fluid" width="60%" style="margin-left: 40%;"><br>
            <span class="text-white px-4 signature-text fw-bold font-style" 
                  style="margin-left: 40%; font-size: 15px;
                         500;">
                    Mr. Prabhat Bajaj
            </span><br>
            <span class=" text-white  px-5 signature-text" style="margin-left: 40%;">Manager</span>
          </div>

          <!-- Second Image -->
          <div class="col">
            <img  class="logo" src="{{ asset('admin-assets/assets/images/dashboard/certificate-logo1.png') }}" alt="" height="85%" width="60%" style=" margin-left: 36%;
    margin-top: 7%;">
          </div>

          <!-- Third Image -->
          <div class="col">
            <img class="signature-text"  src="{{ asset('admin-assets/assets/images/dashboard/signature-image1.png') }}" alt="Image 1" class="img-fluid" width="60%" style="margin-left: 40%;"><br>
            <span class="text-dark  px-4 signature-text font-style" style="margin-left: 40%; font-size: 15px;
    font-weight: 500;">Mr. Prabhat Bajaj</span><br>
            <span class=" text-secondary  px-5 signature-text" style="margin-left: 40%;">Manager</span>
          </div>

        </div>
      </div>
  </div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
      

const quizStatusString = localStorage.getItem("quizstatus");
if (quizStatusString) {
  const quizStatusObject = JSON.parse(quizStatusString);
  const isPassValue = quizStatusObject.isPass;
  if (isPassValue) {
    // Show success alert
    swal({
      title: "Good job!",
      text: "You are Passed!",
      icon: "success",
      button: "Ok",
    }).then(() => {
      // Delete the 'quizstatus' key from localStorage after showing the alert
      localStorage.removeItem("quizstatus");
    });
  }
} 
</script>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $('#btnPrint').on('click', function(e){
        window.print();
    });
</script>
</body>
</html>









