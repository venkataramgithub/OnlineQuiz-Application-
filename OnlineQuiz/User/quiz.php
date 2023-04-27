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
</head>
<body>
	<section class="container">
		<div class="header">
			<img src="../RExamsimages/ramlogo.png">
			<p>Rxaminations</p>
		</div>
		<div class="quiz-container">
			<p><?php echo $quizname.' Quiz'?> </p>
			<form method="post" action="" enctype="multipart/form-data">
				<input type="text" name="textbox">
			<?php
				if(mysqli_num_rows($select)>0){
					$i=1;
					while($result=mysqli_fetch_assoc($select)){
						echo '<div class="quiz-box">
							<h3>'.$i.'.'.$result['question'].'</h3>
							<div class="options">
								<input type="radio" name="question'.$i.'" value="'.$result['option1'].'"><label>'.$result['option1'].'</label><br><br>
								<input type="radio" name="question'.$i.'" value="'.$result['option2'].'"><label>'.$result['option2'].'</label><br><br>
								<input type="radio" name="question'.$i.'" value="'.$result['option3'].'"><label>'.$result['option3'].'</label><br><br>
								<input type="radio" name="question'.$i.'" value="'.$result['option4'].'"><label>'.$result['option4'].'</label><br>
							</div>
						</div>';
						$i++;
					}
				}
			?>
			<input type="checkbox" name="check" required><label>Before clicking submit button,Check once your answers and check you answered all or not.</label><br>
			<button class="submit" type="submit" name="submit">Submit</button><p>
			<?php
				if(isset($_POST['submit'])){
					$textbox=$_POST['textbox'];
					$question1=$_POST['question1'];
					$quest2=$_POST['question2'];
					echo $textbox.' ';
					echo $question1.'\n';
					echo $quest2.'\n';
				}
			 ?></p></form>
		</div>
	</section>

</body>
</html>