<?php
$con = mysqli_connect ( "localhost", "root", "1234" );
// Check connection
if (mysqli_connect_errno ()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error ();
}

// Create database
$sql = "CREATE DATABASE my_db";
if (mysqli_query ( $con, $sql )) {
	echo "Database my_db created successfully";
} else {
	echo "Error creating database: " . mysqli_error ( $con );
}
?>