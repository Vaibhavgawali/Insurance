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

/* name text style */
@import url('https://fonts.googleapis.com/css2?family=Arvo:ital@1&family=Dancing+Script&family=Sansita+Swashed:wght@300&display=swap');


body {
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .certificate {
    padding: 80px;
    border: 2px solid #000;
    border-radius: 10px;
    position: relative;
    background-color: rgba(255, 255, 255, 0.9);
    background-image: url('{{ public_path('admin-assets/assets/images/certificate-bg-image3.jpg') }}');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    height: 100vh;
    /* text-align: center; */
    /* border: solid; */
  }

  .certificate .certificate-text {
    text-align: center;
    margin-bottom: 30px;
    font-family:'Times New Roman', Times, serif;
    letter-spacing: 1px;
    word-spacing: 6px;
    font-size: 45px;
    font-weight: 700;
    position: relative;
    color: rgb(197, 172, 101);
    
}

.certificate .name-text{
    /* padding-top: 20px; */
    font-family: 'Arvo', serif;
    text-align: center !important;
    font-size: 30px;
    border-bottom: 2px solid rgb(226,202,151);
}

.text-border{
    /* border:solid 2px red ; */
    width:40% !important;
}

.name-text-div{
    text-align: center !important;
    display: flex;
    justify-content: center;
}

.paragraph{
    font-size: 20px;
    font-weight: 350;
    color: rgb(141, 142, 144);
}
.paragraph2{
    font-size: 1.1rem;
    color: rgb(113,120,129);
    font-weight: 500;
}

.signature-text{
    margin-left: 40%;
    /* font-weight: 700; */
}

.logo{
    margin-left: 36%;
    margin-top: 7%;
}

.font-style{
    font-size: 15px;
    font-weight: 500;
}
  </style> 
</head>

<body>

<div class="container">
  <div class="certificate">
    <img src="{{ asset('admin-assets/assets/images/dashboard/logo-1.avif') }}" width="18%" height="18%">
    <h1 class="certificate-text ">Certificate of Achievement</h1>
        {{$data['title']}}
    <h3 class="text-secondary text-center">This certificate is present to</h3>
    <div class="pt-3 text-center name-text-div">
        <div class="text-border">
            <h2 class="name-text fw-bold pt-3 text-center p-2">Name Surname</h2>
        </div>
    </div>
    <div class="text-center pt-4 fw-bold paragraph">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, porro.</p>
    </div> 
    
    <div class="text-center fw-bold paragraph2">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae consectetur quod eveniet Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae quod evenietLorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae quod eveniet cum tenetur consequuntur accusantium optio dolorem? Perferendis, ipsam nisi.Vitae quod eveniet cum tenetur consequuntur accusantium optio dolorem? Perferendis, ipsam nisi.</p>
    </div> 


      <div class="container mt-5">
        <div class="row">

          <!-- First Image -->
          <div class="col">
            <img class="signature-text"  src="{{ asset('admin-assets/assets/images/dashboard/signature-image1.png') }}" alt="Image 1" class="img-fluid" width="60%"><br>
            <span class="text-white px-4 signature-text fw-bold font-style">Mr. Prabhat Bajaj</span><br>
            <span class=" text-white  px-5 signature-text">Manager</span>
          </div>

          <!-- Second Image -->
          <div class="col">
            <img  class="logo" src="{{ asset('admin-assets/assets/images/dashboard/certificate-logo1.png') }}" alt="" height="85%" width="60%">
          </div>

          <!-- Third Image -->
          <div class="col">
            <img class="signature-text"  src="{{ asset('admin-assets/assets/images/dashboard/signature-image1.png') }}" alt="Image 1" class="img-fluid" width="60%"><br>
            <span class="text-dark  px-4 signature-text font-style">Mr. Prabhat Bajaj</span><br>
            <span class=" text-secondary  px-5 signature-text">Manager</span>
          </div>

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









