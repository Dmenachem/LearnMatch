<?php
   
    session_start();
    
    #session_destroy();
     
    if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] == false)
{
  
  #echo $_SESSION['email'];
}

    
        header('Content-Type: text/html; charset=utf-8');
        $conn = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson") or die("Error " . mysqli_error($conn));
        
        mysqli_set_charset($conn, "utf8");
        
        $id = $_POST["id"];
        var_dump($id);
        $sql = " UPDATE lessonsTeacherStudent SET showData = '0', done = '0' WHERE id = $id ";
        $query1 = mysqli_query($conn,  $sql);
        
        
        header('Location: myLessonsTeacher.php');
        
         $conn->close();
        
?>