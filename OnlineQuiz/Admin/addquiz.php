<?php
	include_once("config.php");
	session_start();
	$userid=$_SESSION['userid'];
	if(!isset($userid)){
		header('location:adminlogin.php');
	}
	if(isset($_POST['submit'])){
		$quizname=mysqli_real_escape_string($conn,$_POST['quizname']);
		$startdate=mysqli_real_escape_string($conn,$_POST['startdate']);
		$enddate=mysqli_real_escape_string($conn,$_POST['enddate']);
		$status=mysqli_real_escape_string($conn,$_POST['status']);

		$sql=mysqli_query($conn,"insert into addquiz(quizname,quizstartdate,quizenddate,status) values('$quizname','$startdate','$enddate','$status')");
		if(!$sql){
			echo 'data not inserted';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>online exam</title>
	<link rel="stylesheet" href="../css/addquiz.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
	<section class="container">
		<div class="header">
			<img src="../RExamsimages/ramlogo.png">
			<p>Rxaminations</p>
		</div>
		<div class="nav">
			<ul>
				<li><a href="adminhome.php">Dashboard</a></li>
				<li>User Management&ensp;<i class="fa fa-plus"></i>
					<div class="sub-list">
						<ul>
							<li><a href="adminsignup.php">Add New User</a></li>
							<li><a href="manageuser.php">Manage User</a></li>
						</ul>
					</div>
				</li>
				<li>Quiz Management&ensp;<i class="fa fa-plus"></i>
					<div class="sub-list">
						<ul>
							<li><a href="addquiz.php">Add Quiz</a></li>
							<li><a href="#">Manage Quiz</a></li>
							<li><a href="addquizquestion.php">Add Quiz Question</a></li>
							<li><a href="#">Manage Quiz Question</a></li>
							<li><a href="#">Answer Details</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</section>
	<section class="teacher-list">
		<img src="../RExamsimages/addquiz.jpg">
		<div class="teachers-box">
			<p>Add Quiz</p>
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label>Quiz Name</label>
					<input type="text" name="quizname" required>
				</div>
				<div class="form-group">
					<label>Start date</label>
					<input type="date" name="startdate" required>
				</div>
				<div class="form-group">
					<label>End date</label>
					<input type="date" name="enddate" required>
				</div>
				<div class="form-group">
					<label>Status</label>
					<input type="text" name="status" required>
				</div>
				<button name="submit">Submit</button><button type="reset" class="reset">reset</button>
			</form>
		</div>
	</section>
</body>
</html>