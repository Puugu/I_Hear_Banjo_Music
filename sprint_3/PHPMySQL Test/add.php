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
		header("location:index.php");
	}

  $con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
	{
		$race_name = mysqli_real_escape_string($con, $_POST['race_name']);
		$race_date = mysqli_real_escape_string($con, $_POST['race_date']);
		$location = mysqli_real_escape_string($con, $_POST['location']);
		$description = mysqli_real_escape_string($con, $_POST['description']);
		$boat_class = mysqli_real_escape_string($con, $_POST['boat_class']);

		mysqli_select_db($con, "first_db") or die("Cannot connect to database"); //Connect to database
		foreach($_POST['public'] as $each_check) //gets the data from the checkbox
 		{
 			if($each_check !=null ){ //checks if the checkbox is checked
 				$decision = "yes"; //sets teh value
 			}
 		}

		mysqli_query($con, "INSERT INTO race (race_name, race_date, location, description, boat_class) VALUES ('$race_name','$race_date','$location','$description','$boat_class')"); //SQL query
		header("location: home.php");
	}
	else
	{
		header("location:home.php"); //redirects back to hom
	}
?>
