<!--
Nick Kinderman - I Hear Banjo Music - Paddle Racer project
4/9/17
logout.php - logout from a user session
This code is modfied from Kristian Guevera's PHP tutorial
Step-by-Step PHP Tutorials for Beginners - Creating your PHP program FROM SCRATCH:
Basic Authentication, Membership and CRUD functionalities
https://www.codeproject.com/Articles/759094/Step-by-Step-PHP-Tutorials-for-Beginners-Creating
-->

<?php
    session_start();
    session_destroy();
    header("location:index.php");
?>
