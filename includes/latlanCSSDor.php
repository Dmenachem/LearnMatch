<?php
    include 'Header.php';
?>

	        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	
	        <!--load jquery before js-->
	       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	       <script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>

            <!--load js-->
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://chence.mtacloud.co.il/js/jsshelter.js"></script>
            <script src="https://chence.mtacloud.co.il/js/menu.js"></script>
        	<script language="JavaScript" type="text/javascript"></script>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArcdtxZOTzC0dK3Q9467iDtUC1cv7NtH4&libraries=places&callback=initAutocomplete" async defer></script>
            
 
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="imagetoolbar" content="no" />
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<meta name="keywords" content="Google Maps - address to location" lang="he" />
		<meta name="description" content="" />
        
        
		<div id="map-holder"></div>
		<div id="debug"></div>


<br><br><br><br>

        <center> 
		<h2>רישום מורה פרטי </h2>
	 </center>   
	 <hr>
        <br>
        <div class="">
            <div class="d-md-flex justify-content-xl-center">
		<form action = "teacher/formtoserver.php" method = "post">
				<meta charset="UTF-8">
		
			<table class="table table-hover table-bordered rtl">
            <tr>
               <td> <label for = "email">כתובת מייל</label></td>
			    <td><input type="email" name = "email" id="email" required></input>	 </td>
            </tr>
            	</tr> 
			    <td> <label for = "password">סיסמא</label></td>
			    <td><input type="password" name="password" id="password" required></input>	 </td>
			</tr> 
            		<tr>
			    <td> <label for = "fname">שם פרטי</label></td>
			    <td><input type="text" name="fname" id="fname" required></input>	 </td>
			</tr>   
				<tr>
			    <td> <label for = "lname">שם משפחה</label></td>
			    <td><input type="text" name="lname" id="lname" required></input>	 </td>
			<tr>
                <td> <label for = "phone">מספר נייד</label></td>
                <td> <input name = "phone" id="phone" type="phone" required></input></td>
            </tr>
            <tr><div id="locationField">
		        <td><label for = "autocomplete">כתובת</label> </td>
		        <td><input name = "address" id="autocomplete"  placeholder="הכנס כתובת "
				type="text" onchange="firstfunction()" required>*</input></td>
		    </tr>
            <tr>
                <td> <label for = "dob">תאריך לידה</label></td>
                <td> <input name = "dob" id="dob" type="date" max="2002-01-01" required></input></td>
            </tr>
            <tr>
                <td>
			        <div class="btn-group" data-toggle="buttons-radio">
                    <label>מין</label>
                     
                    </div>
			    </td>
			    <td>
			    <label><input type="radio" class="btn btn-group" id="female" name="type" value="female" required>נקבה</label><br><br>
			    <label><input type="radio" class="btn btn-group" id="male" name="type" value="male">זכר</label></td>
            </tr>
			<tr>
			    <td> <label for = "exp">ותק</label></td>
			    <td><input type="text" name = "exp" id="exp" required></input>	 </td>
			</tr>
			<tr>
			    <td> <label for = "price">מחיר לשיעור</label></td>
			    <td><input type="text" name = "price" id="price" required></input>	 </td>
			</tr>
			<tr>
			    <td> <label for = "priceg">מחיר לשיעור קבוצתי </label></td>
			    <td><input type="text" name = "priceg" id="priceg" required></input>	 </td>
			</tr>
			</div>
			<tr id="coard">
			    <td><label for = "lat">קו רוחב:</label></td>
			    <td><input type = "latitude" name = "lat" id = "lat" readonly>*</td>
			</tr>
			<tr id="coard">
			    <td><label for = "lng">קו אורך:</label></td>
			    <td><input type = "longitude" name = "lng" id = "lng" readonly>* </td>
			</tr>
			<tr>
			    <td>
			        <div id="checkboxes">
                    <label>תחומי לימוד</label>
                     
                    </div>
			    </td>
			    <td>
			         <fieldset>
                       <label><input type="checkbox" value="מתמטיקה א">
                        מתמטיקה א</label><br>
                        
                        <label><input type="checkbox" value=״מבני נתונים״>
                        מבני נתונים</label><br>
                        
                        <label><input type="checkbox" value="Java">
                        Java</label><br>
                        
                        <label><input type="checkbox" value="C++">
                        C++</label><br>
                        
                        <label><input type="checkbox" value="קיימות">
                        קיימות</label>
                      </fieldset>
			    </td>
			</tr>
  
			</table>
			 </center>

			    <center> <input type = "reset" id="b" value = "אפס טופס" class="btn btn-primary">
			    <input name = "submit" id="b" type="submit" value="שמור" class="btn btn-primary">  </center> 
		
      
		</form>
		</div>

</div>
<br>
<?php
    include 'Footer.php';
?>