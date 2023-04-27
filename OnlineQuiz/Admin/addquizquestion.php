<?php
	include_once("config.php");
	session_start();
	$userid=$_SESSION['userid'];
	if(!isset($userid)){
		header('location:adminlogin.php');
	}
	if(isset($_POST['submit'])){
		$quizname=mysqli_real_escape_string($conn,$_POST['quizname']);
		$question=mysqli_real_escape_string($conn,$_POST['question']);
		$option1=mysqli_real_escape_string($conn,$_POST['option1']);
		$option2=mysqli_real_escape_string($conn,$_POST['option2']);
		$option3=mysqli_real_escape_string($conn,$_POST['option3']);
		$option4=mysqli_real_escape_string($conn,$_POST['option4']);
		$correctanswer=mysqli_real_escape_string($conn,$_POST['option']);

		$sql=mysqli_query($conn,"insert into quizquestion(quizname,question,option1,option2,option3,option4,correctoption) values('$quizname','$question','$option1','$option2','$option3','$option4','$correctanswer')");
		if(!$sql){
			echo 'data not inserted';
		}
		else{
			echo 'data inserted';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>online exam</title>
	<link rel="stylesheet" href="../css/addquizquestion.css">
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
		<div class="teachers-box">
			<p>Add Quiz Question</p>
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label>Quiz Name</label>
					<input type="text" name="quizname" required>
				</div>
				<div class="form-group">
					<label>Question</label>
					<input type="text" name="question" required>
				</div>
				<div class="form-group1">
					<label>Option1:</label>
					<input type="text" name="option1" required>
					<label>Option2:</label>
					<input type="text" name="option2" required>
				</div>
				<div class="form-group1">
					<label>Option3:</label>
					<input type="text" name="option3" required>
					<label>Option4:</label>
					<input type="text" name="option4" required>
				</div>
				<div class="form-group2">
					<label>Correct Option:</label>
					<input type="radio" name="option" value='1' required>option1
					<input type="radio" name="option" value='2' required>option2
					<input type="radio" name="option" value='3' required>option3
					<input type="radio" name="option" value='4' required>option4
				</div>
				<button name="submit">Submit</button><button type="reset" class="reset">reset</button>
			</form>
		</div>
	</section>
</body>
</html>