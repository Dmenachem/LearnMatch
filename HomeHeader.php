<?php
    header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="hebrew">
<head>
<title>LearnMatch</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="icon" type="image" href="images/favicon.ico">
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
								<a href="index.php"><div class="logo_text">LearnMatch</div></a>
							</div>
							<nav class="main_nav_contaner">
								<ul class="main_nav">
									<li class="<?php if($page=='index'){echo 'active';}?>"><a href="index.php">מצא מורה פרטי</a></li>
									<li class="<?php if($page=='files'){echo 'active';}?>"><a href="includes/files.php">שיתוף ידע</a></li>
                                    <li class="<?php if($page=='myprofile'){echo 'active';}?>"><a href="includes/myprofile.php">הפרופיל שלי</a></li>
                                    <li><a href="#"></a></li>
								</ul>
							</nav>
            

                            <div class="btn-group dropleft">
                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ,שלום<br></b><?php echo $_SESSION['firstName'];?> <?php echo $_SESSION['lastName'];  ?>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="logout.php">התנתק</a>
                              </div>
                            </div>                       
                                                        
							<div class="header_content_right ml-auto text-right">
							
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


	<!-- Hamburger Menu -->

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
                <li class="menu_mm"><a href="index.php">מצא מורה פרטי</a></li>
				<li class="menu_mm"><a href="includes/files.php">שיתוף ידע</a></li>
                <li class="menu_mm"><a href="includes/myprofile.php">הפרופיל שלי</a></li
                
			</ul>
		</nav>
	</div>