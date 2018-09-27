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

        $StudentEmail = $_POST[StudentEmail];
        $TeacherEmail = $_POST[TeacherEmail];
        $lesson = $_POST[lesson];
        $typeLesson = $_POST['typeLesson'];
       foreach ($_POST['typeLesson'] as $typeLesson)
        {
            if ($typeLesson != NULL){
                
                 $sql = "INSERT INTO askForLesson (teacherMail, studentMail, lesson, typeLesson) VALUES ('$TeacherEmail','$StudentEmail', '$lesson', '$typeLesson')";
        
                if ($conn->query($sql) === TRUE) {
                    header('Location: ../index.php');
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
        
                $conn->close();
            }
           
        }
            
        
       
        
?>