<?php
include "functions.php";
?>
<?php
session_start();
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] == false)
{
   
}
?>
<!DOCTYPE html>

<html>
    
    <head>
	        <!--load css-->
	        <link rel="stylesheet" type="text/css" href="../../styles/main_styles.css">
	        <link rel="stylesheet" type="text/css" href="../../css/profile_css.css">
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
    	include '../Header.php'
    	?>
    	<?php
    	    $userData = getUserData($_SESSION['email']);
        ?>
    	 
        
         <aside dir="rtl">
            <h3>שלום <?php echo $userData['firstName'] ?></h3>
                <label>השיעורים שלי</label><br>
                <label>המורים שלי</label><br>
                <label>היסטוריית תשלומים</label><br>
                <label>ערוך פרטים אישיים</label>
            
        </aside>
        
        <main dir="rtl">
       
            <section>
                <form action = "bothProfiles/update_user_data.php" method = post>
                    <table class="table table-hover">
	                <tr>
	                    <td>שם פרטי:</td>
	                    <td><input type="text" name="firstName" value="<?php echo $userData['firstName']?>"></td>
	                </tr>
	                <tr>
	                    <td>שם משפחה</td>
	                    <td><input type="text" name="lastName" value="<?php echo $userData['lastName'] ?>"></td>
	                </tr>
	                <tr>
	                    <td>דואר אלקטרוני:</td>
	                    <td><input type="text" name="email" value="<?php echo $userData['email'] ?>"></td>
	                </tr>
	                 <tr>
	                    <td>תאריך לידה:</td>
	                    <td><input type="date" name="dateOfBirth" value="<?php echo $userData['dateOfBirth'] ?>"></td>
	                </tr>
	                <tr>
    		    		<div id="locationField">
    		        		<td><label for = "autocomplete">כתובת</label> </td>
		    		        <td><input value ="<?php echo $userData['address'] ?>" class="textinput" name = "address" id="autocomplete"
		    				type="text" onchange="firstfunction()" required>*</input></td>
    		    	</tr>
	                 <tr>
	                    <td>מין:</td>
	                    <td><input type="text" id="gender" value="<?php echo $userData['gender'] ?>" name="gender"></td>
	             
                    </table>
    			        <input type="submit" class="btnForm" id="b" name = "submit" onClick ="checkGender()" value="שמור מידע חדש">
                </form>
                
            </section>
            
            
        </main>
    
    
    <?php
        include '../Footer.php'
    ?>
  

