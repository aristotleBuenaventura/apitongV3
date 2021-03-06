<?php
  include "../Registration/connectionRegistration.php";
  session_start();
  $email = $_SESSION['email'];
  $result = mysqli_query($conn,"SELECT * FROM registration WHERE email='$email'");
  $resultCheck = mysqli_num_rows($result);

  if($resultCheck > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $userDB = $row['username'];
      $emailDB = $row['email'];

    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>

img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
}


body{
background-image: url("bg1.png")
}


</style>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css'>

<title>Apitong's Food & Catering Services</title>
<meta charset ="utf-8">
<link rel="stylesheet" type="text/css" href="main.css">

</head>

<body>

					
<!-- Navbar  -->  
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
  <div class="container">
    <img src ="apitonglogo.png" class="img-responsive logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse container" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item nav-a">
          <a class="nav-link" href="../HomePage/index.php">Home</a>
      </li>

      <li class="nav-item nav-a">
          <a class="nav-link" href="../Packages/Packages.php">Packages</a>
      </li>

      <li class="nav-item nav-a">
        <a class="nav-link" href="../Inquiry/Inquiry.php">Inquiry</a>
    </li>

      <li class="nav-item nav-a">
          <a class="nav-link" href="../About/About.php">About Us</a>
      </li>

      <?php if(isset($_SESSION['email']))
      {
      ?>
      <li class="nav-item nav-a">
        <a class="nav-link" href="../Profile/profile.php">User Profile</a>
      </li>
        <li class="nav-item nav-a">
          <a class="nav-link" href="../Logout/Logout.php">Log out</a>
        </li>
      <?php }else{ ?>
        

      <li class="nav-item nav-a">
        <a class="nav-link" href="../Login/loginBackEnd.php">Log in</a>
      </li>
      <?php } ?>
      

      


      <!-- <ul class="nav navbar-nav flex-row justify-content-center flex-nowrap">
        <div class="input-group mr-0"> 
          <a href="../Logout.html"><button name="submit" class="btn">Logout</button></a>
        </div>
      </ul> -->
    </div>
  </div>
</nav>

<center>
<!-- USER INFORMATION -->

        <div class="col-xl-8 order-xl-1 mb-5 mt-5">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col col-6 text-left">
                  <h3 class="">My account</h3>
                </div>
                <div class="col col-6 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Edit</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 style="color:white;" class ="heading-small text-muted mb-4">User information</h6>
				<img src="123.png" alt="Avatar">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $userDB; ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="Email" value="<?php echo $emailDB; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="Lucky">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                      </div>
                    </div>
                  </div>
				  
				  
               </div>
                <hr class="my-4">
 <!-- Address -->
 
 
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                      </div>
                    </div>
                    <div class="col-lg-4">
                    
					<div class="form-group focused">
                        <label class="form-control-label" for="input-contact">Contact no.</label>
                        <input type="text" id="input-contact" class="form-control form-control-alternative" placeholder="Contact" value="*******">
                      </div>
                    </div>
					
                      </div>
                    </div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
					</div>
</center>		
					
                  
              
<!-- Footer  -->
<div class="global">
  <div class="container">
    <div class="row ">
      <div class="col col-12 col-md-6 col-xl-6 mt-5">
        <h6>Legal</h6>
        <ul class="nav flex-column">
          <li><a href="../TermsConditions/TermsCondition.html">Terms & Conditions</a></li>
          <li><a href="../PrivacyPolicy/PrivacyPolicy.html">Privacy Policy</a></li>
          <li><a href="../Forum/Forum.html">Forums</a></li>
        </ul>
      </div>
      <div class="col col-12 col-md-6 col-xl-6 mt-5 mb-5">
        <h6>Support</h6>
        <ul class="nav flex-column">
          <li>Phone Number: +639178883334</li>
          <li>Landline: 394-7896<li>
          <li>Email: apitongscatering@business.com</li>
        </ul>
      </div>
      <div class="social">
        <div class="mt-5 mb-4">
            <a href="https://www.facebook.com/Dirtysoda11"><i class="fa fa-facebook"></i></a>
            <a href="https://twitter.com/RAVEN75754452?s=09"><i class="fa fa-twitter"></i></a>
            <a href="https://www.instagram.com/algeralddelapaz/"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-snapchat-ghost"></i></a>
        </div>
      </div>
      <p class="copyright mb-5"> &copy; Apitongs Food & Catering Services. All Rights Reserved</p>
    </div>
</div>
</div>


<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" 
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" 
crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" 
crossorigin="anonymous"></script>

<script src="main.js"></script>

</body>

</html>