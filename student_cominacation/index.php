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
      Nazir Ahmad <strong> Parsa </strong>
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
				<li><a href="#page-resume" class="link-home">Home</a></li>
				<li><a href="#page-portfolio" class="link-page">Portfolio</a></li>
				<li><a href="#page-blog" class="link-page">Blog</a></li>
				<li><a href="#page-contact" class="link-page">Contact</a></li>
			</ul>
		</div>
		<!-- /MAIN MENU -->
		




		<!-- Query -->

		<?php

			error_reporting(0);
			
			ob_start();
			session_start();
			if(!isset($_SESSION['user_id']) or empty($_SESSION['user_id'])){
				header("location:login.php");
			}

			$user_id = $_SESSION['user_id'];
			$link = mysqli_connect("localhost","root","","student");
							
			// Profile
			$sql = "SELECT  * FROM registration WHERE id='$user_id' limit 1";
			$result = mysqli_query($link,$sql);
			$profile = mysqli_fetch_array($result);




		?>













		<!-- SECTION: Body Home -->	
		<div class="section-vcardbody section-home" id="section-home">
			<!-- Profile pic-->
			<div class="vcard-profile-pic">
				<img src="<?php echo $profile['photo']; ?>" id="profile2"  alt=""/>
				<img src="<?php echo $profile['photo']; ?>" id="profile1" class="profileActive" alt=""/>
			</div>
			<!-- /Profile pic -->
			<!-- Description -->
			<div class="vcard-profile-description">
				<!-- Profile title -->
				<h1 class="profile-title">Hi, i'm <span class="color1"> <?php echo $profile['name'].$profile['lname']; ?>!</span></h1>
				<h2 class="profile-subtitle">Web Designer & Developer</h2>
				<!-- /Profile Title -->
				<!-- Description Text -->
				<hr class="hr1">
				<div class="vcard-profile-description-text">
					<p><?php echo $profile['des']; ?></p>
				</div>	
				<!--/ Description Text -->	
				<!-- Description feature -->
				<div class="vcard-profile-description-feature">
					<!-- item -->
					<div class="vcard-profile-description-ft-item">
						<p>email:  <?php echo $profile['email']; ?> / phone <?php echo $profile['phone']; ?></p>
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
		<!-- /SECTION: Body  -->	





























		<!-- SECTION: PORTFOLIO-->
		<div class="section-vcardbody section-page" id="page-portfolio">
			<div class="section-portfolio">

				<!-- Section title -->
	            <h2 class="section-title">Portfolio</h2>
	            <!-- /Section title -->

	            <?php

					if(isset($_FILES['photo'])){

						if(!empty($_FILES['photo']['name'])){
							move_uploaded_file($_FILES['photo']['tmp_name'] , "photo/".$_FILES['photo']['name']);
						}

						$photo = "photo/".$_FILES['photo']['name'];

						$link = mysqli_connect("localhost","root","","student");
						
						$sql = "INSERT INTO photo (photo) VALUES ('$photo')";

						if(mysqli_query($link,$sql)){

							header("location:index.php?s");

						}else{

							header("location:index.php?e");
						}

					}


				?>



	            <form action="index.php" class="form" method="post" enctype="multipart/form-data">
	            	<!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="photo" name="photo" placeholder="Photo" type="file" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<button class="btn btn-default form-send" >Add!</button>
		            </div>  
		            <!-- /Form Field -->
	            </form>
	            <hr>

	            <!-- Projects list -->
				<div class="projects-list">


					<?php

						// photo
						$sql = "SELECT  * FROM photo order by id desc";
						$photo = mysqli_query($link,$sql);

						while ($photoResult = mysqli_fetch_array($photo)) {
							echo '


									<!-- item -->
									<div class="project-item">
										<!-- ==> Put your thumbnail as a background -->
										<a href="'.$photoResult['photo'].'" class="project-thumbnail nivobox" data-lightbox-gallery="portfolio" style="background-image: url(\''.$photoResult['photo'].'\');">
											<!-- project-description -->
											<div class="project-description-wrapper">
												<div class="project-description">
													<!-- project name -->
													<h2 class="project-title">PHP Project</h2>
													<!-- /project name -->
													<span class="see-more">Click to See</span>
												</div>
											</div>
											<!-- /project-description -->
										</a>
										<br><a class="btn btn-default" href="delete.php?pd='.$photoResult['id'].'">Delete</a><br>
									</div>			
									<!-- /item -->


							';
						}

					?>
				
				</div>
				<!-- /projects list -->	

			</div>			
		</div>
		<!-- /SECTION: PORTFOLIO  -->	

























		<!-- SECTION: BLOG-->
		<div class="section-vcardbody section-page" id="page-blog">
			<div class="section-blog">

				<!-- Section title -->
	            <h2 class="section-title">Blog</h2>
	            <!-- /Section title -->          

	            <?php

					if(isset($_POST['post'])){

			
						$title = htmlspecialchars($_POST['title']);
						$des = htmlspecialchars($_POST['des']);

						if(!empty($_FILES['photo_post']['name'])){
							move_uploaded_file($_FILES['photo_post']['tmp_name'],"post/".$_FILES['photo_post']['name']);
						}

						$photo = "post/".$_FILES['photo_post']['name'];
						
						$sql = "INSERT INTO post (title,des,photo) VALUES ('$title','$des','$photo')";

						if(mysqli_query($link,$sql)){

							header("location:index.php");

						}else{

							header("location:index.php");
						}

					}


				?>

	            <!-- Post form -->
	            <h4 class="contact-subtitle-1"><i class="fa fa-paper-plane-o"></i>&nbsp; Post Form</h4>
		        <form id="" method="post" class="form" action="index.php" enctype="multipart/form-data">
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="title" name="title" placeholder="Title" type="text" required />
		            </div>
		            <!-- /Form Field -->		           
		            <!-- Form Field -->
		            <div class="form-group">
		            	<textarea class="form-control required" id="des" name="des" placeholder="des..." rows="5" required></textarea>
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="photo_post" name="photo_post" placeholder="Photo" type="file" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<button class="btn btn-default form-send" name="post" >POST!</button>
		            </div>  
		            <!-- /Form Field -->
		        </form>
		        <!-- /Re Form -->

		        <hr>
				<!-- BLOG POSTS -->
				<div class="blog-posts">

				<?php

					// post
					$sql = "SELECT  * FROM post order by id desc";
					$post = mysqli_query($link,$sql);
			
					while ($postResult = mysqli_fetch_array($post)) {
						echo '


									<!-- blog-item -->
									<div class="blog-item">
										<div class="blog-item-wrapper">
											<!-- blog item thumbnail -->
											<div class="blog-item-thumb">
												<a href="single.html" class="loadPost"><img src="'.$postResult['photo'].'" alt=""></a>
											</div>
											<!-- /blog item thumbnail -->
											<!-- Blog item - infos -->
											<div class="blog-item-infos">
												<!-- blog-item-title -->
												<div class="blog-item-title-wrapper">
													<h2 class="blog-item-title title-border"><a href="#" class="loadPost">'.$postResult['title'].'</a></h2>
												</div>
												<!-- /blog-item-title -->
												<!-- blog item - description -->
												<div class="blog-item-description">
													<p><a href="single.html" class="loadPost">'.$postResult['des'].'</a></p>
												</div>
												<!-- /blog-item-description -->
												<!-- blog item - link -->
												<div class="blog-item-link">
													<a href="delete.php?postId='.$postResult['id'].'" class="btn btn-default2">Delete</a>
													<a href="edit.php?postId='.$postResult['id'].'" class="btn btn-default">Edit</a>
												</div>
												<!-- /blog item - link -->
											</div>
											<!-- /blog item - infos -->
										</div>
									</div>
									<!-- /blog-item -->



						';
					}

				?>
				</div>
			</div>			
		</div>
		<!-- /SECTION: BLOG  -->	
 
		

















		<!-- SECTION: CONTACT-->
		<div class="section-vcardbody section-page" id="page-contact">
			<div class="section-contact">

				<!-- Section title -->
	            <h2 class="section-title">Contact</h2>
	            <!-- /Section title -->


	            <!-- Contact infos -->                 
                <div class="contact-infos">
                	<h4 class="contact-subtitle-1"><i class="fa fa-map"></i>&nbsp;   Address</h4>
                	<p>Afghanistan - Herat: Herat University PHP Project</p>
                	<h4 class="contact-subtitle-1"><i class="fa fa-phone-square"></i>&nbsp; Phone</h4>
                	<p>+93 795 00 00 00</p>
                	<h4 class="contact-subtitle-1"><i class="fa fa-envelope"></i>&nbsp; Mail</h4>
                	<p>info@phpProject</p>
                </div>
                <!-- /Contact infos --> 

	            <!-- Contact form -->
	            <h4 class="contact-subtitle-1"><i class="fa fa-paper-plane-o"></i>&nbsp; Send Me a Message</h4>
		        <form id="contactForm" method="post" class="form">
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="name" name="name" placeholder="Name" type="text" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="email" name="email" placeholder="Email" type="email" required />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="subject" type="text" name="subject" placeholder="Subject" required>
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<textarea class="form-control required" id="message" name="message" placeholder="Message" rows="5" required></textarea>
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input type="submit" class="btn btn-default form-send" value="Send!">
		            </div>  
		            <!-- /Form Field -->
		        </form>
		        <!-- /Contact Form -->

			</div>			
		</div>
		<!-- /SECTION: CONTACT  -->	
	</div>

</section>
<!-- /Main Content
================================================== -->













































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