<?php
	include_once('config.php');
	$userid=$_SESSION['userid'];
	if(!$userid){
		header('location:adminlogin.php');
	}
	$studentid=$_GET['studentid'];
	if(!$studentid){
		header('location:manageuser.php');
	}
	$sql=mysqli_query($conn,"delete from studentregistration where sl='$studentid'");
	if($sql){
		header('location:manageuser.php');
	}
?>