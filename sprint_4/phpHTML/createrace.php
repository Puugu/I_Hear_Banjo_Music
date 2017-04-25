<!--
Nick Kinderman - I Hear Banjo Music - Paddle Racer project
4/17/17
create.php - insert information to database
The HTML code is modified from Dean Dixon's and Jonathan Bowie's work from Sprint 1-3
The PHP code is modfied from Kristian Guevera's PHP tutorial
Step-by-Step PHP Tutorials for Beginners - Creating your PHP program FROM SCRATCH:
Basic Authentication, Membership and CRUD functionalities
https://www.codeproject.com/Articles/759094/Step-by-Step-PHP-Tutorials-for-Beginners-Creating
-->

<html>

<head>
    <link href="cover.css" rel="stylesheet">
    <link href="createrace.css" rel="stylesheet"> <!-- overide cover css to align fields nicely -->
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
    <div class="site-wrapper">

        <div class="site-wrapper-inner">

            <div class="cover-container">

                <div class="masthead clearfix">

                </div>

               <!-- Moved Navigation bar out of masthead clearfix so it would be static for form -->
               <div class="inner">

                        <nav>
                            <div class="topnav">
                                <ul class="nav masthead-nav">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="createrace.html">Create Race</a></li>
                                    <li><a href="editrace.html">Edit Race</a></li>
                                    <li><a href="#">Add/Edit Registration</a></li>
                                    <li><a href="#">Time Race</a></li>
                                    <li><a href="results.html">Results</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                <div class="inner cover">
					<div>


            <p>Hello <?php Print "$user"?>!</p><!--Display's user name-->
               <a href="logout.php">Click here to logout</a><br>
               <a href="home.php">Return to Director page</a>
               <br/><br/>

               <h2>Create Race</h2>
               <form action="add.php" method="POST" id="bform">
                  Race Name: <input type="text" name="Race_Name" /> <br/>
                  Race Date: <input type="text" name="Date" /> <br/>
                  Location: <input type="text" name="Location" /> <br/>
                  Description: <input type="text" name="Description_Full" /> <br/>
                  <input type="submit" value="Submit"/>
               </form>

					</div>
                    <p>Framework for I Hear Banjo Music's Paddle Racer Website.</p>
                </div>

                <div class="mastfoot">
                    <div class="inner">

                    </div>
                </div>

            </div>

        </div>

    </div>
</body>
</html>
