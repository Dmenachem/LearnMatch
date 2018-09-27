<?php
    include "bothProfiles/functions.php";
    ?>
<?php 
session_start();
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] == false)
{
    echo "hello";

}
?>
<!DOCTYPE html>


<html>
    
    <head>
	        <!--load css-->
	        <link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
	        <link rel="stylesheet" type="text/css" href="../css/profile_css.css">
	        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	        
	        <!--load jquery before js-->
	       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	       <script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>

            <!--load js-->
             <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://chence.mtacloud.co.il/js/jsshelter.js"></script>
            <script src="https://chence.mtacloud.co.il/js/menu.js"></script>
        	<script language="JavaScript" type="text/javascript"></script>

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
    
    <body>
    <?php
        include 'Header.php'
        ?>
        
    <?php
	    $userData = getUserData($_SESSION['email']);
	?>
        
         <aside dir="rtl">
            <h3>שלום <?php echo $userData['firstName'] ?></h3>
                <label>השיעורים שלי</label><br>
                <label>התלמידים שלי</label><br>
                <label>היסטוריית תשלומים</label><br>
                <label><a href = "bothProfiles/change_personal_data.php">ערוך פרטים אישיים</a> </label>
            
        </aside>
        
        
    <main dir="rtl">
        <section class="sec">
            <div class="to_border">
                <h5>השיעורים האחרונים שלי</h5>
                <center>
                    <label>לשלוף ממסד הנתונים</label>
                </center>
            </div>
        </section>
        
        <section class="sec">
            <div class="to_border">
                <h5>כמות הנקודות שלי</h5>
                <center><label> יש לך <?php echo $userData['numOfStars'] ?> נקודות!</label></center>
            </div>
        </section>
        
        
        
    </main>
    
    
    <?php
        include 'Footer.php'
        ?>
