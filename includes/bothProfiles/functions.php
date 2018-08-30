<?php
header('Content-Type: text/html; charset=utf-8');
function getUserData(){
    
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
        
        $query = mysqli_query($conn, "SELECT studentOrTeacher FROM users WHERE email= '$email'");
        $array = array();
        $res = mysqli_fetch_array($query);
        if(in_array(Student, $res)){
            $query2 = mysqli_query($conn, "SELECT * FROM student WHERE email= '$email'");
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
            $query2 = mysqli_query($conn, "SELECT firstName FROM teachers WHERE email= '$email'");            
            
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
        
         return $array;
        
    
}



?>
