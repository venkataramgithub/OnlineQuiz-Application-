<?php
	include_once("config.php");
	session_start();
	$userid=$_SESSION['userid'];
	if(!$userid){
		header('location:adminlogin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>online exam</title>
	<link rel="stylesheet" href="../css/teacherlist.css">
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
		<img src="../RExamsimages/teacherimage.jpg">
		<div class="teachers-box">
			<p>Teachers list</p>
			<table>
				<thead>
					<tr>
						<th>Sl</th>
						<th>Teacher Name</th>
						<th>Phone</th>
						<th>Gender</th>
						<th>Email</th>
						<th>Password</th>
						<th>Subject</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql=mysqli_query($conn,"select * from teacherregistration");
						if(mysqli_num_rows($sql)>0){
							while($fetch=mysqli_fetch_assoc($sql)){
								echo '<tr>
									<td>'.$fetch['sl'].'</td>
									<td>'.$fetch['Teachername'].'</td>
									<td>'.$fetch['Phone'].'</td>
									<td>'.$fetch['Gender'].'</td>
									<td>'.$fetch['Email'].'</td>
									<td>'.$fetch['Password'].'</td>
									<td>'.$fetch['Subject'].'</td>
									<td><button><a href="editteacher.php?teacherid='.$fetch['sl'].'" style="color:white;"><i class="fas fa-edit"></i>Edit</a></button><button><a href="deleteteacher.php?teacherid='.$fetch['sl'].'" style="color:white;"><i class="fas fa-trash"></i>Delete</button></td>
								</tr>';
							}
						}
					?>
				</tbody>
			</table>
			<p class="student-list">Students list</p>
			<table>
				<thead>
					<tr>
						<th>Sl</th>
						<th>Name</th>
						<th>Phone</th>
						<th>Gender</th>
						<th>Email</th>
						<th>Password</th>
						<th>Institute</th>
						<th>Course</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$sql=mysqli_query($conn,"select * from studentregistration");
						if(mysqli_num_rows($sql)>0){
							while($fetch=mysqli_fetch_assoc($sql)){
								echo '<tr>
									<td>'.$fetch['sl'].'</td>
									<td>'.$fetch['Name'].'</td>
									<td>'.$fetch['Phone'].'</td>
									<td>'.$fetch['Gender'].'</td>
									<td>'.$fetch['Email'].'</td>
									<td>'.$fetch['Password'].'</td>
									<td>'.$fetch['Institute'].'</td>
									<td>'.$fetch['Course'].'</td>
									<td><button><a href="editstudent.php?studentid='.$fetch['sl'].'" style="color:white;"><i class="fas fa-edit"></i>Edit</a></button><button><a href="studentdelete.php?studentid='.$fetch['sl'].'" style="color:white;"><i class="fas fa-trash"></i>Delete</a></button></td>
								</tr>';
							}
						}
					?>
				</tbody>
			</table>
		</div>
	</section>
</body>
</html>