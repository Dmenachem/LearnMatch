
<?php
//Connecting to sql db.
$connection = mysqli_connect("localhost", "chence_admin", "12345","chence_plesson"); // Establishing Connection with Server


$connection->set_charset("utf8");

$db = mysqli_select_db($connection, "chence_plesson"); // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$email = $_POST['email'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];

$exp = $_POST['exp'];
$price = $_POST['price'];
$priceg = $_POST['priceg'];
$address = $_POST['address'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$type = $_POST['type'];

$dob = $_POST["dob"];
$day1 = strtotime($_POST["dob"]);
$day1 = date('Y-m-d H:i:s', $day1); //now you can save in DB


//Sending form data to sql db.
if($email!='' ||$password !='' ||$fname !='' ||$lname!='' ||$phone !='' ||$dob !='' ||$exp !='' ||$price!='' ||$priceg!='' ||$address !='' ||$lat!='' ||$lng !=''||$type!=''){

$query = mysqli_query($connection,"insert into teachers(email,password,fname,lname,phone,dob,exp,price,priceg,address,lat,lng,type) values ('$email','$password','$fname','$lname','$phone','$dob','$exp','$price','$priceg','$address','$lat','$lng','$type')",MYSQLI_STORE_RESULT);
$query2 = mysqli_query($connection,"insert into users(firstName,lastName,email,password) values ('$fname','$lname','$email','$password')",MYSQLI_STORE_RESULT);

    echo  '<script type="text/javascript">alert("hello!");</script>';


}

}
mysqli_close($connection); // Closing Connection with Server
  header("Location: https://chence.mtacloud.co.il/");
  exit;
?>     
