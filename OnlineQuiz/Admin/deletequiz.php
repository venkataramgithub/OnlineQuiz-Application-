<?php
	include_once('config.php');
	session_start();
	$userid=$_SESSION['userid'];
	if(!$userid){
		header('location:adminlogin.php');
	}
	$quizid=$_GET['quizid'];
	if(!$quizid){
		header('location:managequiz.php');
	}
	$sql=mysqli_query($conn,"delete from addquiz where sl='$quizid'");
	if($sql){
		header('location:managequiz.php');
	}
?>