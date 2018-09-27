<?php
   
    session_start();
    
    #session_destroy();
     
    if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] == false)
{
  
  #echo $_SESSION['email'];
}

    
        header('Content-Type: text/html; charset=utf-8');

        $servername = "localhost";
        $username = "chence";
        $pass = "MRTH3tRT3xWp";
        $dbname = "chence_plesson";

        // Create connection
        $conn = new mysqli($servername, $username, $pass, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        mysqli_set_charset($conn, "utf8");
        
        #get the user email to update only his details
        $email = $_SESSION['email'];
        
        #$email1 = $_POST[email];
        $firstName = $_POST[firstName];
        $lastName = $_POST[lastName];
        $dateOfBirth = $_POST[dateOfBirth];
        $gender = $_POST[gender];
        $address = $_POST[address];
        $date1 = strtr($_REQUEST['dateOfBirth'], '/', '-');
        
        $query = mysqli_query($conn, "SELECT studentOrTeacher FROM users WHERE email= '$email'");
        $array = array();
        $res = mysqli_fetch_array($query);

        $sql = "UPDATE users SET firstName = '$firstName', lastName = '$lastName' WHERE email= '$email'";
       
        $query1 = mysqli_query($conn,  $sql);
        
        
            
            #check if user is STUDENT
            if(in_array(Student, $res)){
                $query2 = mysqli_query($conn, "UPDATE student SET firstName='$firstName', lastName='$lastName', dateOfBirth='$date1', gender='$gender', address='$address' WHERE email = '$email'");
                
            }
            
            #user is teacher
            else{
                 $query2 = mysqli_query($conn, "UPDATE teachers SET fname='$firstName', lname='$lastName', dob='$date1', type='$gender', address='$address' WHERE email = '$email'");
                
                
            }
        
       
        #header('../newstudentprofile.php');
        echo '<script language="javascript">';
        echo 'alert("הפרופיל עודכן בהצלחה!")';
        echo '</script>';
        echo "<script>window.location.href='../newstudentprofile.php';</script>";
        #header("location: ../newstudentprofile.php");
        
         $conn->close();
        
?>