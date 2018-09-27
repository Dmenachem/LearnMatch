<?php
    
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
        
        $email = $_POST['StudentEmail'];
        
        $sql = "SELECT * FROM users WHERE email = '$email' ";
        $query1 = mysqli_query($conn,  $sql);
        
        if (mysqli_num_rows($query1) == 0){
            echo "<script>alert('היי! ראינו שאתה לא רשום - אז בוא תעבור כאן קודם')</script>";
            header ('register_student.php');
        }
        else{
            header ('index.php');
        }
        
        
         $conn->close();
        
?>