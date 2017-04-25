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
		$name = $_GET['Class_Name'];
		mysqli_query($con, "DELETE FROM Boat_Class WHERE Class_Name='$name'");
		$query = mysqli_query($con, "Select R.* From Race_has_Boat_Class R, Boat_Class B Where R.Boat_Class_Class_ID = B.Class_ID And B.Class_Name = '$name'"); // SQL Query
		$row = mysqli_fetch_array($query);
		$id = $row['Race_idRace'];
		$url = "editrace.php?idRace=$id";
		header("Location:editrace.php?idRace=4");
	}
?>



<!-- Select R.* From Race_has_Boat_Class R, Boat_Class B where R.Boat_Class_Class_ID = B.Class_ID And B.Class_Name = '$name' -->
