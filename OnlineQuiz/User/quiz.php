<?php
	include_once('config.php');
	session_start();
	$userid=$_SESSION['userid'];
	if(!isset($userid)){
		header('location:userlogin.php');
	}
	$quizname=$_GET['quizname'];
	if(!isset($quizname)){
		header('location:userlogin.php');
	}
	
	$select=mysqli_query($conn,"select * from quizquestion where quizname='$quizname'");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>online quiz</title>
	<link rel="stylesheet" href="../css/quizpage.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<script>
		function messagehide() {
			dom=document.getElementById("message").style;
			dom.visibility="hidden";
			location.href="homepage.php";
		}
		function messagehid() {
			dom=document.getElementById("message").style;
			dom.visibility="hidden";
			location.href="homepage.php";
		}
	</script>
</head>
<body>
	<?php
		$quizattempt=mysqli_query($conn,"select * from results where studentsl='$userid' and subject='$quizname'");
		if(mysqli_num_rows($quizattempt)>0){
			echo '<div class="message" id="message">Quiz already Completed by you<span onclick="messagehid()">&times;</span></div>';
		}
		if(isset($_POST['submit'])){
			$result=mysqli_query($conn,"select * from results where studentsl='$userid'");
			if(mysqli_num_rows($result)>0){
				echo '<div class="message" id="message">quiz already Completed<span onclick="messagehide()">&times;</span></div>';
			}
			else{
				$noofquestions=mysqli_query($conn,"select * from addquiz where quizname='$quizname'");
				if(mysqli_num_rows($noofquestions)>0){
					$fetcharr=mysqli_fetch_assoc($noofquestions);
					$answers=mysqli_query($conn,"select * from quizquestion where quizname='$quizname'");
					if(mysqli_num_rows($answers)>0){
						$i=1;
						$score=0;
						while($i<$fetcharr['noofquestions']+1 and $correctanswer=mysqli_fetch_assoc($answers)){
							if($_POST['question'.$i]==$correctanswer['correctoption']){
								$score++;
							}
							$i++;
						}
					}
				}
				$name=mysqli_query($conn,"select * from studentregistration where sl='$userid'");
				if(mysqli_num_rows($name)>0){
					$studentarr=mysqli_fetch_assoc($name);
					$studentname=$studentarr['Name'];
					$result=mysqli_query($conn,"insert into results(studentsl,name,subject,marks) values('$userid','$studentname','$quizname','$score')");
					if($result){
						echo '<div class="message" id="message">quiz submitted successfully<span onclick="messagehide()">&times;</span></div>';
					}
					else{
						echo '<div class="message">quiz not results updated<span onclick="messagehide()">&times;</span></div>';
					}
				}
			}
		}
	?>
	<section class="container">
		<div class="header">
			<img src="../RExamsimages/ramlogo.png">
			<p>Rxaminations</p>
		</div>
		<div class="quiz-container">
			<p><?php echo $quizname.' Quiz'?> </p>
			<form method="post" action="" enctype="multipart/form-data">
			<?php
				if(mysqli_num_rows($select)>0){
					$i=1;
					while($result=mysqli_fetch_assoc($select)){
						echo '<div class="quiz-box">
							<h3>'.$i.'.'.$result['question'].'</h3>
							<div class="options">
								<input type="radio" name="question'.$i.'" value="1"><label>'.$result['option1'].'</label><br><br>
								<input type="radio" name="question'.$i.'" value="2"><label>'.$result['option2'].'</label><br><br>
								<input type="radio" name="question'.$i.'" value="3"><label>'.$result['option3'].'</label><br><br>
								<input type="radio" name="question'.$i.'" value="4"><label>'.$result['option4'].'</label><br>
							</div>
						</div>';
						$i++;
					}
				}
			?>
			<input type="checkbox" name="check" required><label>Before clicking submit button,Check once your answers and check you answered all or not.</label><br>
			<button class="submit" type="submit" name="submit">Submit</button></form>
		</div>
	</section>

</body>
</html>