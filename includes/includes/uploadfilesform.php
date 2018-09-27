<?php 
    session_start();
    $page = 'files'; include 'Header.php';
    header('Content-Type: text/html; charset=utf-8');
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        echo "<script>
        alert('עליך להתחבר לאתר בכדי להוריד קבצים!');
        window.location.href='files.php';
        </script>";
}
?>
<?php

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
                                    <div class="regular_content">
                                        <div class="thanks_title">העלה קובץ</div><br><br>
             <div class="well well-sm">
             <form class="form-horizontal col-md-offset-3" action="uploadfilesform2.php" method="post" enctype="multipart/form-data">
             <fieldset>
                <div class="form-group row">
                <div class="col-md-6 col-xs-12">
             <input id="fileName" name="fileName" type="text" placeholder="שם קובץ" class="form-control">
             </div>
             </div>
             
             <div class="form-group row">
             <div class="col-md-6 col-xs-12">
             <input id="Subject" name="Subject" type="text" placeholder="נושא" class="form-control">
             </div>
             </div>
             
             <div class="form-group row">
             <div class="col-md-6 col-xs-12">
             <input list="types" id="Type" name="Type" type="text" placeholder="סוג" class="form-control" autocomplete="off">
             
             <datalist id="types">
              <option value="סיכום">
              <option value="מבחן">
              <option value="עבודה">
            </datalist>
             </div>
             </div>
             
             <div class="form-group row">
             <div class="col-md-6 col-xs-12">
             <input list="years" id="Date" name="Date" type="text" placeholder="שנה"  class="form-control">
            <datalist id="years">
              <option value="2018">
              <option value="2017">
              <option value="2016">
              <option value="2015">
              <option value="2014">
            </datalist>
             </div>
             </div>
             
             <div class="form-group row">
             <div class="col-md-6 col-xs-12">
             <textarea class="form-control" id="Comments" name="Comments" placeholder="הערות" rows="5"></textarea>
             </div>
             </div>
             
             <div class="form-group row">
             <div class="col-md-6 col-xs-12">
             <input id="File" name="File" type="file" placeholder="בחר קובץ" class="form-control">
             </div>
             </div>
             
             <div class="form-group row">
             <div class="col-md-6 col-xs-12 text-center">
             <button type="submit" class="btn btn-primary btn-lg">העלה</button>
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
    

<?php

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
        echo "<script>
        alert('עליך להתחבר בכדי לשתף חומרי לימוד');
        
        </script>";
    
}
?>
<?php 
    include 'Footer.php';
?>