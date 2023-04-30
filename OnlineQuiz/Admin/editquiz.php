<?php
	include_once('config.php');
	session_start();
	$userid=$_SESSION['userid'];
	if(!$userid){
		header('location:adminlogin.php');
	}
	$quizid=$_GET['quizid'];
	if(!$quizid){
		header('location:managequiz.php');
	}
	$sql=mysqli_query($conn,"select * from addquiz where sl='$quizid'");
	if(mysqli_num_rows($sql)>0){
		$fetch=mysqli_fetch_assoc($sql);
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>online exam</title>
	<link rel="stylesheet" href="../css/editteacher.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<script>
		function messagehide(){
			dom=document.getElementById("message").style;
			dom.visibility="hidden";
			location.href="managequiz.php";
		}
	</script>
</head>
<body>
			<?php 
				if(isset($_POST['submit'])){
					$quizname=mysqli_real_escape_string($conn,$_POST['quizname']);
					$noofquestions=mysqli_real_escape_string($conn,$_POST['noofquestions']);
					$quizstartdate=mysqli_real_escape_string($conn,$_POST['quizstartdate']);
					$quizenddate=mysqli_real_escape_string($conn,$_POST['quizenddate']);
					$status=mysqli_real_escape_string($conn,$_POST['status']);
					
					$select=mysqli_query($conn,"update addquiz set quizname='$quizname',noofquestions='$noofquestions',quizstartdate='$quizstartdate',quizenddate='$quizenddate',status='$status' where sl='$quizid'");
					if($select){
						echo '<div class="message" id="message">Updated successfully<span id="cross" onclick="messagehide()">&times;</span></div>';
					}
					else{
						echo '<div class="message" id="message">Not Updated successfully<span id="cross" onclick="messagehide()">&times;</span></div>';
					}
				}
			?>
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
	<section class="teacher-list">
		<div class="teachers-box">
			
			<p>Update Quiz</p>
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label>Enter Quizame</label>
					<input type="text" name="quizname" <?php echo 'value="'.$fetch['quizname'].'"';?> required>
				</div>
				<div class="form-group">
					<label>Enter No Of Questions</label>
					<input type="text" name="noofquestions" <?php echo 'value="'.$fetch['noofquestions'].'"';?> required>
				</div>
				<div class="form-group">
					<label>Enter Quiz Start Date</label>
					<input type="date" name="quizstartdate" <?php echo 'value="'.$fetch['quizstartdate'].'"';?> required>
				</div>
				<div class="form-group">
					<label>Enter Quiz End Date</label>
					<input type="date" name="quizenddate" <?php echo 'value="'.$fetch['quizenddate'].'"';?> required>
				</div>
				<div class="form-group">
					<label>Enter Your Status</label>
					<input type="text" name="status" <?php echo 'value="'.$fetch['status'].'"';?> required>
				</div>
				<button name="submit">Update</button>
			</form>
		</div>
	</section>
</body>
</html>