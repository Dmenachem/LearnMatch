<?php
$host_name = "localhost";
$database = "chence_plesson"; // Change your database name
$username = "chence";          // Your database user id 
$password = "MRTH3tRT3xWp";          // Your password

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host='.$host_name.';dbname=subjects'.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
?>