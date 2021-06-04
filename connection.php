<?php
//this is the connection from-front end to back-end database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dental_db";
// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
