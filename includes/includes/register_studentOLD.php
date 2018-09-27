<?php 
    session_start();
    include 'Header.php';
    header('Content-Type: text/html; charset=utf-8');
?>
<meta charset="utf-8" />
	<!-- Home -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <div class="homeBlank">
         <div class="container">
            <div class="row">
                <div class="col text-center">
                    
                        <div class="regular">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="regular_content">
                                        <div class="thanks_title">הירשם כתלמיד</div>
         <div class="well well-sm">
             <form class="form-horizontal" action="insert_user.php" method="post">
             <fieldset>
             <div class="form-group">
             
             <div class="col-md-12 col-xs-12">
             <input type="email" name="email" id="email" class="form-control" placeholder="כתובת אימייל" required>
             </div>
             </div>
             
             <div class="form-group">
             
             <div class="col-md-12">
             <input type="password" name = "password" id="password" class="form-control" placeholder="סיסמה" required">
             </div>
             </div>
             
             <div class="form-group">
             
             <div class="col-md-12">
             <input type="text" name="firstName" id="firstName" placeholder="שם פרטי" class="form-control" required">
             </div>
             </div>
             
             <div class="form-group">
             
             <div class="col-md-12">
             <input type="text" name="lastName" id="lastName" placeholder="שם משפחה" class="form-control" required">
             </div>
             </div>
             
             <div class="form-group">
             
             <div class="col-md-12">
             <input type="date" name="dateOfBirth" id="dateOfBirth" class="form-control" onblur="(this.type='text')" placeholder="תאריך לידה" required>
             </div>
             </div>
             
             <div class="form-group">
             
             <div class="col-md-12">
             <input class="form-control" name = "address" id="autocomplete" placeholder="הכנס כתובת" type="text" onchange="firstfunction()" required>
             </div>
             </div>
             
             
             <div class="form-group">
             
             <div class="col-md-12">
                 <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                  <label class="form-check-label" for="female">&emsp;&emsp;נקבה</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                  <label class="form-check-label" for="male">&emsp;&emsp; זכר</label>
                </div>
            </div>
             </div>
             
             
             <div class="form-group">
             <div class="col-md-12 text-center">
             <button type="submit" class="btn btn-primary btn-lg">שמור</button>
             <button type="reset" class="btn btn-primary btn-lg">אפס טופס</button>
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