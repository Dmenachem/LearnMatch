<!DOCTYPE html>
<head>

<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/course.css">
<link rel="stylesheet" type="text/css" href="../styles/course_responsive.css">

    <!--load css-->
	        <link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
	        <link rel="stylesheet" type="text/css" href="../css/myLessons1.css">
	        <link rel="stylesheet" type="text/css" href="check1.css">
	        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	        
	        <!--load jquery before js-->
	       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	       <script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>

            <!--load js-->
             <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://chence.mtacloud.co.il/js/jsshelter.js"></script>
            <script src="https://chence.mtacloud.co.il/js/menu.js"></script>
        	<script language="JavaScript" type="text/javascript"></script>
            <script src="my_js.js"></script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArcdtxZOTzC0dK3Q9467iDtUC1cv7NtH4&libraries=places&callback=initAutocomplete" async defer></script>
            
 
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="imagetoolbar" content="no" />
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<meta name="keywords" content="Google Maps - address to location" lang="he" />
		<meta name="description" content="" />
		<meta charset="UTF-8">
		<title>פרופיל אישי</title>
        <!--hide div coardnitions onload-->
</head>

<?php
    include "bothProfiles/functions.php";
?>


<?php 
    session_start();
?>

<?php
    include "Header.php";
?>

<body>
        <?php
        $userData = getUserData($_SESSION['email']);
    ?>
    <main dir="rtl">
        <!--בקשות שיעור (לפני תאריך) -->
        <h4>בקשות שיעור:</h4>
        <table>
                <thead>
                    <tr>
                        <td>דוא"ל מורה</td>
                        <td>דוא"ל תלמיד</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
        
        <?php 
            $connection = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson")
            or die("Error " . mysqli_error($connection));
            mysqli_set_charset($connection,"utf8");
            //fetch data from database
            if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
                $userID = $_SESSION['user_id'];
                $userMail = $userData['email'];
                $sql1 = " SELECT * FROM askForLesson WHERE teacherMail = '$userMail' AND showData = 1 " ;
                $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
                
               
                
                 if (mysqli_num_rows($result1)==0){
                     ?>
                        <tr>
                            <td><center><?php    echo("אין לך בקשות שיעור");?></center></td>
                            
                        </tr>
                        <?php
                            }
                
                
                
                while($row = $result1->fetch_assoc()) {
                    ?>
                        <tr>
                            
                            <td><?php echo $row['teacherMail']?></td>
                            <td><?php echo $row['studentMail']?></td>
                            <td>
                                <!-- POP UP FORM -->
                                <div id="abc">
                                <!-- Popup Div Starts Here -->
                                <div id="popupContact">
                                <!-- Contact Us Form -->
                                <form action="update_ask_Happening.php" id="form" method="post" name="form">
                                <img id="close" src="../images/close.png" onclick ="div_hide()">
                                <h2>הכנס פרטי שיעור</h2>
                                <hr>
                                <input id="date" name="date" placeholder="הכנס תאריך" type="date">
                                <input id="price" name="price" placeholder="הכנס מחיר" type="text">
                                <input id="subject" name="subject" placeholder="הכנס נושא"></textarea>
                                <button id="submit" type="submit" name="id" value="<?php echo $row['id']?>" >הכנס שיעור<button>
                                </form>
                                </div>
                                <!-- Popup Div Ends Here -->
                                </div>
                                <!-- Display Popup Button -->
                                <button id="popup" onclick="div_show()" >אשר שיעור</button>
                                <!-- DONE POP UP FORM -->
                            </td>
                            <td><form action="update_ask_lesson.php" method="POST"><button type="submit" name="id" value="<?php echo $row['id']?>" >הסר בקשת שיעור</button></form></td>
        
                        </tr>
        
                    <?php
                    }
                
                
                
                
            }
            
        ?>
             </tbody>
                    </table>
        
        
        <!--השיעור אושר-->
        <h4>שיעורים קרובים:</h4>
        <table>
                <thead>
                    <tr>
                        <td>דוא"ל מורה</td>
                        <td>דוא"ל תלמיד</td>
                        <td>נושא</td>
                        <td>תאריך</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
        
        <?php 
            $connection = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson")
            or die("Error " . mysqli_error($connection));
            mysqli_set_charset($connection,"utf8");
            //fetch data from database
            if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
                $userID = $_SESSION['user_id'];
                $userMail = $userData['email'];
                $sql1 = " SELECT * FROM lessonsTeacherStudent WHERE emailTeacher = '$userMail' AND showData = 1 ORDER BY dateTime " ;
                $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
                
                
                while($row = $result1->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['emailTeacher']?></td>
                            <td><?php echo $row['emailStudent']?></td>
                            <td><?php echo $row['subject']?></td>
                            <td><?php echo $row['dateTime']?></td>
                            <td><form action="update_view_lesson.php" method="POST"><button type="submit" value="<?php echo $row['id']?>" >בוצע</button></form></td>
                            <td><form action="update_lesson.php" method="POST"><button type="submit" value="<?php echo $row['id']?>" >לא בוצע</button></form></td>
                        </tr>
        
                    <?php
                    }
                
                
                
                
            }
            
        ?>
             </tbody>
                    </table>
        
        
        <h5>כלל השיעורים:</h5>
        <table>
                <thead>
                    <tr>
                        <td>דוא"ל מורה</td>
                        <td>דוא"ל תלמיד</td>
                        <td>תאריך</td>
                        <td>נושא</td>
                        <td>מחיר</td>
                    </tr>
                </thead>
                <tbody>
        
        <?php 
            $connection = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson")
            or die("Error " . mysqli_error($connection));
            mysqli_set_charset($connection,"utf8");
            //fetch data from database
            if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
                $userID = $_SESSION['user_id'];
                $userMail = $userData['email'];
                $sql1 = " SELECT * FROM lessonsTeacherStudent WHERE emailTeacher = '".$userMail."'" ;
                $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
            
                while($row = $result1->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><?php echo $row['emailTeacher']?></td>
                            <td><?php echo $row['emailStudent']?></td>
                            <td><?php echo $row['dateTime']?></td>
                            <td><?php echo $row['subject']?></td>
                            <td><?php echo $row['price']?></td>
                        </tr>
        
                    <?php
                    }
                
                
                
                
            }
            
        ?>
             </tbody>
                    </table>
        
    </main>
    
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../styles/bootstrap4/popper.js"></script>
    <script src="../styles/bootstrap4/bootstrap.min.js"></script>
    <script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="../plugins/easing/easing.js"></script>
    <script src="../plugins/parallax-js-master/parallax.min.js"></script>
    <script src="../plugins/progressbar/progressbar.min.js"></script>
    <script src="../js/course.js"></script>


</body>

<?php
    include 'Footer.php'
?>  


