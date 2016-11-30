<?php
require "../../../cengFiles/includes/functions.php";
$ajax = new Ceng();
if(isset($_POST['deletestudent'])){
	$ajax->deleteStudentDetails($_POST['deletestudent']);
}
?>