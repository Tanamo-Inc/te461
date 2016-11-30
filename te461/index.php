<?php
session_start();
require "../cengFiles/includes/functions.php";
$ceng= new Ceng();
$ceng->checkIfLoggedIn2();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TE 461 |  Welcome</title>
	<?php include "../cengFiles/includes/scripts.php"; ?>
</head>

<body style="background-color: #fff;">
	<div class="row" style="background-color: #3a3a3a;">
        <center><h4 href="#" style="color: #fff; font-size: 20px;"><span style="color: #fff; font-weight: bold;"><img src="images/logo.png" style="width: 30px; height: 30px; padding: 0px; border-radius: 50px; -webkit-border-radius: 50px; -moz-border-radius: 50px;" class="rotMe" />&nbsp;&nbsp;TE 461&nbsp;&nbsp;&nbsp; </span>| &nbsp;&nbsp;&nbsp;Students' Portal <span class="glyphicon glyphicon-education" style="width: 50px;"></span></h4></center>
    </div>

	<div class="row" style="background-color: yellow; height: 5px;">
		&nbsp;
	</div>

	<div class="row">
		<br/><br/>
	</div>

	<div class="row">
		<div class="col-md-3">
			<!-- sidebar -->
			<?php include "../cengFiles/includes/portal/sidebar.php"; ?>
			<!--sidebar -->
		</div>
		<div class="col-md-9">
			<?php
				$ceng->loadPortalContent();
			?>
		</div>
	</div>


</body>

</html>


