<?php
session_start();
require "../../../cengFiles/includes/functions.php";
$app= new Ceng();

if(isset($_POST['getchats'])){
	$app->getChatList();
	//echo 1;
}elseif(isset($_POST['getchats2'])){
	$app->getChatList2();
}elseif(isset($_POST['user']) && isset($_POST['msg'])){
	//echo 1;
	$app->addChat($_POST['user'],$_POST['msg']);
}
?>