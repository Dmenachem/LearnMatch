<!DOCTYPE html>
<?php
    include "bothProfiles/functions.php";
    ?>
<?php 
session_start();
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] == false)
{
    #not connected
    $userData = "אינך מחובר";
}
else{
    #connected 
    $userData = getUserData($_SESSION['email']);
}
?>



<html>
    
    <head>
	        <!--load css-->
	        <link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
	        <link rel="stylesheet" type="text/css" href="../css/public_profile_teacher1.css">
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
		<title>LearnMatch</title>
        <!--hide div coardnitions onload-->
        
    </head>
    
    <body >
    <?php
        include 'Header.php';
        ?>
        
    <?php
	    
	    $teacherData =  getUserData($_GET['temail']);
	    $birthday = $teacherData['dob'];
	?>
	
	
	
<?php 
    $connection = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson")
    or die("Error " . mysqli_error($connection));
    mysqli_set_charset($connection,"utf8");
    //fetch data from database
    $sql2 = "SELECT * FROM teachers WHERE email = '".$teacherData['email']."'" ;
    $result2 = mysqli_query($connection, $sql2) or die("Error " . mysqli_error($connection));

?>
    <main dir="rtl">
        <div class="col-xs-1" align="center">
        <h3><center><?php echo $teacherData['firstName']?> <?php echo $teacherData['lastName']?></center></h3>
        <hr>
        
        <div class="d-flex justify-content-center flex-column">
        
        <br>

						<div class="instructor_image_container">
							<div class="instructor_image">
							    
							    <?php
							        while ($recordeset=mysqli_fetch_array($result2,MYSQLI_ASSOC))
                                    {
                                        $genderOfTeacher=$recordeset["type"];
                                    }
    
							    if ($genderOfTeacher=='female') {
                                    echo '<img src="../images/female.png" alt=""/>';
                                } else {
                                    echo '<img src="../images/male.png" alt=""/>';
                                }
                                ?>
							    <!--<img src="../images/instructor_3.jpg">-->
							</div>
						</div>
						<br>
						<div class="instructor_title">קצת עליי</div>
						<div class="instructor_text">
							<p>            צרו קשר אם אתם מעוניינים בשיעור פרטי בנושאים הבאים:
            <table>
                
                <tbody>
                     <?php 
                        $connection = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson")
                        or die("Error " . mysqli_error($connection));
                        mysqli_set_charset($connection,"utf8");
                        //fetch data from database
                        $sql1 = " SELECT * FROM lessons_2 WHERE temail = '".$teacherData['email']."'" ;
                        $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
                        while($row = $result1->fetch_assoc()) {
                     ?>
                        <tr class="blackFont">
                            <td class="blackFont">
                                <?php echo $row['lesson']?>
                            </td>
                        </tr>
                        <?php
                           
                        }
                    ?>
                </tbody>
            </table>
            </p>
						</div>
     
        
        <form action="send_ask.php" id="form" method="POST">
              <table class="table table-hover">

	          <tr>
	            <td>דוא"ל תלמיד</td>
	              <td><input type="text" name="StudentEmail" id="SEmail" placeholder="הכנס דואר אלקטרוני"
	              value = "<?php
    	                if(isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] == false){
    	                    $userData = getUserData($_SESSION['email']);
    	                    echo $userData['email'];
    	                }
	                ?>"
	              requiered></td>
	            
	          </tr>
	          
	         
	              <input type="hidden" name="TeacherEmail" readonly="true" value="<?php echo $teacherData['email'] ?>">
	         
	          <tr>
	              <td>בחר תחום לימוד:</td>
	              <td><select name="lesson"
                        <?php
                            $conn = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson");
                            mysqli_set_charset($conn,"utf8");
                            $result = mysqli_query($conn, "SELECT * FROM lessons_2 WHERE temail = '".$teacherData['email']."'");
                            ?>
                            <select name="dynamic_data">
                            <?php
                            $i=0;
                            while($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?=$row["lesson"];?>"><?=$row["lesson"];?></option>
                            <?php
                            $i++;
                            }
                            ?>
                            </select>
                            <?php
                            mysqli_close($conn);
                            ?>	              
	              
	              </td>
	          </tr>
	          <tr>
	              <td>בחר סוג שיעור:</td>
	              <td>
	                  <select name="typeLesson[]">
	                      <option value="not_online">פרונטלי</option>
	                      <option value="online">אונליין</option>
	                  </select>
	              </td>
	          </tr>
	          <tr>
	            <td>
	               <?php 
	                if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == false)
                    {  
                        #not connected
                        ?>
                        <a href= "register_student.php">לפני שתוכל לקבוע שיעור עלייך להרשם. לחץ כאן!</a>
                        <?php
                    }
                    else{
                    
                    ?>
                        <a href= "javascript:%20checkEmail();" name="send" id="send" value="<?php echo $row['id']?>">שלח בקשת שיעור </a>
    <?php
}
?>

	               
	           </td>
	          </tr>
	          
            
            </table>
        </form>
        </div>
    </main>
</div>

    
    
    <?php
        include 'Footer.php'
        ?>
