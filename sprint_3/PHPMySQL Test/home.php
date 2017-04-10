<!--
Nick Kinderman - I Hear Banjo Music - Paddle Racer project
4/9/17
home.php - User login session page (calls add.php)
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
   if($_SESSION['user']){ // checks if the user is logged in
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
   <body>
     <h2>Director Page</h2>
     <p>Hello <?php Print "$user"?>!</p><!--Display's user name-->
        <a href="logout.php">Click here to go logout</a><br/><br/>
        <form action="add.php" method="POST">
           Race Name: <input type="text" name="race_name" /> <br/>
           Race Date: <input type="text" name="race_date" /> <br/>
           Location: <input type="text" name="location" /> <br/>
           Description: <input type="text" name="description" /> <br/>
           Boat Class: <input type="text" name="boat_class" /> <br/>
           <input type="submit" value="Add to list"/>
        </form>
        <h2 align="center">My Races</h2>
    		<table border="1px" width="100%">
    			<tr>
    				<th>Id</th>
    				<th>Race Name</th>
    				<th>Race Date</th>
    				<th>Location</th>
    				<th>Description</th>
    				<th>Boat Class</th>
    				<th>Edit</th>
    				<th>Delete</th>
    			</tr>
    			<?php
    				$con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
    				mysqli_select_db($con, "first_db") or die("Cannot connect to database"); //connect to database
    				$query = mysqli_query($con, "Select * from race"); // SQL Query
    				while($row = mysqli_fetch_array($query))
    				{
    					Print "<tr>";
    						Print '<td align="center">'. $row['id'] . "</td>";
    						Print '<td align="center">'. $row['race_name'] . "</td>";
    						Print '<td align="center">'. $row['race_date'] . "</td>";
    						Print '<td align="center">'. $row['location'] . "</td>";
    						Print '<td align="center">'. $row['description'] . "</td>";
    						Print '<td align="center">'. $row['boat_class'] . "</td>";
    						Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
    						Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
    					Print "</tr>";
    				}
    			?>
    		</table>
        <script>
    			function myFunction(id)
    			{
    			     var r=confirm("Are you sure you want to delete this record?");
    			     if (r==true)
		           {
		  	             window.location.assign("delete.php?id=" + id);
		           }
    			}
		</script>
  </body>
</html>
