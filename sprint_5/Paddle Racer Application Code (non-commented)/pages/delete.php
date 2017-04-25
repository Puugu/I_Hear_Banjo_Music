<!--
Nick Kinderman - I Hear Banjo Music - Paddle Racer project
4/9/17
delete.php - delete existing table row
This code is modfied from Kristian Guevera's PHP tutorial
Step-by-Step PHP Tutorials for Beginners - Creating your PHP program FROM SCRATCH:
Basic Authentication, Membership and CRUD functionalities
https://www.codeproject.com/Articles/759094/Step-by-Step-PHP-Tutorials-for-Beginners-Creating
-->

<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:login.php"); // redirects if user is not logged in
	}
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		mysqli_select_db($con,"mydb") or die("Cannot connect to database"); //Connect to database
		$id = $_GET['idRace'];
		mysqli_query($con, "DELETE FROM race WHERE idRace='$id'");
		header("location: home.php");
	}
?>
