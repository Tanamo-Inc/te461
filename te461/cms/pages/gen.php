<?php
require "../../../geotechfiles/includes/functions.php";
$app = new Enersmart();
if(isset($_GET['aygec'])){
	$app->genaygeccsv();	
}else{
	echo "<script>
			close();
		</script>";
}

?>