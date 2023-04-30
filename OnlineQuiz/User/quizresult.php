<?php
	include_once("config.php");
	session_start();
	$userid=$_SESSION['userid'];
	if(!$userid){
		header('location:userlogin.php');
	}
	$quizname=$_GET['quizname'];
	if(!$quizname){
		header('history.php');
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
			<h2>Quiz Results</h2>
			<div class="subject-list">
				<p style="font-size:20px;"><a href="history.php" style="margin-right:150px;"><i class="fas fa-arrow-left"></i><a><?php echo $quizname; ?></p>
					<?php
						$sql=mysqli_query($conn,"select * from addquiz where quizname='$quizname'");
						$totalquestions=mysqli_fetch_assoc($sql);
						$result=mysqli_query($conn,"select * from results where subject='$quizname'");
						$correctanswer=mysqli_fetch_assoc($result);
						echo '<p>Total No Of Questions:<span>'.$totalquestions['noofquestions'].'</span></p>
							<p>Total No Of Correct Questions:<span>'.$correctanswer['marks'].'</span></p>
							<p>Total No Of Wrong Questions:<span>'.$totalquestions['noofquestions']-$correctanswer['marks'].'</span></p>
							<p>Total Marks:<span>'.$correctanswer['marks'].'</span></p>';
					?>				
			</div>
		</div>
	</section>
</body>
</html