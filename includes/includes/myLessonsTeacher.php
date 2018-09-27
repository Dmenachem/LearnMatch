<?php
    include 'Header.php';
?>
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/course.css">
<link rel="stylesheet" type="text/css" href="../styles/course_responsive.css">

<style>
.table-curved {
    border-collapse: separate;
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

.bluetext {
    color:blue;
    font-weight: bold;
}

.wrapper {
  overflow: hidden;
}

.title:before {
    
  content:'';
  display: inline-block;
  position: relative;
  left: 3px;
  border: 6px solid transparent;
  border-left-color: #000;
}
.title.active:before {
  left: 0;
  top: 3px;
  border-color: #000 transparent transparent;
}
.title:hover {
  cursor: pointer;
}

.content {
  transition: transform .5s;
  transform: translateY(-100%);
}
.content.show {
  transform: translateY(0);
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
		            <a class="btn btn-primary" href="newTeacherProfile.php" role="button">חזור לפרופיל האישי</a>
			<div class="row">


      
        <!--בקשות שיעור (לפני תאריך) -->
        <h3>בקשות שיעור:</h3><br clear="all" />
        
        <table class="table table-hover table-striped table-curved table-responsive-sm">
                <thead>
                    <tr class="bg-primary">
                        <th class="centerdddd">דוא"ל מורה</th>
                        <th class="centerdddd">דוא"ל תלמיד</th>
                        <th class="centerdddd">שם תלמיד</th>
                        <th class="centerdddd">סוג שיעור</th>
                        <th class="centerdddd">נושא</th>
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
                            <td class="blackFont"><center><?php echo("אין לך בקשות שיעור");?></center></td>
                            
                        </tr>
                        <?php
                            }
                
                
                
                while($row = $result1->fetch_assoc()) {
                    $studentName = getStudentName($row['studentMail'], $userData['email']);
                    ?>
                        <tr>
                            
                            <td class="blackFont"><?php echo $row['teacherMail']?></td>
                            <td class="blackFont"><?php echo $row['studentMail']?></td>
                            
                            <!--student name-->
                            <td class="blackFont"> <?php echo $studentName['firstName'] ?> <?php echo $studentName['lastName']?></td>
                            
                            <td class="blackFont"><?php 
                                if ($row['typeLesson'] == "not_online"){
                                    echo ("שיעור פרטי");
                                }
                                else{
                                    echo ("שיעור אונליין");
                                }
                                ?></td>
                            <td class="blackFont"><?php echo $row['lesson']?></td>
                            
                            <td class="blackFont">
                                <!-- POP UP FORM -->
                                <div class="title">לחץ כדי למלא פרטי שיעור</div>
                                <div id="abc" class="wrapper">
                                <!-- Popup Div Starts Here -->
                                <div id="popupContact" class="content">
                                    <!-- Contact Us Form -->
                                    <form action="update_ask_Happening.php" id="form" method="post" name="form">
                                    <h2>הכנס פרטי שיעור</h2>
                                    <hr>
                                    <label for="date">תאריך</label>
                                    <input id="date" name="date" min="today()" placeholder="הכנס תאריך" type="date" required>
                                    <br>
                                    <label for="time">שעה</label>
                                    <input id="time" name="time" min="09:00" max="21:00" type="time" required>
                                    <br>
                                    <label for="date">מחיר</label>
                                    <input class="text-center" id="price" name="price" placeholder="₪" type="text" required>
                                    <br><label for="date">נושא</label>
                                    <input  class="text-center" id="subject" name="subject" value = "<?php echo $row['lesson']?>" readonly ></textarea>
                                    <div class="row justify-content-md-center">
                                    <div class="row row-lg-4">
                                    <button class="btn btn-primary btn-xs" id="submit" type="submit" name="id" value="<?php echo $row['id']?>" >הכנס שיעור</button>
                                    </div>
                                    
                                </form>
                                </div>
                                </div>
                                <!-- Popup Div Ends Here -->
                                </div>
                                <!-- Display Popup Button -->

                                <!-- DONE POP UP FORM -->
                            </td>
                            <td><form action="update_ask_lesson.php" method="POST"><button class="btn btn-danger btn-sm" type="submit" name="id" value="<?php echo $row['id']?>" >הסר בקשת שיעור</button></form></td>
        
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
                        <th class="centerdddd">דוא"ל מורה</th>
                        <th class="centerdddd">דוא"ל תלמיד</th>
                        <th class="centerdddd">שם תלמיד</th>
                        <th class="centerdddd">נושא</th>
                        <th class="centerdddd">תאריך</th>
                        <th class="centerdddd">שעה</th>
                        <th class="centerdddd">שיעור אונליין</th>
                        <th class="centerdddd"></th>
                        <th class="centerdddd"></th>
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
                    $studentName = getStudentName($row['emailStudent'], $userData['email']);
                    ?>
                        <tr>
                            <td class="blackFont"><?php echo $row['emailTeacher']?></td>
                            <td class="blackFont"><?php echo $row['emailStudent']?></td>
                            <td class="blackFont"><?php echo $studentName['firstName'] ?> <?php echo $studentName['lastName']?></td>
                            <td class="blackFont"><?php echo $row['subject']?></td>
                            <td class="blackFont"><?php echo date("d/m/Y", strtotime($row['dateTime']))?></td>
                            <td class="blackFont"><?php echo $row['time']?></td>
                            <td class="blackFont">
                                <?php 
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
                                         <p class="blackFont">בכדי להתחיל את השיעור הפרטי עם התלמיד, הירשם לפורטל האונליין שלנו בקישור הבא: <a class="biglink" href="http://vmedu164.mtacloud.co.il:5080/openmeetings/" target="_blank">לחץ כאן</a></p>
                                         <p class="blackFont">לאחר הרישום, התחבר וצור קשר עם התלמיד לטובת העברת שם החדר והסיסמה שיצרת.</p>
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
                            <td class="blackFont"><form action="update_view_lesson.php" method="POST"><button class="btn btn-success" name="id" type="submit" value="<?php echo $row['id']?>" >בוצע</button></form></td>
                            <td class="blackFont"><form action="update_lesson.php" method="POST"><button class="btn btn-danger" name="id" type="submit" value="<?php echo $row['id']?>" >לא בוצע</button></form></td>
                        </tr>
        
                    <?php
                    }
                
                
                
                
            }
            
        ?>
             </tbody>
                    </table>
        <h3>כלל השיעורים:</h3>
        <table class="table table-hover table-striped table-bordered table-curved table-responsive-sm">
                <thead>
                    <tr class="bg-primary">
                        <th class="centerdddd">דוא"ל מורה</th>
                        <th class="centerdddd">דוא"ל תלמיד</th>
                        <th class="centerdddd">שם תלמיד</th>
                        <th class="centerdddd">תאריך</th>
                        <th class="centerdddd">שעה</th>
                        <th class="centerdddd">סוג שיעור</th>
                        <th class="centerdddd">נושא</th>
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
                $sql1 = " SELECT * FROM lessonsTeacherStudent WHERE emailTeacher = '".$userMail."'" ;
                $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
                
                while($row = $result1->fetch_assoc()) {
                $studentName = getStudentName($row['emailStudent'], $userData['email']);
                    ?>
                        <tr>
                            <td class="blackFont"><?php echo $row['emailTeacher']?></td>
                            <td class="blackFont"><?php echo $row['emailStudent']?></td>
                            <td class="blackFont"><?php echo $studentName['firstName'] ?> <?php echo $studentName['lastName']?></td>
                            <td class="blackFont"><?php echo date("d/m/Y", strtotime($row['dateTime']))?></td>
                            <td class="blackFont"><?php echo $row['time']?></td>
                            <td class="blackFont"><?php
                            if ($row['typeLesson'] == "not_online"){
                                echo ("שיעור פרונטלי");
                            }
                            else{
                                echo ("שיעור אונליין");
                            }
                            ?></td>
                            <td class="blackFont"><?php echo $row['subject']?></td>
                            <td class="blackFont"><?php echo $row['price']?></td>
                            <td class="blackFont">
                                <?php 
                                    if ($row['paid'] == '1'){
                                        echo ("שולם");
                                    }
                                    elseif ($row['paid'] == '0' && $row['done'] == 0){
                                        echo ("השיעור בוטל");
                                    }
                                    else{
                                        echo ("טרם שולם");
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
<script src="../styles/bootstrap4/popper.js"></script>
<script src="../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../plugins/progressbar/progressbar.min.js"></script>
<script src="../js/course.js"></script>
<script src="my_js.js"></script>

<script>
    $(function() {
  $('.title').click(function() {
  $(this).toggleClass('active').next().children('.content').toggleClass('show');
  });
});
</script>

<?php
    include 'Footer.php'
?>  