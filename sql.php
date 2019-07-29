<?php

         /* $dbhost = "localhost";
         $dbuser = "root";
         $dbpass = "";
         $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
         if(! $conn ) {
            echo 'Connected failure<br>';
         }
         
         mysqli_select_db( $conn, "tms" );
		//echo 'Connected successfully<br>';
         //Write some code here
         mysqli_close($conn); */
		 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
/* else
{
	echo 'Connected successfully<br>';
} */
?>
