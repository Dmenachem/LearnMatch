<?php
        header('Content-Type: text/html; charset=utf-8');
    
        $servername = "zebra.mtacloud.co.il";
        $username = "chence";
        $pass = "MRTH3tRT3xWp";
        $dbname = "chence_plesson";

        $email = "iris.spivak1@gmail.com";
        // Create connection
        $conn = new mysqli($servername, $username, $pass, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        mysqli_set_charset($conn, "utf8");
      
    
     $email1 = $_POST[email];
     $firstName = $_POST[firstName];
     $lastName = $_POST[lastName];
         
         
    $query = mysqli_query($conn, "UPDATE users SET firstName='$firstName' WHERE email = '$email1'");
   
     $dateOfBirth = $_POST[dateOfBirth];
     $gender = $_POST[gender];
     $address = $_POST[address];
         
     $date1 = strtr($_REQUEST['dateOfBirth'], '/', '-');
    
     $query1 = mysqli_query($conn, "UPDATE student (email, firstName, lastName, dateOfBirth,gender,address) VALUES ('$email1', '$firstName', '$lastName','$date1', '$gender', '$address')");
     
     $conn->close();
    
 
        
        
?>