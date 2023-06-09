<?php
	include_once('config.php');
	session_start();
	$userid=$_SESSION['userid'];
	if(!$userid){
		header('location:adminlogin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>online exam</title>
	<link rel="stylesheet" href="../css/adminhomepage.css">
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
							<li><a href="managequiz.php">Manage Quiz</a></li>
							<li><a href="addquizquestion.php">Add Quiz Question</a></li>
							<li><a href="managequizquestion.php">Manage Quiz Question</a></li>
							<li><a href="results.php">Answer Details</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</section>
	<section class="home-container">
		<div class="home-box">
			<i class="fas fa-user"></i>
			<div class="details">
				<p>Total Examiners</p>
				<span><?php
						$sql=mysqli_query($conn,"select count(*) from teacherregistration");
						if(mysqli_num_rows($sql)>0){
							$fetch=mysqli_fetch_assoc($sql);
							echo $fetch['count(*)'];
						}
				?></span>
			</div>
		</div>
		<div class="home-box">
			<i class="fas fa-user"></i>
			<div class="details">
				<p>Total Students</p>
				<span><?php
						$sql=mysqli_query($conn,"select count(*) from studentregistration");
						if(mysqli_num_rows($sql)>0){
							$fetch=mysqli_fetch_assoc($sql);
							echo $fetch['count(*)'];
						}
				?></span>
			</div>
		</div>
		<div class="home-box">
			<i class="fas fa-user"></i>
			<div class="details">
				<p>Total Quizs</p>
				<span><?php
						$sql=mysqli_query($conn,"select count(*) from addquiz");
						if(mysqli_num_rows($sql)>0){
							$fetch=mysqli_fetch_assoc($sql);
							echo $fetch['count(*)'];
						}
				?></span>
			</div>
		</div>
	</section>
</body>
</html>