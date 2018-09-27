<?php
   
    session_start();
    
    #session_destroy();
     
    if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] == false)
{
  
  #echo $_SESSION['email'];
}

    
        header('Content-Type: text/html; charset=utf-8');

        $servername = "zebra.mtacloud.co.il";
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
        
        $id = $_POST["id"];
        $sql = "UPDATE lessonsTeacherStudent SET showData = '0', done = '1' WHERE id = $id ";
        $query1 = mysqli_query($conn,  $sql);
        
        header('Location: myLessonsTeacher.php');
        $conn->close();
        
?>