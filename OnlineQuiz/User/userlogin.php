<?php
	include_once("config.php");
	session_start();
	if(isset($_POST['login'])){
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$password=mysqli_real_escape_string($conn,$_POST['password']);

		$select=mysqli_query($conn,"select * from studentregistration where Email='$email' and Password='$password'");
		if(mysqli_num_rows($select)>0){
			$fetch=mysqli_fetch_assoc($select);
			$_SESSION['userid']=$fetch['sl'];
			header('location:homepage.php');
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Examinations</title>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.5.2/css/all.min.css">
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
	<section class="container">
		<div class="home-container">
			<div class="box-1">
				<h2>Welcome to Online <br><span>RExaminations</span></h2>
				<img src="../RExamsimages/login.png" alt="login img">
			</div>
			<div class="box-2">
				<form method="post" action="">
					<p>Login page</p>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" required>
						<p><input type="checkbox" name="check"><label>show password</label><p>
					</div>
					<button name="login">Login</button><br>
					<span>don't hava an account?<a href="signup.php">signup now</a></span>
				</form>
			</div>
		</div>
	</section>
</body>
</html>