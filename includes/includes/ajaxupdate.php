<?php
    $connection = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson")
    or die("Error " . mysqli_error($connection));
    mysqli_set_charset($connection,"utf8");
    
    if(isset($_POST['role']) && isset($_POST['useremail'])){
        if ($_POST['role'] == 'Student'){    
        $sqlquery3="UPDATE `student` SET numOfStars= numOfStars-150 WHERE email = '".$_POST['useremail']."'";
        $result3 = mysqli_query($connection, $sqlquery3) or die("Error " . mysqli_error($connection));
        }
        else {
        $sqlquery4="UPDATE `teachers` SET nos= nos-150 WHERE email = '".$_POST['useremail']."'";
        $result4 = mysqli_query($connection, $sqlquery4) or die("Error " . mysqli_error($connection));
        }
        header ('location:../index.php');
    }
    else{
        echo "AJAX call failed to send post variables";
    }
?>