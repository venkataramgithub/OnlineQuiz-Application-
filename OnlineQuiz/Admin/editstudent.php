<?php
	include_once('config.php');
	session_start();
	$userid=$_SESSION['userid'];
	if(!$userid){
		header('location:adminlogin.php');
	}
	$studentid=$_GET['studentid'];
	if(!$studentid){
		header('location:manageuser.php');
	}
	$sql=mysqli_query($conn,"select * from studentregistration where sl='$studentid'");
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
		}
	</script>
</head>
<body>
			<?php 
				if(isset($_POST['submit'])){
					$name=mysqli_real_escape_string($conn,$_POST['name']);
					$phone=mysqli_real_escape_string($conn,$_POST['phone']);
					$gender=mysqli_real_escape_string($conn,$_POST['gender']);
					$email=mysqli_real_escape_string($conn,$_POST['email']);
					$password=mysqli_real_escape_string($conn,$_POST['password']);
					$institute=mysqli_real_escape_string($conn,$_POST['institute']);
					$course=mysqli_real_escape_string($conn,$_POST['course']);

					$select=mysqli_query($conn,"update studentregistration set Name='$name',Phone='$phone',Gender='$gender',Email='$email',Password='$password',Institute='$institute',Course='$course' where sl='$studentid'");
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
							<li><a href="results.php">Answer Details</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</section>
	<section class="teacher-list">
		<div class="teachers-box">
			
			<p>Update Student SignUp</p>
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label>Enter Name</label>
					<input type="text" name="name" <?php echo 'value="'.$fetch['Name'].'"';?> required>
				</div>
				<div class="form-group">
					<label>Enter Phone</label>
					<input type="text" name="phone" <?php echo 'value="'.$fetch['Phone'].'"';?> required>
				</div>
				<div class="form-group1">
					<label>Select Gender</label>
					<input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female<input type="radio" name="gender" value="other">Other
				</div>
				<div class="form-group">
					<label>Enter Email</label>
					<input type="email" name="email" <?php echo 'value="'.$fetch['Email'].'"';?> required>
				</div>
				<div class="form-group">
					<label>Enter Password</label>
					<input type="password" name="password" <?php echo 'value="'.$fetch['Password'].'"';?> required>
				</div>
				<div class="form-group">
					<label>Enter Your Institute</label>
					<input type="text" name="institute" <?php echo 'value="'.$fetch['Institute'].'"';?> required>
				</div>
				<div class="form-group">
					<label>Enter Your Course</label>
					<input type="text" name="course" <?php echo 'value="'.$fetch['Course'].'"';?> required>
				</div>
				<button name="submit">Update</button>
			</form>
		</div>
	</section>
</body>
</html>