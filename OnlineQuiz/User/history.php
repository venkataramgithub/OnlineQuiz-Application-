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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<title>Online Quiz</title>
</head>
<body>
	<section class="container">
		<div class="header">
			<div>
				<img src="../RExamsimages/ramlogo.png">
				<h4 style="margin-top:-30px;color:indianred;margin-left: 5px;">RExaminations</h4>
			</div>
			<div class="nav">
				<ul>
					<li><a href="homepage.php"><i class="fas fa-home"></i>Home</a></li>
					<li><a href="history.php"><i class="fas fa-history"></i>History</a></li>
				</ul>
				<form method="post" action=""><button name="logout"><i class="fas fa-sign-out"></i>Logout</button></form>
			</div>
			
		</div>
		
		<div class="home-container">
			<h2>Quiz History</h2>
			<div class="subject-list">
				<p>select subject to view your results</p>
				<?php 
					$subject=mysqli_query($conn,"select * from results where studentsl='$userid'");
					if(mysqli_num_rows($subject)>0){
						$i=1;
						while($quiz=mysqli_fetch_assoc($subject)){
							echo '<p>'.$i.'. <a href="quizresult.php?quizname='.$quiz['subject'].'">'.$quiz['subject'].'</a></p>'; 
							$i++;
						}
					}
				?>
			</div>
		</div>
	</section>
</body>
</html