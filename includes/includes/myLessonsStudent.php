<?php
    include 'Header.php';
?>
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/course.css">
<link rel="stylesheet" type="text/css" href="../styles/course_responsive.css">
<script>
$(document).ready(function(){
    $("#exampleModal").click(function(){
        $("#FormToggle").toggle();
    });
});
</script>

<style>
.table-curved {
    border-collapse: separate;
}

.bluetext {
    color:blue;
    font-weight: bold;
}

.table-curved {
    border: solid #ccc 1px;
    border-radius: 12px;
}
.table-curved td, .table-curved th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
}
.table-curved tr > *:first-child {
    border-left: 0px;
}
.table-curved tr:first-child > * {
    border-top: 0px;
}

  .remove-all-styles {
    all: revert;
  }
</style>

<?php
    include "bothProfiles/functions.php";
?>


<?php 
    session_start();
?>

<?php
    $userData = getUserData($_SESSION['email']);
?>


<?php 
    $connection = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson")
    or die("Error " . mysqli_error($connection));
    mysqli_set_charset($connection,"utf8");
    //fetch data from database
    if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
        $userID = $_SESSION['user_id'];
        $sql1 = "SELECT * FROM lessons_payments WHERE studentID=$userID";
        $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
    }
    
?>




	<!-- Intro -->

	<div class="home2">
		<div class="home_background2" style="background-image: url(../images/index_background.jpg);"></div>
		<div class="home_content">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h1 class="home_title">הפרופיל שלי</h1>
						<h4>
						    <U><?php echo $_SESSION['firstName']?> <?php echo $_SESSION['lastName']?></U>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Course -->

	<div class="course"><br><br><br>
		<div class="container rtl">
		            <a class="btn btn-primary" href="newstudentprofile.php" role="button">חזור לפרופיל האישי</a>
			<div class="row">


