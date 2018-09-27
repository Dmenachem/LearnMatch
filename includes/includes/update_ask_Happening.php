<?php
   
    session_start();

    
        header('Content-Type: text/html; charset=utf-8');
        $conn = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson") or die("Error " . mysqli_error($conn));
        
        mysqli_set_charset($conn, "utf8");
        $id = $_POST["id"];
        
        
        
        
        
        $sql1 = " SELECT * FROM askForLesson WHERE id = $id " ;
        $result1 = mysqli_query($conn, $sql1) or die("Error " . mysqli_error($conn));
        $row = $result1->fetch_assoc();
        
        
        
        $emailT = $_SESSION['email'];
        $emailS = $row['studentMail'];
        $date = $_POST['date'];
        $date1 = strtr($_REQUEST['date'], '/', '-');
        $price = $_POST['price'];
        $subject = $_POST['subject'];
        $typeLesson = $row['typeLesson'];
        $time = $_POST['time'];
        
        
        $sql = " INSERT INTO lessonsTeacherStudent (emailTeacher, emailStudent, dateTime, time, price, showData, subject, done, paid, typeLesson) VALUES ('$emailT', '$emailS', '$date1', '$time', '$price', 1, '$subject', 0 , 0, '$typeLesson')";
        $query1 = mysqli_query($conn,  $sql);
        
        $sql2 = " UPDATE askForLesson SET showData = '0', isSchedule = '1', showStudentData = '0' WHERE id = $id ";
        $result2 = mysqli_query($conn, $sql2) or die("Error " . mysqli_error($conn));
        
        header('Location: myLessonsTeacher.php');
        
        $conn->close();
        
?>