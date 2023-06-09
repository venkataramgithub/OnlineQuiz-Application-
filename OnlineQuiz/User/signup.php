<?php
	include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Online Quiz</title>
	<link rel="stylesheet" href="../css/signup.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<script type="text/javascript">
		function messagehide() {
			dom=document.getElementById("message").style;
			dom.visibility="hidden";
			location.href="userlogin.php";
		}
		function showpassword() {
			var eyeopen=document.getElementById("eyeopen").style;
			var eyeclose=document.getElementById("eyeclose").style;
			var password=document.getElementById("password");
			if(password.type=="password"){
				password.type="text";
				eyeclose.display="none";
				eyeopen.display="block";
			}
			else{
				password.type="password";
				eyeclose.display="block";
				eyeopen.display="none";
			}

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

			$select=mysqli_query($conn,"select * from studentregistration where Email='$email' and Password='$password'");
			if(mysqli_num_rows($select)>0){
				echo '<div class="message" id="message">User already exist<span onclick="messagehid()">&times;</span></div>';
			}
			else{
				$sql=mysqli_query($conn,"insert into studentregistration(Name,Phone,Gender,Email,Password,Institute,Course) values('$name','$phone','$gender','$email','$password','$institute','$course')");
				if($sql){
					echo '<div class="message" id="message">User registration completed<span onclick="messagehid()">&times;</span></div>';
				}
				else{
					echo '<div class="message" id="message">User registration failed<span onclick="messagehid()">&times;</span></div>';
				}
			}
		}
	?>
	<section class="container">
		<div class="header">
			<img src="../RExamsimages/ramlogo.png" alt="logo">
			<p>RExaminations</p>
		</div>
		<div class="register">
			<p>SignUp</p>
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label>Enter Name</label>
					<input type="text" name="name" required>
				</div>
				<div class="form-group">
					<label>Enter Phone</label>
					<input type="text" name="phone" required>
				</div>
				<div class="form-group1">
					<label>Select Gender</label>
					<input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female<input type="radio" name="gender" value="other">Other
				</div>
				<div class="form-group">
					<label>Enter Email</label>
					<input type="email" name="email" required>
				</div>
				<div class="form-group">
					<label>Enter Password</label>
					<input type="password" name="password" required>
					<span id="eyeopen"><i class="fas fa-eye" onclick="showpassword()"></i></span><span id="eyeclose"><i class="fas fa-eye-slash" onclick="showpassword()"></i></span>
				</div>
				<div class="form-group">
					<label>Enter Institute</label>
					<input type="text" name="institute" required>
				</div>
				<div class="form-group">
					<label>Course</label>
					<select name="course">
						<option>Select Course</option>
						<option>Below Tenth</option>
						<option>Intermediate</option>
						<option>Degree</option>
						<option>B.Tech</option>
					</select>
				</div>
				<button name="submit">SignUp</button>
				<p class="remain">Already signed up?<a href="userlogin.php">login now</a></p>
			</form>
		</div>
	</section>
</body>
</html>
	</section>
</body>
</html>	