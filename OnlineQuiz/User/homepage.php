<?php
	include_once("config.php");
	session_start();
	$userid=$_SESSION['userid'];
	if(!$userid){
		header('location:userlogin.php');
	}
	$sql=mysqli_query($conn,"select * from studentregistration where sl='$userid'");
	if(mysqli_num_rows($sql)>0){
		$fetch=mysqli_fetch_assoc($sql);
	}
	if(isset($_POST['logout'])){
		unset($userid);
		session_destroy();
		header('location:userlogin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/homepage.css">
	<title>Online Quiz</title>
</head>
<body>
	<section class="container">
		<div class="header">
			<img src="../RExamsimages/ramlogo.png">
			<h4 style="margin-top:-30px;color:indianred;margin-left: 5px;">RExaminations</h4>
		</div>
		<form method="post" action=""><button name="logout">Logout</button></form>
		<div class="home-container">
			<h2>Online Quiz</h2>
			<p>Welcome <?php echo $fetch['Name'] ?> in Online Quiz,select your quiz and then click on to start your quiz</p>
			<div class="subject-list">
				<span>select subject</span>
				<?php
					$subject=mysqli_query($conn,"select * from addquiz");
					if(mysqli_num_rows($subject)>0){
						while($quiz=mysqli_fetch_assoc($subject)){
							echo '<p>'.$quiz['quizname'].'<a href="quiz.php?quizname='.$quiz['quizname'].'">click here</a></p>'; 
						}
					}
				?>
			</div>
		</div>
	</section>
</body>
</html