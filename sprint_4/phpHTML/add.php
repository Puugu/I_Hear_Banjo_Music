<!--
Nick Kinderman - I Hear Banjo Music - Paddle Racer project
4/9/17
add.php - insert information to database
This code is modfied from Kristian Guevera's PHP tutorial
Step-by-Step PHP Tutorials for Beginners - Creating your PHP program FROM SCRATCH:
Basic Authentication, Membership and CRUD functionalities
https://www.codeproject.com/Articles/759094/Step-by-Step-PHP-Tutorials-for-Beginners-Creating
-->

<?php
	session_start();
	if($_SESSION['user']){
	}
	else{
		header("location:index.html");
	}

  $con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
	{
		$race_name = mysqli_real_escape_string($con, $_POST['Race_Name']);
		$race_date = mysqli_real_escape_string($con, $_POST['Date']);
		$location = mysqli_real_escape_string($con, $_POST['Location']);
		$description = mysqli_real_escape_string($con, $_POST['Description_Full']);

		mysqli_select_db($con, "paddle_db") or die("Cannot connect to database"); //Connect to database
		mysqli_query($con, "INSERT INTO race (Race_Name, Date, Location, Description_Full) VALUES ('$race_name','$race_date','$location','$description')"); //SQL query
		header("location:home.php");
	}
	else
	{
		header("location:home.php"); //redirects back to hom
	}
?>
