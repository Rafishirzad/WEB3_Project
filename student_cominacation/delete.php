<?php
	

	

	$link = mysqli_connect("localhost","root","","student");

// Delete Photo
	if(isset($_GET['pd'])){

		$id = $_GET['pd'];

		$sql = "DELETE from photo WHERE id='$id'";

		mysqli_query($link,$sql);

		header('location:index.php');

	}



// Delete Post

	if(isset($_GET['postId'])){

		$id = $_GET['postId'];

		$sql = "DELETE from post WHERE id='$id'";

		mysqli_query($link,$sql);

		header('location:index.php');

	}


?>