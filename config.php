<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'chence');
define('DB_PASSWORD', 'MRTH3tRT3xWp');
define('DB_NAME', 'chence_plesson');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>