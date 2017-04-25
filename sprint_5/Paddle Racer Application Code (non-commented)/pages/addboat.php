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
if(!empty($_GET['idRace']))
{
	$id = $_GET['idRace'];
	$_SESSION['idRace'] = $id;
	$id_exists = true;
  $con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
	if($_SERVER['REQUEST_METHOD'] = "POST") //Added an if to keep the page secured
	{
		$boat_class = mysqli_real_escape_string($con, $_POST['Class_Name']);

		mysqli_select_db($con, "mydb") or die("Cannot connect to database"); //Connect to database
		mysqli_query($con, "INSERT INTO Boat_Class (Class_Name) VALUES ('$boat_class')"); //SQL query
		$query = mysqli_query($con, "Select * from Boat_Class Where Class_Name='$boat_class'"); // SQL Query
		$row = mysqli_fetch_array($query);
		$class_id = $row['Class_ID'];
		mysqli_query($con, "INSERT INTO Race_has_Boat_Class (Race_idRace, Boat_Class_Class_ID) VALUES ( '$id','$class_id')"); //SQL query
		$url = "editrace.php?idRace=$id";
		header("Location: ".$url);
	}
	else
	{
		header("location:home.php"); //redirects back to hom
	}
}
?>
