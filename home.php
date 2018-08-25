<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<?php 
    $page = 'index';  include 'HomeHeader.php';
    $connection = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson")
    or die("Error " . mysqli_error($connection));
    mysqli_set_charset($connection,"utf8");
    //fetch data from database
    $sql1 = "select subject from subjects order by subject asc";
    $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
?>
<!-- Home -->

	<div class="home">
		<div class="home_background" style="background-image: url(images/index_background.jpg);"></div>
		<div class="home_content">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h1 class="home_title">מצא מורה פרטי</h1><br><br>
				<!-- Form -->
				<div class="container"
					<div class="contact_form_container">
						<form action="#" id="contact_form" class="contact_form" method="post">
							<div class="row contact_row">
								<div class="col-lg-6 contact_col">
									<input list="Subjects" class="form_input" onfocus="this.value=''" placeholder="תחום לימוד" required="required">
									<datalist id="Subjects">
									 <?php while($row = mysqli_fetch_array($result1)) { ?>
                                    <option value="<?php echo $row['subject']; ?>"><?php echo $row['subject']; ?></option>
                                    <?php } ?>
									</datalist>
								</div>

								<div class="col-lg-6 contact_col" id="locationField">
									<input id="autocomplete" type="text" class="form_input" placeholder="עיר לימוד" required="required">
								</div> 
								
								
								<div class="col">
									<button type="submit" class="form_button trans_200">חפש</button>
								</div>
							</div>
						</form>
					</div>
				</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="courses">
		<div class="courses_background"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="section_title text-center">למה LearnMatch?</h2>
				</div>
			</div>
			<div class="row courses_row">
				<!-- Course -->
				<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="images/course_1.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><a href="course.html">לימוד אונליין</a></div>
							<div class="course_info">
							</div>
							<div class="course_text">
								<p>אצלנו לא צריך לצאת מהבית! בוחרים מורה, קובעים שעת לימוד ונכנסים לפורטל הלימוד האינטרנטי לשיעור פרטי או קבוצתי.</p>
							</div>
						</div>

					</div>
				</div>

				<!-- Course -->
				<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="images/course_2.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><a href="course.html">התאמה אישית</a></div>
							<div class="course_info">
							</div>
							<div class="course_text">
								<p>ב-LearnMatch תוכלו למצוא את המורה שמתאים לכם. תוכלו לחפש על פי מיקום, גיל, וותק או ניסיון ועוד.</p><br>
							</div>
						</div>
					</div>
				</div>

				<!-- Course -->
				<div class="col-lg-4 course_col">
					<div class="course">
						<div class="course_image"><img src="images/course_3.jpg" alt=""></div>
						<div class="course_body">
							<div class="course_title"><a href="course.html">תשלום מקוון</a></div>
							<div class="course_info">
							</div>
							<div class="course_text">
								<p>סיימתם שיעור פרטי? שלמו באמצעות אתר האינטרנט במקום לרדוף אחר מזומנים!</p><br>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	
	<!-- Instructors -->

	<div class="instructors">
		<div class="instructors_background"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="section_title text-center">המורים הכי פופולריים</h2>
				</div>
			</div>
			<div class="row instructors_row">

				<!-- Instructor -->
				<div class="col-lg-4 instructor_col">
					<div class="instructor text-center">
						<div class="instructor_image_container">
							<div class="instructor_image"><img src="images/instructor_1.jpg" alt=""></div>
						</div>
						<div class="instructor_name"><a class= "effect-underline" href="instructors.html">איריס ספבק</a></div>
						<div class="instructor_title">מורה פרטית לרוסית</div>
						<div class="instructor_text">
							<p>Мне нравится преподавать русский язык<br>Был хомяк, с хомяком на<br> нем ебать ебать Другой хомяк.</p>
						</div>
						<div class="instructor_social">
							<ul>
								<li><a href="https://www.facebook.com/iris.spivak.1"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="https://www.instagram.com/irisspivak/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Instructor -->
				<div class="col-lg-4 instructor_col">
					<div class="instructor text-center">
						<div class="instructor_image_container">
							<div class="instructor_image"><img src="images/instructor_2.jpg" alt=""></div>
						</div>
						<div class="instructor_name"><a class= "effect-underline" href="instructors.html">דור מנחם</a></div>
						<div class="instructor_title">מורה פרטי לצילום</div>
						<div class="instructor_text">
							<p>צלם חובב מזה כ-25 שנה. פרילנסר שמעולם לא קיבל עבודה מקצועית בתשלום.<br>
							ילמד אתכם את יסודות הצילום במחיר מופקע!</p>
						</div>
						<div class="instructor_social">
							<ul>
								<li><a href="https://www.facebook.com/dmenachem"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="https://www.instagram.com/dormena/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Instructor -->
				<div class="col-lg-4 instructor_col">
					<div class="instructor text-center">
						<div class="instructor_image_container">
							<div class="instructor_image"><img src="images/instructor_3.jpg" alt=""></div>
						</div>
						<div class="instructor_name"><a class= "effect-underline" href="instructors.html">חן כהן</a></div>
						<div class="instructor_title">מאמנת כלבים</div>
						<div class="instructor_text">
							<p>לכלב שלי קוראים שאקל. אני אוהבת אותו מאוד. <br>
							בשכונה קוראים לי הלוחשת לכלבים. אני מאמנת אותם, מסרקת אותם ונותנת להם מזון ושתיה.</p>
						</div>
						<div class="instructor_social">
							<ul>
								<li><a href="https://www.facebook.com/chen.cohen.9674"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="https://www.instagram.com/chenco28/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
    include 'Footer.php';
?>
	