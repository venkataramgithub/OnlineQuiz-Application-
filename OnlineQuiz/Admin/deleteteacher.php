<?php
	include_once('config.php');
	$userid=$_SESSION['userid'];
	if(!$userid){
		header('location:adminlogin.php');
	}
	$teacherid=$_GET['teacherid'];
	if(!$teacherid){
		header('location:manageuser.php');
	}
	$sql=mysqli_query($conn,"delete from teacherregistration where sl='$teacherid'");
	if($sql){
		header('location:manageuser.php');
	}
?>