<html>
<body>
<?php
$servername = "localhost";
$username = "chence";		
$password = "MRTH3tRT3xWp";			
$dbname = "chence_plesson";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
header('Content-Type: text/html; charset=utf-8');
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn, "utf8");
$sql="INSERT INTO files (fileName, Subject, Type, Date, Comments, File) VALUES ('".$_POST['fileName']."','".$_POST['Subject']."','".$_POST['Type']."','".$_POST['Date']."','".$_POST['Comments']."','".$_POST['File']."');"; 
$conn->query($sql);
$conn->close();
?>  

<script>window.location.assign("uploadAccepted.php");</script>;
</body>
</html>