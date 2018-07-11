<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHP - Project </title>


<!-- >> CSS
============================================================================== -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Google Web Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- Font Awesome -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Nivo Lightbox -->
<link href="vendor/nivo-lightbox/nivo-lightbox.css" rel="stylesheet">
<link rel="stylesheet" href="vendor/nivo-lightbox/themes/default/default.css" type="text/css" />
  <!-- /Nivo Lightbox -->
  <!-- Perfect ScrollBar -->
<link href="vendor/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
<!-- owl carousel -->
<link href="vendor/owl.carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="vendor/owl.carousel/owl-carousel/owl.theme.css" rel="stylesheet">
<!-- Main Styles -->
<link href="css/styles.css" rel="stylesheet">

<!-- >> /CSS
============================================================================== -->
</head>

<body>
<!-- Page Loader
========================================================= -->
<div class="loader-container" id="page-loader"> 
  <div class="loading-wrapper">
  	<div class="loader-animation" id="loader-animation">
  		<span class="loader"><span class="loader-inner"></span></span>
  	</div>    
    <!-- Edit With Your Name -->
    <div class="loader-name" id="loader-name">
      Mohammad rafi <strong> shirzad </strong>
    </div>
    <!-- /Edit With Your Name -->
    <!-- Edit With Your Job -->
    <p class="loader-job" id="loader-job">Web Designer & Web Developer</p>
    <!-- /Edit With Your Job -->
  </div>   
</div>
<!-- /End of Page loader
========================================================= -->

<!-- Main Content
================================================== -->
<section id="body" class="">

	<div class="container">

		<!-- MAIN MENU -->
		<div class="main-menu" id="main-menu">
			<ul class="main-menu-list">
				<li><a href="#page-resume" class="link-home">Login</a></li>
				<li><a href="#page-contact" class="link-page">Sign Up</a></li>
			</ul>
		</div>
		<!-- /MAIN MENU -->
		
		<!-- SECTION: vCard Body  -->	
		<div class="section-vcardbody section-home" id="section-home">
			<!-- Profile pic-->
			<div class="vcard-profile-pic">
				<img src="img/login.png" id="profile2"  alt=""/>
				<img src="img/lock.png" id="profile1" class="profileActive" alt=""/>
			</div>
			<!-- /Profile pic -->
			<!-- Description -->
			<div class="vcard-profile-description">
				<!-- Profile title -->
				<h1 class="profile-title">Hi, i'm <span class="color1"> mohammad rafi shirzad!</span></h1>
				<h2 class="profile-subtitle">Web Designer & Developer</h2>
				<!-- /Profile Title -->
				<!-- Description Text -->
				<hr class="hr1">
				<div class="vcard-profile-description-text">
					<!-- Login to App Profile -->

					<?php
						ob_start();

						if(isset($_POST['lemail'])){

							session_start();

							$email = htmlspecialchars($_POST['lemail']);
							$password = md5(sha1($_POST['password']));


							$link = mysqli_connect("localhost","root","","student");
							
							$sql = "SELECT  * FROM registration WHERE password ='$password' and email='$email' limit 1";
							$result = mysqli_query($link,$sql);


							if(mysqli_num_rows($result)>0){

								$rs = mysqli_fetch_array($result);

								$_SESSION['isLogin'] = $password;
								$_SESSION['user_id'] = $rs['id'];

								header("location:index.php");

							}else{

								header("location:login.php?e");
							}

						}

					if(isset($_GET['e'])){
						echo '<p style="background:#E91E63;color:white;padding:10px;">Invalid Email or Password</p>';
					}

					if(isset($_GET['re'])){
						echo '<p style="background:#E91E63;color:white;padding:10px;">An error occurred during registration.</p>';
					}

					if(isset($_GET['s'])){
						echo '<p style="background:#009688;color:white;padding:10px;">Success Registration Login Now</p>';
					}

					?>
					<form id="" method="post" class="form" action="login.php">
			            <!-- Form Field -->
			            <div class="form-group">
			            	<input class="form-control required" id="lemail" name="lemail" placeholder="Email" type="email" required />
			            </div>
			            <!-- /Form Field -->
			            <!-- Form Field -->
			            <div class="form-group">
			            	<input class="form-control required" id="password" type="password" name="password" placeholder="Password" required>
			            </div>
			            <!-- /Form Field -->
			            <!-- Form Field -->
			            <div class="form-group">
			            	<input type="submit" class="btn btn-default form-send" value="login!">
			            </div>  
			            <!-- /Form Field -->
		        	</form>


				</div>	
				<!--/ Description Text -->	
				<!-- Description feature -->
				<div class="vcard-profile-description-feature">
					<!-- item -->
					<div class="vcard-profile-description-ft-item">
						<p>gmail:  @m.rafishirzad423 / phone +93 (0) 794 25 30 26</p>
					</div>
					<!-- item -->
				</div>	
				<!-- /Description feature -->		
			</div>
			<!-- /Description -->	
			<!-- Footer -->		
			<div class="vcard-footer">
				<!-- Social Icons -->
				<div class="footer-social-icons">
					<a href="#"><i class="fa fa-instagram"></i></a>
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-youtube"></i></a>
				</div>
				<!-- /Social Icons -->
			</div>
		</div>
		<!-- /SECTION: vCard Body  -->	






		<!-- SECTION: Registration Form-->
		<div class="section-vcardbody section-page" id="page-contact">
			<div class="section-contact">

				<?php
					error_reporting(0);
					
					if(isset($_POST['name'])){

						$name = htmlspecialchars($_POST['name']);
						$lname = htmlspecialchars($_POST['lname']);
						$phone = htmlspecialchars($_POST['phone']);
						$email = htmlspecialchars($_POST['email']);
						$des = htmlspecialchars($_POST['about']);
						$password = md5(sha1($_POST['password']));

						if(!empty($_FILES['photo']['name'])){
							move_uploaded_file($_FILES['photo']['tmp_name'],"re/".$password.".jpg");
						}

						$photo = "re/".$password.".jpg";
						$link = mysqli_connect("localhost","root","","student");
						
						$sql = "INSERT INTO registration (name,lname,phone,email,photo,password,des) VALUES ('$name','$lname','$phone','$email','$photo','$password','$des')";

						if(mysqli_query($link,$sql)){

							header("location:login.php?s");

						}else{

							header("location:login.php?e");
						}

					}


				?>

				<!-- Section title -->
	            <h2 class="section-title">Register to App Profile</h2>
	            <!-- /Section title -->

	            <!-- Registration form -->
	            <h4 class="contact-subtitle-1"><i class="fa fa-paper-plane-o"></i>&nbsp; Registration Form</h4>
		        <form id="" method="post" class="form" action="login.php" enctype="multipart/form-data">
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="name" name="name" placeholder="Name" type="text" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="lname" name="lname" placeholder="Last Name" type="text" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="phone" name="phone" placeholder="Phone" type="text" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="email" name="email" placeholder="Email" type="email" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="password" type="password" name="password" placeholder="Password" required>
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<textarea class="form-control required" id="about" name="about" placeholder="about" rows="5" required></textarea>
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="photo" name="photo" placeholder="Photo" type="file" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<button class="btn btn-default form-send" >Register!</button>
		            </div>  
		            <!-- /Form Field -->
		        </form>
		        <!-- /Re Form -->

			</div>			
		</div>
		<!-- /SECTION: Registration  -->	

















	</div>

