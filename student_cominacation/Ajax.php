
<html>

<head>
  <script>
     function showMoreInfo(id){
		 var xmlhttp = new XMLHttpRequest();
		 xmlhttp.onreadystatechange=function()
			  {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
				document.getElementById(id).innerHTML=xmlhttp.responseText;
				}
			  }
			xmlhttp.open("GET","info.php?id="+id);
			xmlhttp.send();
	 }
  </script>
</head>
 <body>
 
 <?php
 $i=0;
 while($i<1){
	$i++;
	  if($i==1){
		 $ii=" Post One";
	 } ?>
	 <p>This is some information about this project ........</p>
	  <p>For More info about The Post Click On the more button</p>
	  <p id='<?php echo $i; ?>'></p>
	  <button onclick ='showMoreInfo(<?php echo $i; ?>)' class="btn btn-primary">More</button>
 <?php
 }

?>
 </body>


</html>