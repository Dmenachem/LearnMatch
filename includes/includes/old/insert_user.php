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
        
        if(isset($_POST['email'])){
            $email=$_POST[email];
            
            $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            
            if(mysqli_num_rows($query)>0){
                echo ("<script LANGUAGE='JavaScript'>
                window.alert('האי-מייל כבר רשום במערכת!');
                window.location.href='register_student.php';
                </script>");
            }
            
            else{
                $email = $_POST[email];
                $password = $_POST[password];
                $firstName = $_POST[firstName];
                $lastName = $_POST[lastName];
                    
                $sql = "INSERT INTO users (email, password, firstName, lastName) VALUES ('$email', '$password', '$firstName', '$lastName')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                
                $conn->close();
                
                $servername1 = "zebra.mtacloud.co.il";
                $username1 = "chence";
                $pass1 = "MRTH3tRT3xWp";
                $dbname1 = "chence_plesson";
                
                // Create connection
                $conn1 = new mysqli($servername1, $username1, $pass1, $dbname1);
                // Check connection
                if ($conn1->connect_error) {
                    die("Connection failed: " . $conn1->connect_error);
                } 
                
                mysqli_set_charset($conn1, "utf8");
                
                $email = $_POST[email];
                $password = $_POST[password];
                $firstName = $_POST[firstName];
                $lastName = $_POST[lastName];
                $dateOfBirth = $_POST[dateOfBirth];
                $gender = $_POST[gender];
                $address = $_POST[address];
                    
                $date1 = strtr($_REQUEST['dateOfBirth'], '/', '-');
                
                
                $sql = "INSERT INTO student (email, password, firstName, lastName, dateOfBirth,gender,address) VALUES ('$email', '$password', '$firstName', '$lastName','$date1', '$gender', '$address')";
                
                if ($conn1->query($sql) === TRUE) {
                    header('Location: ../dor-test/index.html');
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn1->error;
                    }
                
                $conn1->close();
          
            }
        }
        
        
?>