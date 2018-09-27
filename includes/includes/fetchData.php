<?php

    $servername = "localhost";
    $username = "chence_admin";
    $password = "12345";
    $dbname = "chence_plesson";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    } 
     mysqli_set_charset($conn, "utf8");
       $sql2= "SELECT Username, Name, Type, Date, Comments, File FROM files WHERE" ;
       $result = $conn->query($sql2);
    if ($result->num_rows > 0) {
        echo "<table><tr><th>משתמש</th><th>שם</th><th>קובץ</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Username"]. "</td><td>" . $row["Name"]. " </td><td>" . $row["File"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "לא נמצאו קבצים מתאימים.";
    }
    
?>