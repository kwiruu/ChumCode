<?php 
	$connection = new mysqli('localhost', 'root','','dbcabilif1');
	
	if (!$connection){
		die (mysqli_error($mysqli));
	}
		
?>