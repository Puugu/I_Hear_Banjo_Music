<!--
Nick Kinderman - I Hear Banjo Music - Paddle Racer project
4/9/17
edit.php - Edit exisitng table entries  
This code is modfied from Kristian Guevera's PHP tutorial
Step-by-Step PHP Tutorials for Beginners - Creating your PHP program FROM SCRATCH:
Basic Authentication, Membership and CRUD functionalities
https://www.codeproject.com/Articles/759094/Step-by-Step-PHP-Tutorials-for-Beginners-Creating
-->

<html>
	<head>
		<title>Paddle Racer Test</title>
	</head>
	<?php
	session_start(); //starts the session
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value
	$id_exists = false;
	?>
	<body>
		<h2>Edit Race</h2>
		<p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
		<a href="logout.php">Click here to logout</a><br/>
		<a href="home.php">Return to Director page</a>
		<h2 align="center">Currently Selected</h2>
		<table border="1px" width="100%">
			<tr>
				<th>Id</th>
				<th>Race Name</th>
				<th>Race Date</th>
				<th>Location</th>
				<th>Description</th>
				<th>Boat Class</th>
			</tr>
			<?php
				if(!empty($_GET['id']))
				{
					$id = $_GET['id'];
					$_SESSION['id'] = $id;
					$id_exists = true;
					$con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
					mysqli_select_db($con,"first_db") or die("Cannot connect to database"); //connect to database
					$query = mysqli_query($con, "Select * from race Where id='$id'"); // SQL Query
					$count = mysqli_num_rows($query);
					if($count > 0)
					{
						while($row = mysqli_fetch_array($query))
						{
							Print "<tr>";
								Print '<td align="center">'. $row['id'] . "</td>";
								Print '<td align="center">'. $row['race_name'] . "</td>";
								Print '<td align="center">'. $row['race_date'] . "</td>";
								Print '<td align="center">'. $row['location'] . "</td>";
								Print '<td align="center">'. $row['description'] . "</td>";
								Print '<td align="center">'. $row['boat_class'] . "</td>";
							Print "</tr>";
						}
					}
					else
					{
						$id_exists = false;
					}
				}
			?>
		</table>
		<br/>
		<?php
		if($id_exists)
		{
		Print '
		<form action="edit.php" method="POST">
			Enter new Race Name: <input type="text" name="race_name"/><br/>
			Enter new Race Date: <input type="text" name="race_date"/><br/>
			Enter new Location: <input type="text" name="location"/><br/>
			Enter new Description: <input type="text" name="description"/><br/>
			Enter new Boat Class: <input type="text" name="boat_class"/><br/>
			<input type="submit" value="Update List"/>
		</form>
		';
		}
		else
		{
			Print '<h2 align="center">There is no data to be edited.</h2>';
		}
		?>
	</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		mysqli_select_db($con,"first_db") or die("Cannot connect to database"); //Connect to database
		$race_name = mysqli_real_escape_string($con, $_POST['race_name']);
		$race_date = mysqli_real_escape_string($con, $_POST['race_date']);
		$location = mysqli_real_escape_string($con, $_POST['location']);
		$description = mysqli_real_escape_string($con, $_POST['description']);
		$boat_class = mysqli_real_escape_string($con, $_POST['boat_class']);
		$id = $_SESSION['id'];
		mysqli_query($con, "UPDATE race SET race_name='$race_name', race_date='$race_date', location='$location', description='$description', boat_class='$boat_class'  WHERE id='$id'") ;
		header("location: home.php");
	}
?>
