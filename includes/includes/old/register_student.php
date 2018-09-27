<?php 
    $page = 'index'; include 'Header.php';
?>

<div class="regular">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="regular_form">
            <div class="regular_title">רישום תלמיד</div>
            <div class="regular_text col rtl">

                    <form action = "insert_user.php" method = "post">
                      <div class="form-row">
                      
                       <div class="form-group col-md-6">
                        <label for="email">כתובת אימייל</label>
                        <input type="email" class="form-control" name= "email" id="email" required>
                      </div>

                       <div class="form-group col-md-6">
                        <label for="password"> סיסמה </label>
                        <input type="password" class="form-control" name="password" id="password" required>
                      </div>
                        
                       <div class="form-group col-md-6">
                          <label for="firstName">שם פרטי</label>
                          <input type="text" class="form-control" name="firstName" id="firstName" required>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="lastName">שם משפחה</label>
                          <input type="text" class="form-control" name="lastName" id="lastName" required>
                        </div>

                    <div class="form-group col-md-4">
                        <label for="autocomplete">עיר מגורים</label>
                        <input type="text" class="form-control" name = "address" id="autocomplete" required>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="dateOfBirth">תאריך לידה</label>
                        <input type="date" class="form-control" name = "dateOfBirth" id="dateOfBirth" required>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="gender">מין</label><br>
                        <label class="radio-inline"><input type="radio" name="gender" value="male" checked>זכר </label>
                        <label class="radio-inline"><input type="radio" name="gender" value="female" >נקבה</label>
                        
                    </div>
                      <br><br><br><br><br>
                      </div>
                     <div class="center-block">
                     <button type="submit" id="a" class="btn btn-primary">הירשם</button>
                     <button type="reset" id="b" class="btn btn-primary">נקה טופס</button>
                     
                     </div>
                    </form>   
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>



         
<?php 
    include 'Footer.php';
?>