<html>
<meta charset="utf-8" />
<body>
<?php
session_start();
$uid = $_SESSION["email"];

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

$name2 = $_FILES['File']['name'];
$tmp_name = $_FILES['File']['tmp_name'];
$location = "../files/";
		if(move_uploaded_file($tmp_name, $location.$name2)){
			mysqli_set_charset($conn, "utf8");
			$sql = "INSERT INTO files (fileName, Subject, Type, Date, Comments, File) VALUES ('$name2','".$_POST['Subject']."','".$_POST['Type']."','".$_POST['Date']."','".$_POST['Comments']."', '$location$name2')";
        	$conn->query($sql);
        	$sql2= "UPDATE student SET numOfStars=numOfStars+150 WHERE email='$uid'";
        	$conn->query($sql2);
        }
        else {
            echo "<script>alert('הפרטים שהוזנו אינם תקינים! אנא מלא את הטופס בשנית');</script>";
        }
        
$conn->close();
?>
<script>window.location.assign("uploadAccepted.php");</script>;
</body>
</html>