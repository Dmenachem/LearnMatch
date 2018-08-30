<?php 
session_start();
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] == true){
    echo "<script type='text/javascript'>alert('עליך להתחבר למערכת בכדי להוריד או להשתף קבצים!')</script>";
}
 
?>
<?php 
    $page = 'files'; include 'Header.php';
    $connection = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson")
    or die("Error " . mysqli_error($connection));
    mysqli_set_charset($connection,"utf8");
    //fetch data from database
    $sql1 = "select subject from subjects order by subject asc";
    $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
    
    if(isset($_POST['SubmitButton'])){
        $Type1 = $_POST['type'];
        $Subject1 = $_POST['subject'];
        $Date1 = $_POST['year'];
        $sqlquery="SELECT `fileName`, `Type`, `Date`, `Comments`, `File`, `points` FROM files WHERE Type='$Type1' and Subject = '$Subject1' and Date='$Date1'";
        $result2 = mysqli_query($connection, $sqlquery) or die("Error " . mysqli_error($connection));
    }
?>
	<!-- Home -->
    <meta charset='utf-8'>
	<div class="home">
		<div class="home_background" style="background-image: url(../images/index_background.jpg);"></div>
		<div class="home_content">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<h1 class="section_title">מצא חומרי לימוד</h1><br><br>
				<!-- Form -->
				<div class="container"
					<div class="contact_form_container">
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contact_form" class="contact_form" method="post">
							<div class="row contact_row">
								<div class="col-lg-4 contact_col">
									<input list="Subjects" class="form_input" autocomplete="off" onfocus="this.value=''" placeholder="תחום לימוד" required="required" name="subject">
									<datalist id="Subjects">
                                    <?php while($row = mysqli_fetch_array($result1)) { ?>
                                    <option value="<?php echo $row['subject']; ?>"><?php echo $row['subject']; ?></option>
                                    <?php } ?>
									</datalist>
								</div>

								<div class="col-lg-4 contact_col" id="locationField">
									<input list="type" class="form_input" autocomplete="off" onfocus="this.value=''" placeholder="סוג" required="required" name="type">
									<datalist id="type">
									<option value="סיכום">
									<option value="מבחן">
									<option value="עבודה">
									<option value="">
									</datalist>
								</div>
									<div class="col-lg-4 contact_col" id="locationField">
									<input list="year" class="form_input" onfocus="this.value=''" placeholder="שנה" required="required" name="year">
									<datalist id="year">
									<option value="2018">
									<option value="2017">
									<option value="2016">
									<option value="2015">
									<option value="2014">
									<option value="2013">
									<option value="2012">
									<option value="2011">
								    <option value="2010">
									</datalist>
								</div>
								</div> 
								<div class="col">
									<button type="submit" name="SubmitButton" class="form_button trans_200">חפש</button>
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
	
	<div class="regular">
		<div class="container_files">
			<div class="row">
			    
			<!-- Fetch Data From DB-->
					<div class="col-sm 12 col-md-12">
					    <div class="col-md-12 buttonflexer">
                        <a class="btn btn-primary" href="uploadfilesform.php" role="button">שיתוף חומרי לימוד</a>
                        </div>
						<div class="col-md-12">
							<h3 class="form_title3">תוצאות חיפוש</h3>
						</div>
					<div class="regular_content table-responsive-sm">
					        	<table class="table table-bordered table-striped rtl">

					        	<thead>
                                <tr>
                                <td scope="col"><b>שם הקובץ</b></td>
                                <td scope="col"><b>סוג</b></td>
                                <td scope="col"><b>תאריך</b></td>
                                <td scope="col"><b>הערות</b></td>
                                <td scope="col"><b>קובץ</b></td>
                                <td scope="col"><b>נקודות</b></td>
                                </tr>
                                </thead>
                                
                                <?php
                                if(isset($_POST['SubmitButton'])){
                                while ($recordeset=mysqli_fetch_array($result2,MYSQLI_ASSOC))
                                {
                                     echo "<tr>";
                                     echo "<td><center>".$recordeset["fileName"]."</center></td>";
                                     echo "<td><center>".$recordeset["Type"]."</center></td>";
                                     echo "<td><center>".$recordeset["Date"]."</center></td>";
                                     echo "<td><center>".$recordeset["Comments"]."</center></td>";
                                     echo "<td><center><a href='".$recordeset["File"]."'>הורד קובץ</a></center></td>";
                                     //echo "<td><center>".$recordeset["File"]."</center></td>";//
                                     echo "<td><center>".$recordeset["points"]."</center></td>";
                                     echo "</tr>";
                                }
                                }
                                ?>
                                </TABLE>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
    
    
<?php 
    include 'Footer.php';
?>