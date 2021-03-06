<?php
session_start();
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] == true){
}

?>

<?php

$servername = "localhost";
$username = "chence";		
$password = "MRTH3tRT3xWp";			
$dbname = "chence_plesson";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
}
header('Content-Type: text/html; charset=utf-8');
$username_err = $password_err = "";

if (isset($_POST['form_type']) && $_POST['form_type'] == 'form1') {
        if(empty($username_err) && empty($password_err)) {
            $Uname=($_POST['username']);
            $Pass=($_POST['password']);
            mysqli_set_charset($conn, "utf8");
            $sql= "SELECT * FROM users WHERE email='$Uname' AND password='$Pass'";
            
            $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$Uname' AND password='$Pass'");
            if($result -> num_rows > 0) {
                $row = $result->fetch_assoc();
                          $role = $row['stuedentOrTeacher'];
                          $firstName = $row['firstName']; 
                          $lastName = $row['lastName'];
                          $user_id = $row['user_id'];
                          $email = $row['email'];
                          $studentOrTeacher = $row['studentOrTeacher'];
                          
                     // Password is correct, so start a new session
                        session_start();
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["login_user"] = $Uname;
                        $_SESSION['username'] = $Uname;
                        $_SESSION['firstName'] = $firstName;
                        $_SESSION['lastName'] = $lastName;
                        $_SESSION['user_id'] = $user_id;
                        $_SESSION['email'] = $email;
                        $_SESSION['studentOrTeacher'] = $studentOrTeacher;
            }
            
        }
        else {
            header("location: ../home.php");
        }
}

?>
<!DOCTYPE html>
<html lang="hebrew">
<head>
<title>LearnMatch</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap4/bootstrap.min.css">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="../plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="../styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="../styles/responsive.css">
<link rel="icon" type="image" href="../images/favicon.ico">


</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		
		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container mr-auto">
								<a href="../index.php"><div class="logo_text">LearnMatch</div></a>
							</div>
							<nav class="main_nav_contaner">
								<ul class="main_nav">
									<li class="<?php if($page=='index'){echo 'active';}?>"><a href="../index.php">מצא מורה פרטי</a></li>
									<li class="<?php if($page=='files'){echo 'active';}?>"><a href="files.php">שיתוף ידע</a></li>
									
                                    <?php
                                        if(isset($_SESSION["loggedin"]) && $_SESSION['studentOrTeacher'] == 'Student') { 
                                        ?>
                                            <?php echo '<li><a href="newstudentprofile.php">הפרופיל שלי</a></li>'; ?>
                                        <?php } else if(isset($_SESSION["loggedin"]) && $_SESSION['studentOrTeacher'] == 'Teacher') {?>
                                            <?php echo '<li><a href="newTeacherProfile.php">הפרופיל שלי</a></li>'; ?>
                                        <?php }
                                          else { ?>
                                          <?php echo ''; ?>
                                        <?php
                                        }
                                    ?>
                                    
                                    
									<li><a href="#"></a></li>
								</ul>
							</nav>
                            

<?php
    if(isset($_SESSION["loggedin"])) { //You have to set that somewhere else just like $logged
    ?>
                    <div class="btn-group dropleft">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ,שלום<br></b><?php echo $_SESSION['firstName'];?> <?php echo $_SESSION['lastName'];  ?>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../logout.php">התנתק</a>
          </div>
        </div>
    <?php } else { ?>
                    <div class="btn-group dropleft">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            הירשם
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="latlan3.php">הירשם כמורה</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="register_student.php">הירשם כתלמיד</a>
          </div>
        </div> 
    <?php
    }
?>                                     
							<div class="header_content_right ml-auto text-right">
								<?php
    if(isset($_SESSION["loggedin"])) { 
    ?>
    <div></div>
    <?php } else { ?>
    
        <div class="user"><a href="#myModal" class="trigger-btn" data-toggle="modal"><i class="fa fa-user" aria-hidden="true"></i></a></div>
    <?php
    }
?>
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</header>

<!-- login MODAL -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">
				<div class="avatar">
					<img src="../images/logo2.png" alt="Logo">
				</div>				
				<h4 class="modal-title">התחברות</h4>	
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="<?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
						<input type="text" class="form-control" name="username" placeholder="אימייל" required="require>">		
					</div>
                    <span class="help-block"><?php echo $username_err; ?></span>
						<input type="password" class="form-control" name="password" placeholder="סיסמה" required="required">	
                    <span class="help-block"><?php echo $password_err; ?></span>
						<button type="submit" class="btn btn-primary btn-lg btn-block login-btn">התחבר</button>
						<input type="hidden" name="form_type" value="form1">
				</form>
			</div>
			<div class="modal-footer">
				<a href="#">שכחתי סיסמה</a>
			</div>
		</div>
	</div>
</div> 

	<!-- Hamburger Menu -->
<?php
    if(isset($_SESSION["loggedin"])) { 
    ?>
	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<nav class="menu_nav">
			<ul class="menu_mm">
			    <li class="menu_mm">
	    			  <li class="dropdown">
                        שלום,<br></b><?php echo $_SESSION['firstName'];?> <?php echo $_SESSION['lastName'];  ?>
                      </li>
			    </li>
                <li class="menu_mm"><a class="dropdown-item" href="logout.php">התנתק</a></li>
                <li class="menu_mm"><a href="../index.php">מצא מורה פרטי</a></li>
				<li class="menu_mm"><a href="files.php">שיתוף ידע</a></li>
                <?php
                    if($_SESSION['studentOrTeacher'] == 'Student') { 
                    ?>
                        <?php echo '<li class="menu_mm"><a href="newstudentprofile.php">הפרופיל שלי</a></li>'; ?>
                    <?php } else { ?>
                        <?php echo '<liclass="menu_mm" ><a href="newTeacherProfile.php">הפרופיל שלי</a></li>'; ?>
                    <?php
                    }
                ?>    
                
			</ul>
		</nav>
	</div>
    <?php } else { ?>
        <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
            <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
            <nav class="menu_nav">
                <ul class="menu_mm">
                    <li class="menu_mm"> 
                    <a href="#myModal" class="trigger-btn" data-toggle="modal"> התחבר </a></li>
                    <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">הירשם לאתר <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                           <li><a href="latlan3.php">הירשם כמורה</a></li>
                           <li class="divider"></li>
                           <li><a href="register_student.php">הירשם כתלמיד</a></li>
                        </ul>
                    </li>
                    <li class="menu_mm"><a href="../index.php">מצא מורה פרטי</a></li>
                    <li class="menu_mm"><a href="files.php">שיתוף ידע</a></li>
                </ul>
            </nav>
        </div>
    <?php
    }
?>