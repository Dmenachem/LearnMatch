<?php 
    session_start();
    $page = 'files'; include 'Header.php';
    header('Content-Type: text/html; charset=utf-8');
?>
<meta charset="utf-8" />
	<!-- Home -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <div class="homeBlank">
         <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="section_title">תודה על השיתוף!</h1><br><br>
                        <div class="regular">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="regular_content">
                                        <div class="thanks_title">העלה קובץ</div>
             <div class="well well-sm">
             <form class="form-horizontal" action="uploadfilesform2.php" method="post" enctype="multipart/form-data">
             <fieldset>
             <div class="form-group">
             <span class="col-md-1 col-xs-12 col-md-offset-2 text-center"><i class="fa fa-file bigicon"></i></span>
             <div class="col-md-10 col-xs-12">
             <input id="fileName" name="fileName" type="text" placeholder="שם קובץ" class="form-control">
             </div>
             </div>
             
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-book-reader bigicon"></i></span>
             <div class="col-md-10">
             <input id="Subject" name="Subject" type="text" placeholder="נושא" class="form-control">
             </div>
             </div>
             
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="fas fa-file-pdf bigicon"></i></span>
             <div class="col-md-10">
             <input id="Type" name="Type" type="text" placeholder="סוג" class="form-control">
             </div>
             </div>
             
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-table bigicon"></i></span>
             <div class="col-md-10">
                <!--<input id="Date" name="Date" type="date" placeholder="תאריך" class="form-control">-->
             <input id="Date" name="Date" type="text" placeholder="שנה" class="form-control">
             </div>
             </div>
             
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
             <div class="col-md-10">
             <textarea class="form-control" id="Comments" name="Comments" placeholder="הערות" rows="5"></textarea>
             </div>
             </div>
             
             <div class="form-group">
             <span class="col-md-1 col-md-offset-2 text-center"><i class="far fa-folder-open bigicon"></i></span>
             <div class="col-md-10">
             <input id="File" name="File" type="file" placeholder="בחר קובץ" class="form-control">
             </div>
             </div>
             
             <div class="form-group">
             <div class="col-md-10 text-center">
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
        </div>
    </div>
<?php 
    include 'Footer.php';
?>