</section>
<!-- /Main Content
================================================== -->

<!-- Contact Form - Ajax Messages
========================================================= -->
<!-- Form Sucess -->
<div class="form-result modal-wrap" id="contactSuccess">
  <div class="modal-bg"></div>
  <div class="modal-content">
    <h4 class="modal-title"><i class="fa fa-check-circle"></i> Success!</h4>
    <p>Your message has been sent to us.</p>
  </div>
</div>
<!-- /Form Sucess -->
<!-- form-error -->
<div class="form-result modal-wrap" id="contactError">
  <div class="modal-bg"></div>
  <div class="modal-content">
    <h4 class="modal-title"><i class="fa fa-times"></i> Error</h4>
    <p>There was an error sending your message.</p>
  </div>
</div>
<!-- /form-error -->

<!-- Contact Form - Ajax Messages
========================================================= -->


<!-- >> JS
============================================================================== -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="vendor/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/validate.js"></script>
<!-- Holder JS -->
<script src="vendor/holder.js"></script>
<!-- Modal box-->
<script src="vendor/nivo-lightbox/nivo-lightbox.min.js"></script>
<!-- /Modal Box -->
<!-- Perfect ScrolBar -->
<script src="vendor/perfect-scrollbar/js/min/perfect-scrollbar.jquery.min.js"></script>
<!-- /Perfect ScrolBar -->
<!-- Owl Caroulsel -->
<script src="vendor/owl.carousel/owl-carousel/owl.carousel.js"></script>
<!-- Google Maps -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!-- Cross-browser -->
<script src="vendor/cross-browser.js"></script>
<!-- Main Scripts -->
<script src="js/main.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68192027-1', 'auto');
  ga('send', 'pageview');

</script>

<!-- >> /JS
============================================================================= -->
</body>
</html>