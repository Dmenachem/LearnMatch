<?php 
    include 'Header.php';
    header('Content-Type: text/html; charset=utf-8');
?>
<meta charset="utf-8" />
	<!-- Home -->

    <div class="homeBlank">
         <div class="container">
            <div class="row">
                <div class="col text-center">
                        <div class="regular">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="regular_content">
                                        <div class="thanks_title">רישום תלמיד</div>
             <div class="well well-sm">
             <form class="form-horizontal" action="insert_user.php" method="post">
             <fieldset>
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-signature bigicon"></i></span>
             <div class="col-md-10">
             <label for = "email">כתובת אימייל</label>
             <input class="textinput" type="email" name = "email" id="email" required></input>
             </div>
             </div>
             
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-signature bigicon"></i></span>
             <div class="col-md-10">
             <label for = "password">סיסמה</label>
             <input class="textinput" type="password" name = "password" id="password" required></input>*
             </div>
             </div>
             
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-file bigicon"></i></span>
             <div class="col-md-10">
             <label for = "firstName">שם פרטי</label>
             <input class="textinput" type="text" name="firstName" id="firstName" required></input>
             </div>
             </div>
             
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-table bigicon"></i></span>
             <div class="col-md-10">
             <label for="lastName">שם משפחה</label>
    		 <input class="textinput" type="text" name="lastName" id="lastName" required></input>
             </div>
             </div>
             
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
             <div class="col-md-10">
            <label  for = "dateOfBirth">תאריך לידה</label>
    		<input type="date" name = "dateOfBirth" id="dateOfBirth" required></input>*
             </div>
             </div>
             
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="far fa-folder-open bigicon"></i></span>
             <div class="col-md-10">
            <label for = "autocomplete">כתובת</label> 
		    <input class="textinput" name = "address" id="autocomplete" placeholder="הכנס כתובת" type="text" onchange="firstfunction()" required>*</input>
             </div>
             </div>
             
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="far fa-folder-open bigicon"></i></span>
             <div class="col-md-10">
             			        	    <div class="btn-group" data-toggle="buttons-radio">
	                            <label>מין</label>
                            </div>
    			        </div>
    			        
    			    	<div class="form-group">
    			            <label><input type="radio" class="btn_btn-group" id="female" name="gender" value="female" required> נקבה&emsp;&emsp;</label> 
    			            <label ><input type="radio" class="btn_btn-group" id="male" name="gender" value="male"> זכר</label>
             </div>
             </div>
             
             <div class="form-group">
             <div class="col-md-10 text-center">
                                                               <input type ="reset" class="btn btn-primary" id="a" value = "אפס טופס">
    			        <input type="submit" class="btn btn-primary"  id="b" name = "submit" value="שמור">  
             </div>
             </div>
             </fieldset>
             </form>
             </div>
             </div>
             </div>
            </div>
            </div>
            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    include 'Footer.php';
?>