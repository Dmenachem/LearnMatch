<?php 
    include 'Header.php';
     $connection = mysqli_connect("localhost", "chence_admin", "12345","chence_plesson"); // Establishing Connection with Server
     $connection->set_charset("utf8");
     $subjects = [];
    $sql = "SELECT * FROM subjects";
    
    $result = mysqli_query($connection , $sql);
    if($result){
        
        while($row = mysqli_fetch_assoc($result)){
            $subjects[] = $row['subject'];
        }
    }
     
     
     
?>

	<!--load jquery before js-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>

	<!--load js-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://chence.mtacloud.co.il/js/jsshelter.js"></script>
	<script src="https://chence.mtacloud.co.il/js/menu.js"></script>
	<script language="JavaScript" type="text/javascript"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArcdtxZOTzC0dK3Q9467iDtUC1cv7NtH4&libraries=places&callback=initAutocomplete" async defer></script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="imagetoolbar" content="no" />

	
	
	<meta name="keywords" content="Google Maps - address to location" lang="he" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<title>רישום מורה פרטי</title>
	<!--hide div coardnitions onload-->

	<div id="map-holder"></div>
	<div id="debug"></div>

<style>
    .table td {
   text-align: center;   
}
</style>

<div class="container">
  <div class="row justify-content-md-center">
      <div class="col col-lg-7">
          <br><br><br>
          <br><br>
		<center>
            <h2>רישום תלמיד</h2>
		</center>
		<hr>
		<br>
		<form action="insert_user.php" method="post" class="rtl">
			<meta charset="UTF-8">

			<table class="table table-hover table-bordered form-horizontal">
				<tr>
					<td> <label for = "email">כתובת מייל</label></td>
					<td><input type="email" name = "email" id="email" required></input> </td>
				</tr>
				</tr>
				<td> <label for = "password">סיסמא</label></td>
				<td><input type="password" name="password" id="password" required></input> </td>
				</tr>
				<tr>
					<td> <label for = "fname">שם פרטי</label></td>
					<td><input type="text" name="firstName" id="firstName" required></input> </td>
				</tr>
				<tr>
					<td> <label for = "lname">שם משפחה</label></td>
					<td><input type="text" name="lastName" id="lastName" required></input> </td>
				<tr>
					<td> <label for = "date">תאריך לידה</label></td>
					<td> <input name = "dateOfBirth" id="dateOfBirth" type="date" required></input></td>
				</tr>
				<tr>
					<div id="locationField">
						<td><label for = "autocomplete">כתובת</label> </td>
						<td><input name = "address" id="autocomplete"  placeholder="הכנס כתובת "
				type="text" onchange="firstfunction()" required>*</input></td>
				</tr>
				<tr>
					<td>
						<div class="btn-group" data-toggle="buttons-radio">
							<label>מין</label>

						</div>
					</td>
					<td>
						<label><input type="radio" class="btn btn-group" id="female" name="gender" value="female" required>נקבה</label><br><br>
						<label><input type="radio" class="btn btn-group" id="male" name="gender" value="male">זכר</label></td>
				</tr>
				</div>


			</table>
			</center>

			<center> <input type = "reset" id="b" value = "אפס טופס" class="btn btn-primary btn-sm">
				<input name = "submit" id="b" type="submit" value="שמור" class="btn btn-primary btn-sm">  </center>
				<br><br><br><br><br><br><br><br><br><br>


		</form>
		</div>
		</div>
		</div>
		
		<?php 
    include 'Footer.php';
?>
