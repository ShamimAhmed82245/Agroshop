<?php
	$db=mysqli_connect('localhost','root','','agroshop');
	if($db){
		//echo "connection";
	}
	else{
		echo "no connection";
	}
?>