<?php
        $userData = getUserData($_SESSION['email']);
    ?>
      
        <!--בקשות שיעור (לפני תאריך) -->
        <h3>בקשות שיעור:</h3><br clear="all" />
        
        <table class="table table-hover table-striped table-curved table-responsive-sm">
                <thead>
                    <tr class="bg-primary">
                        <th class="centerdddd">דוא"ל תלמיד</th>
                        <th class="centerdddd">דוא"ל מורה</th>
                        <th class="centerdddd">שם מורה</th>
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
                $sql1 = " SELECT * FROM askForLesson WHERE studentMail = '$userMail' AND showStudentData = 1 " ;
                $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
                
               
                 if (mysqli_num_rows($result1)==0){
                     ?>
                        <tr>
                            <td class="blackFont"><center><?php    echo("לא שלחת בקשות לשיעורים");?></center></td>
                            
                        </tr>
                        <?php
                            }
                
                
                
                while($row = $result1->fetch_assoc()) {
                    $teacherName = getTeacherName($row['studentMail'], $row['teacherMail']);

                    ?>
                        <tr>
                            
                            <td class="blackFont"><?php echo $row['studentMail']?></td>
                            <td class="blackFont"><?php echo $row['teacherMail']?></td>
                            <td class="blackFont"><?php echo $teacherName['fname'] ?> <?php echo $teacherName['lname']?></td>
                            <td><form action="update_remove_ask.php" method="POST"><button class="btn btn-danger btn-sm" type="submit" name="id" value="<?php echo $row['id']?>" >הסר בקשת שיעור</button></form></td>
        
                        </tr>
        
                    <?php
                    }
                
                
                
                
            }
            
        ?>
             </tbody>
                    </table>
        
        <!--השיעור אושר-->
        
        <h3>שיעורים קרובים:</h3>
        <table class="table table-hover table-striped table-bordered table-curved table-responsive-sm">
                <thead>
                    <tr class="bg-primary">
                        <th class="centerdddd">דוא"ל תלמיד</th>
                        <th class="centerdddd">דוא"ל מורה</th>
                        <th class="centerdddd">שם מורה</th>
                        <th class="centerdddd">נושא</th>
                        <th class="centerdddd">תאריך</th>
                        <th class="centerdddd">שעה</th>
                        <th class="centerdddd">סוג שיעור</th>
                        <th class="centerdddd">מחיר</th>
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
                $sql1 = " SELECT * FROM lessonsTeacherStudent WHERE emailStudent = '$userMail' AND showData = 1 ORDER BY dateTime " ;
                $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
                
                
                while($row = $result1->fetch_assoc()) {
                    $teacherName = getTeacherName($row['emailStudent'], $row['emailTeacher']);
                    ?>
                        <tr>
                            <td class="blackFont"><?php echo $row['emailStudent']?></td>
                            <td class="blackFont"><?php echo $row['emailTeacher']?></td>
                            <td class="blackFont"><?php echo $teacherName['fname'] ?> <?php echo $teacherName['lname']?></td>
                            <td class="blackFont"><?php echo $row['subject']?></td>
                            <td class="blackFont"><?php echo date("d/m/Y", strtotime($row['dateTime']))?></td>
                            <td class="blackFont"><?php echo $row['time']?></td>
                            <td class="blackFont"><?php 
                                    $today = date("Y-m-d");
                                    if ($today == $row['dateTime'] && $row['typeLesson'] == "online"){
                                        ?> 
                                        
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                          הכנס לשיעור אונליין!
                                        </button>
                                        
                                        <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <h3 class="modal-title blackFont" id="exampleModalLongTitle">שיעור אונליין</h3>
                                        <hr>
                                      <div class="modal-body">
                                        <p class="blackFont">ברוכים הבאים למערכת האונליין של LearnMatch!</p>
                                         <p class="blackFont">בכדי להתחיל את השיעור שלכם עם המורה הפרטי, הירשמו לפורטל האונליין שלנו בקישור הבא: <a class="biglink" href="http://vmedu164.mtacloud.co.il:5080/openmeetings/" target="_blank">לחץ כאן</a></p>
                                         <p class="blackFont">לאחר הרישום, התחבר וצור קשר עם המורה לטובת קבלת שם החדר והסיסמה.</p>
                                         <p class="blackFont">נתקלת בבעיה? <br>ניתן ליצור קשר עם הצוות הטכני שלנו לטובת קבלת מענה מהיר
                                         במייל הבא: <a target="_blank" href="mailto:LearnnMatch@Gmail.com">LearnnMatch@gmail.com</a></p>
                                         <p class="bluetext">לימוד מהנה, צוות LearnMatch</p>
                                      </div>
                                      <div class="modal-footer">
                                          <div class="col-md-12 text-center">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">חזור לפרופיל</button>      
                                          </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                                                        
                                        
                                        
                                        <?php
                                    }
                                    elseif ($today != $row['dateTime'] && $row['typeLesson'] == "online"){
                                        echo ("שיעור אונליין-המתן לתאריך");
                                    }
                                    else{
                                        echo ("שיעור פרונטלי");
                                    }
                                ?>
                                </td>
                            
                            <td class="blackFont"><?php echo '₪' ?><?php echo $row['price']?></td>
                            
                        </tr>
        
                    <?php
                    }
                
                
                
                
            }
            
        ?>
             </tbody>
                    </table>
        
        
        <h3>כלל השיעורים:</h3>
    
  
        <table class="table table-hover table-striped table-bordered table-curved table-responsive-sm" >
                <thead>
                    <tr class="bg-primary">
                        <th class="centerdddd">דוא"ל תלמיד</th>
                        <th class="centerdddd">דוא"ל מורה</th>
                        <th class="centerdddd">שם מורה</th>
                        <th class="centerdddd">תאריך</th>
                        <th class="centerdddd">שעה</th>
                        <th class="centerdddd">נושא</th>
                        <th class="centerdddd">סוג שיעור</th>
                        <th class="centerdddd">מחיר</th>
                        <th class="centerdddd">תשלום</th>
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
                $sql1 = " SELECT * FROM lessonsTeacherStudent WHERE emailStudent = '".$userMail."' ORDER BY dateTime DESC " ;
                $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
            
                while($row = $result1->fetch_assoc()) {
                    $teacherName = getTeacherName($row['emailStudent'], $row['emailTeacher']);
                    ?>
                        <tr>
                            <td class="blackFont"><?php echo $row['emailStudent']?></td>
                            <td class="blackFont"><?php echo $row['emailTeacher']?></td>
                            <td class="blackFont"><?php echo $teacherName['fname'] ?> <?php echo $teacherName['lname']?></td>
                            <td class="blackFont"><?php echo date("d/m/Y", strtotime($row['dateTime']))?></td>
                            <td class="blackFont"><?php echo $row['time']?></td>
                            <td class="blackFont"><?php echo $row['subject']?></td>
                            <td class="blackFont"><?php 
                            if ($row['typeLesson'] == "not_online"){
                                echo ("שיעור פרונטלי");
                            }
                            else{
                                echo ("שיעור אונליין");
                            }
                            ?></td>
                            <td class="blackFont"><?php echo '₪' ?><?php echo $row['price']?></td>
                            <td class="blackFont"><?php
                            if($row['paid'] == '1' && $row['done'] == '1'){
                                echo("שיעור שולם");
                            }
                            elseif ($row['done'] == '0' &&  $row['showData'] == '1') {
                            
                                echo("ממתין למורה לאישור ביצוע שיעור");
                            }
                            elseif ($row['done'] == '0' && $row['showData'] == '0'){
                                echo ("השיעור בוטל");
                            }
                            else{    
                                ?>
                                <!--<button type="button" id="clickme">לחץ לתשלום</button>
                                https://www.paypal.com/cgi-bin/webscr
                                -->
                                    <form  id="book" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                    
                                      <!-- Identify your business so that you can collect the payments. -->
                                      <input type="hidden" name="business" value="learnnmatch-facilitator@gmail.com">
                                      <input type="hidden" name="custom" value="<?php echo $row['emailTeacher']?>">
                                      <!-- Specify a Buy Now button. -->
                                      <input type="hidden" name="cmd" value="_xclick">
                                    
                                      <!-- Specify details about the item that buyers will purchase. -->
                                      <input type="hidden" name="item_name" value="Price">
                                      
                                      <input type="hidden" name="currency_code" value="ILS">
                                    
                                      <!-- Provide a drop-down menu option field with prices. -->
                                      <input type="hidden" name="on1" value="Price">מחיר לתשלום ₪ <br />
                                      <select name="os1">
                                        <option value="hours1"><?php echo $row['price']?></option>
                                      </select> <br />
                                    
                                      <!-- Specify the price that PayPal uses for each option. -->
                                      <input type="hidden" name="option_index" value="1">
                                      <input type="hidden" name="option_select0" value="hours1">
                                      <input type="hidden" name="option_amount0" value="<?php echo $row['price']?>">
                                    <br>
                                      <input type="hidden" name="notify_url" value="http://chence.mtacloud.co.il/includes/paypal/ipn.php">
                                      <input type="hidden" name="cancel_return" value="http://chence.mtacloud.co.il/includes/myLessonsStudent.php">
                                      <input type="hidden" name="return" value="http://chence.mtacloud.co.il/includes/myLessonsStudent.php">
                                      <!-- Display the payment button. -->
                                      <input type="image" name="submit" border="0"
                                        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif"
                                        alt="Buy Now">
                                      <img alt="" border="0" width="1" height="1"
                                        src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
                                    
                                    </form>
                                
                               
                                <?php
                            }
                            ?></td>
                        </tr>
        
                    <?php
                    }
                
                
            }
            
        ?>
             </tbody>
                    </table>
        </div>
        

			</div>
		</div>


<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../plugins/progressbar/progressbar.min.js"></script>
<script src="../js/course.js"></script>

<?php
    include 'Footer.php'
?>  