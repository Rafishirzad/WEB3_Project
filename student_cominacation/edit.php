<!DOCTYPE html>
<html>
<head>
	<title>App Profile Edit POST</title>

		<!-- >> CSS ============================================================================== -->
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

</head>


<body>


		<!-- SECTION: BLOG-->
		<div class="section-vcardbody" id="page-blog">
			<div class="section-blog">

				<!-- Section title -->
	            <h2 class="section-title">Blog</h2>
	            <!-- /Section title -->          

	            <?php

	            	error_reporting(0);
	            	
	            	$link = mysqli_connect("localhost","root","","student");

	            	$id = $_GET['postId'];

	            	// photo
					$sql = "SELECT  * FROM post where id='$id' limit 1";
					$post = mysqli_query($link,$sql);
					$postResult = mysqli_fetch_array($post);







					if(isset($_POST['post'])){


						$title = htmlspecialchars($_POST['title']);
						$des = htmlspecialchars($_POST['des']);
						$postid = htmlspecialchars($_POST['postid']);

						if(!empty($_FILES['photo_post']['name'])){
							move_uploaded_file($_FILES['photo_post']['tmp_name'],"post/".$_FILES['photo_post']['name']);
							$photo = "post/".$_FILES['photo_post']['name'];
						}else{
							$photo = $_POST['oldphoto'];
						}

						
						
						
						$sql = "UPDATE  post SET title = '$title', des='$des', photo = '$photo' where id='$postid'";

				
						if(mysqli_query($link,$sql)){

							header("location:index.php");

						}else{

							header("location:index.php");
						}

					}


				?>

	            <!-- Post form -->
	            <h4 class="contact-subtitle-1"><i class="fa fa-paper-plane-o"></i>&nbsp; Post Form</h4>
		        <form id="" method="post" class="form" action="edit.php" enctype="multipart/form-data">
		            
		        	<input type="hidden" name="oldphoto" value="<?php echo $postResult['photo'];?>">
		        	<input type="hidden" name="postid" value="<?php echo $postResult['id'];?>">

		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="title" name="title" placeholder="Title" type="text" required value="<?php echo $postResult['title'];?>" />
		            </div>
		            <!-- /Form Field -->		           
		            <!-- Form Field -->
		            <div class="form-group">
		            	<textarea class="form-control required" id="des" name="des" placeholder="des..." rows="5" required><?php echo $postResult['des'];?></textarea>
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<input class="form-control required" id="photo_post" name="photo_post" placeholder="Photo" type="file"  />
		            </div>
		            <!-- /Form Field -->
		            <!-- Form Field -->
		            <div class="form-group">
		            	<button class="btn btn-default form-send" name="post" >EDIT!</button>
		            </div>  
		            <!-- /Form Field -->
		        </form>
		        <!-- /Re Form -->
			</div>			
		</div>
		<!-- /SECTION: BLOG  -->	
 
	

</body>
</html>