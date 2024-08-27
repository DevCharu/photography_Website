<?php


$server = "localhost";
	$username = "root";
	$password = "";
	$database = "malcolm_db";
	
	//create connection
	$con = mysqli_connect($server,$username,$password,$database);
	
	//check connection
		if (!$con){
			die ("Connection Error ".mysqli_connect_error());
		}
		else {
			echo ("connected Successfully <br>");
		    }
?>