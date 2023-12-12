<?php

$username = "C##ADMIN";
$password = "ADMIN";
$connection_string = "//localhost:1521/xe";

// Connect to the Oracle database
$conn = oci_pconnect($username, $password, $connection_string);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . oci_error());
}

// Do something with the database
// print "Connected to Oracle database successfully";

?>
