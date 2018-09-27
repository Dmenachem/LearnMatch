<?php
header('Content-Type: text/html; charset=utf-8');
function getUserData($email){
    
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
        
        $query = mysqli_query($conn, "SELECT studentOrTeacher FROM users WHERE email=  '$email'");
        $array = array();
        $res = mysqli_fetch_array($query);
        
        if(in_array(Student, $res)){
            $query2 = mysqli_query($conn, "SELECT * FROM student WHERE email=  '$email'");
            while ($row = $query2->fetch_assoc()) {
                    $array[firstName] = $row[firstName];
                    $array[lastName] = $row[lastName];
                    $array[email] = $row[email];
                    $array[dateOfBirth] = $row[dateOfBirth];
                    $array[address] = $row[address];
                    $array[gender] = $row[gender];
                    $array[numOfStars] = $row[numOfStars];
            }
           
            
        }
        else{
            $query2 = mysqli_query($conn, "SELECT * FROM teachers WHERE email=  '$email'");            
            
            while ($row = $query2->fetch_assoc()) {
                   $array[firstName] = $row[fname];
                    $array[lastName] = $row[lname];
                    $array[email] = $row[email];
                    $array[dateOfBirth] = $row[dob];
                    $array[address] = $row[address];
                    $array[gender] = $row[type];
                    $array[numOfStars] = $row[nos];
                    $array[phone] = $row[phone];
            }
        }
        
         return $array;
        
    
}
function getStudentName($userMail, $tEmail){
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
    
        
          $sql3 = " SELECT student.firstName, student.lastName FROM student INNER JOIN lessonsTeacherStudent ON student.email = lessonsTeacherStudent.emailStudent WHERE lessonsTeacherStudent.emailStudent = '".$userMail."'" ;
          $result3 = mysqli_query($conn, $sql3) or die("Error " . mysqli_error($conn));
        $row2 = $result3->fetch_assoc();
        return $row2;
                    
}

function getTeacherName($userMail, $tEmail){
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
        
        $sql3 = " SELECT teachers.fname, teachers.lname FROM teachers INNER JOIN lessonsTeacherStudent ON teachers.email = lessonsTeacherStudent.emailTeacher WHERE lessonsTeacherStudent.emailTeacher = '".$tEmail."'" ;

      
        $result3 = mysqli_query($conn, $sql3) or die("Error " . mysqli_error($conn));
      
        $row2 = $result3->fetch_assoc();
        return $row2;
                    
}



?>
