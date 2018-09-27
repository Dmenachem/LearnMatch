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

  span.del_btn{
         cursor:pointer;
         color:red;
         font-size:20px;
       }
</style>


<div class="container">
  <div class="row justify-content-md-center">
      <div class="col col-lg-7">
          <br><br><br>
          <br><br>
		<center>
			<h2>רישום מורה פרטי </h2>
		</center>
		<hr>
		<br>
		<form action="" id="form" onsubmit="return false" method="post" class="rtl">
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
					<td><input type="text" name="fname" id="fname" required></input> </td>
				</tr>
				<tr>
					<td> <label for = "lname">שם משפחה</label></td>
					<td><input type="text" name="lname" id="lname" required></input> </td>
				<tr>
					<td> <label for = "phone">מספר נייד</label></td>
					<td> <input name = "phone" id="phone" type="phone" required></input></td>
				</tr>
				<tr>
					<div id="locationField">
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
					<td> <label for = "exp">ותק (בשנים)</label></td>
					<td><input type="text" name = "exp" id="exp" required></input> </td>
				</tr>
				<tr>
					<td> <label for = "price">מחיר לשיעור</label></td>
					<td><input type="text" name = "price" id="price" required></input> </td>
				</tr>
				<tr>
					<td> <label for = "priceg">מחיר לשיעור קבוצתי </label></td>
					<td><input type="text" name = "priceg" id="priceg" required></input> </td>
				</tr>
				</div>
				<tr id="coard" hidden>
					<td><label for = "lat">קו רוחב:</label></td>
					<td><input  type = "latitude" name = "lat" id = "lat" readonly>*</td>
				</tr>
				<tr id="coard" hidden>
					<td><label for = "lng">קו אורך:</label></td>
					<td><input  type = "longitude" name = "lng" id = "lng" readonly>* </td>
				</tr>
				<tr>
					<td>
						<div id="checkboxes">
							<label>תחומי לימוד</label>

						</div>
					</td>
					<td>
						<fieldset>
                      <select class="" id="subjects" name="">
                        <option value="">בחר מקצועות</option>
                        <?php if (count($subjects)>0): ?>
                          <?php foreach ($subjects as  $value): ?>
                            <option value="<?php echo $value ?>"><?php echo $value ?></option>
                          <?php endforeach; ?>
                      <?php endif; ?>
                      </select>
                      <button type="button" class="btn ctn-primery" id="add_subject" name="button">הוסף מקצוע</button>
						</fieldset>
					</td>
				</tr>

			</table>
      <div class="insert_subjects">

      </div>
			</center>

			<center> <input type = "reset" id="b" value = "אפס טופס" class="btn btn-primary btn-sm">
				<input  id="submit" type="submit" value="שמור" class="btn btn-primary btn-sm">  </center>
				<br>


		</form>
		</div>
		</div>
		</div>
          <script type="text/javascript">

     var subjects = [];
     var insert_sebjects = $('.insert_subjects');
       $('#add_subject').on('click',function (){
         let selected_subject = $('#subjects').find(":selected").text();
         if (selected_subject != 'בחר מקצועות')
         {
             if(subjects.indexOf(selected_subject) > -1){

             }
             else{
           insert_sebjects.html('');
            subjects.push(selected_subject);
            for (var i = 0; i < subjects.length; i++) {
              insert_sebjects.append('<p style="display:inline">'+subjects[i]+'</p>'+'<span class="del_btn"  onclick="update('+i+')"> X</span><br>');
            }
         }

    }

       })

       function update(obj)
       {
         subjects.splice(obj, 1);
         insert_sebjects.html('');
          for (var i = 0; i < subjects.length; i++) {
            insert_sebjects.append('<p style="display:inline">'+subjects[i]+'</p>'+'<span class="del_btn"  onclick="update('+i+')"> X</span><br>');
          }
       }


       $('#submit').on('click',function (){

         var email = $('#email').val();
         var pass = $('#password').val();
         var fname = $('#fname').val();
         var lname = $('#lname').val();
         var phone = $('#phone').val();
         var address = $('#autocomplete').val();
         var birth = $('#dob').val();
         if (document.getElementById('female').checked) {
           var gender = 'female';
         }else if (document.getElementById('male').checked) {
           var gender = 'male';
         }
         var ex = $('#exp').val();
         var houre = $('#price').val();
         var g_houre = $('#priceg').val();
         var lat = $('#lat').val();
         var lng = $('#lng').val();



           var subjects_j = JSON.stringify(subjects);

           $.ajax({
             url:'teacher/formtoserver.php',
             method:"POST",
             data:{email:email,
                  password:pass,
                  fname:fname,
                  lname:lname,
                  phone:phone,
                  address:address,
                  exp:ex,
                  dob:birth,
                  type:gender,
                  price:houre,
                  priceg:g_houre,
                  lesson:subjects_j,
                  lat:lat,
                  lng:lng,
                  submit:'ok'
                },
                success:function (data){
                    console.log(data);
                  if(data == 'OK'){
                      window.location = 'http://chence.mtacloud.co.il';
                  }
                }
           })




       })
     </script>

		<?php
    include 'Footer.php';
?>
