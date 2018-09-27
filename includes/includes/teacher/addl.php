<php include ('formtoserver.php');

session_start ();

?>

<html dir="rtl">
    <head>
        <!--load css-->
	        <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	
	        <!--load jquery before js-->
	       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	       <script src='https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js'></script>

            <!--load js-->
             <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        	<script language="JavaScript" type="text/javascript"></script>

 
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="imagetoolbar" content="no" />
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<meta name="description" content="" />
		<meta charset="UTF-8">
		<title>הכנסת תחומי לימוד</title>
        <!--hide div coardnitions onload--> 
    </head>
    
    <body>
        <h1> הכנס תחומי לימוד ומחירים: </h1>
        <form action = "formtoserver.php" method = "post">
 
        <table class="table table-hover table-bordered">
        
            <tr>
               <td> <label for = "lesson">שיעור</label></td>
			    <td><input type="text" name = "lesson" id="lesson" required></input>	 </td>
			    <td> <label for = "price">מחיר</label></td>
			    <td><input type="text" name="price" id="price" required></input>	 </td>
			</tr> 
			
			</table>
		<input type="submit" name="addl" id="addl" >הוסף</input>
		</form>
    </body>
    
</html>