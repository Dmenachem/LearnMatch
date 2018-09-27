<?php
    include 'Header.php';
?>
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/course.css">
<link rel="stylesheet" type="text/css" href="../styles/course_responsive.css">

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

	<div class="course ">
		<div class="course_top "></div>
		<div class="container ">
			<div class="row">

				<!-- Panels -->
				<div class="col-lg-12 col-xs-12">
					<div class="tab_panels rtl">

						<!-- Tabs -->
						<div class="course_tabs_container rtl">
							<div class="container rtl">
								<div class="row rtl col-xs-12">
									<div class="col-lg-9 col-xs-9 rtl">
										<div class=" tabs d-flex flex-row align-items-center justify-content-start rtl">
											<div class="tab active rtl">הפרופיל שלי</div>
											<div class="tab"><a>ערוך פרטים אישיים</a></div>
											<div class="tab"><a style="text-decoration: none; color:black;" href = "myLessonsTeacher.php">השיעורים שלי</a></div>
											
											
										</div>
                                        
                                        
                                        
									</div>
								</div>
							</div>		
						</div>


						<!-- Curriculum -->
						<div class="tab_panel curriculum active">
							<div class="curriculum_items">
								<div class="cur_item">
	    
									<div class="cur_contents">
										    <ul>
										<p>
										  
										    
										</p>
                                            
											</ul>
										</div>
									</div>
								</div>
								<div class="cur_item">
									<div class="cur_title_container d-flex flex-row align-items-start justify-content-start">
										<div class="cur_title">הנקודות שלי</div>

									</div>
									<div class="cur_item_content">
                                    <div class="cur_contents">
											<ul>
										<p>
										    יש לך <?php echo $userData['numOfStars'] ?> נקודות.
										    
										</p>
                                            <img src="../images/star.png" alt="stars" width="130" height="70" align="middle">
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
                        
                        <br><br>
                        						<!-- DB -->
						<div class="tab_panel description  float-right rtl">
							<div class="panel_title rtl">עדכן פרטים אישיים:</div><br>
                    <form action = "bothProfiles/update_user_data.php" method = post>
                    <table class="table table-hover">
	                <tr>
	                    <td>שם פרטי:</td>
	                    <td><input type="text" name="firstName" value="<?php echo $_SESSION['firstName']?>"></td>
	                </tr>
	                <tr>
	                    <td>שם משפחה</td>
	                    <td><input type="text" name="lastName" value="<?php echo $_SESSION['lastName'] ?>"></td>
	                </tr>
	                <tr>
	                    <td>דואר אלקטרוני:</td>
	                    <td><input type="text" name="email" disabled value="<?php echo $_SESSION['email'] ?>"></td>
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
	                    </tr>
                    </table>
    			        <input type="submit" class="btn btn-primary" id="b" name = "submit" value="שמור">
                </form>
						</div>


						<!-- Members -->
						<div class="tab_panel members">
							<div class="panel_title rtl"></div>
							<div class="panel_text rtl">
							</div>
						</div>
					</div>
				</div>

				<!-- Sidebar -->

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