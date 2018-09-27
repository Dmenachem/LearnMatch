<?php 
    $page = 'files'; include 'Header.php';
    session_start();
?>

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

  .remove-all-styles {
    all: revert;
  }
  
  .whiteFont {
      color:white;
  }
</style>

<?php 

    $connection = mysqli_connect("localhost","chence","MRTH3tRT3xWp","chence_plesson")
    or die("Error " . mysqli_error($connection));
    mysqli_set_charset($connection,"utf8");
    //fetch data from database
    $sql1 = "select DISTINCT Subject from files order by Subject asc";
    $result1 = mysqli_query($connection, $sql1) or die("Error " . mysqli_error($connection));
    $userMail = $_SESSION['email'];
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
                                    <option value="<?php echo $row['Subject']; ?>"><?php echo $row['Subject']; ?></option>
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
					        	<table class="table table-hover table-striped table-curved rtl">

					        	<thead>
                                <tr class="bg-primary">
                                <td class="whiteFont" scope="col"><b>שם הקובץ</b></td>
                                <td class="whiteFont" scope="col"><b>סוג</b></td>
                                <td class="whiteFont" scope="col"><b>תאריך</b></td>
                                <td class="whiteFont" scope="col"><b>הערות</b></td>
                                <td class="whiteFont" scope="col"><b>קובץ</b></td>
                                <td class="whiteFont" scope="col"><b>נקודות</b></td>
                                </tr>
                                </thead>
                                
                                <?php
                                if(isset($_POST['SubmitButton'])){
                                    if (mysqli_num_rows($result2) < 1){
                                        echo "<script type='text/javascript'>alert('לא נמצאו קבצים מתאימים.')</script>";
                                    }
                                    else {
                                        while ($recordeset=mysqli_fetch_array($result2,MYSQLI_ASSOC))
                                        {
                                             echo "<tr>";
                                             echo "<td><center>".$recordeset["fileName"]."</center></td>";
                                             echo "<td><center>".$recordeset["Type"]."</center></td>";
                                             echo "<td><center>".$recordeset["Date"]."</center></td>";
                                             echo "<td><center>".$recordeset["Comments"]."</center></td>";
                                            if(!isset($_SESSION["loggedin"]) && !$_SESSION["loggedin"] == true) {
                                                echo '<td><center><a href="#" onClick="alert(\'עליך להתחבר לאתר בכדי להוריד קבצים!\')">הורד קובץ</a></center></td>';
                                            }
                                            else {
                                                echo "<td><center><a onclick='updatePoints();' href='".$recordeset["File"]."' download>הורד קובץ</a></center></td>";
                                            }
                                             echo "<td><center>".$recordeset["points"]."</center></td>";
                                             echo "</tr>";
                                        }
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



<script>
function updatePoints {
    <?php
        if ($_SESSION['studentOrTeacher'] == 'Student'){    
        $sqlquery3="UPDATE `student` SET numOfStars= numOfStars-150 WHERE email = '$userMail'";
        $result3 = mysqli_query($connection, $sqlquery3) or die("Error " . mysqli_error($connection));
        }
        else {
        $sqlquery4="UPDATE `teachers` SET nos= nos-150 WHERE email = '$userMail'";
        $result4 = mysqli_query($connection, $sqlquery4) or die("Error " . mysqli_error($connection));
        }
    ?>
}
</script>

<?php 
    include 'Footer.php';
?>

