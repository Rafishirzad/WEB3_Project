<?php
	$link = mysqli_connect("localhost","root","","student");
							
	$sql = "SELECT  * FROM registration";
	$result = mysqli_query($link,$sql);
	
	$file = fopen("Rigistration.csv", "w+");
	$head = array("id", "student_id", 'Name', "lastname", 'email','phone','photo','password');
	fputcsv($file, $head);
	while($row = mysqli_fetch_assoc($result)){
		$array = array($row['id'], $row['studetn_id'], $row['name'], $row['lname'], $row['email'],$row['phone'],$row['photo'],$row['password']);
		fputcsv($file, $array);

	}
	
	fclose($file);


	
?>