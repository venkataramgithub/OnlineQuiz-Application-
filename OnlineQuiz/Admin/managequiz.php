<?php
	include_once("config.php");
	session_start();
	$userid=$_SESSION['userid'];
	if(!isset($userid)){
		header('location:adminlogin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>online exam</title>
	<link rel="stylesheet" href="../css/managequiz.css">
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
			<p>Manage Quiz</p>
			<table>
				<thead>
					<tr>
						<th>Sl</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$sql=mysqli_query($conn,"select * from addquiz");
						if(mysqli_num_rows($sql)>0){
							$i=1;
							while($fetch=mysqli_fetch_assoc($sql)){
								echo '<tr>
										<td>'.$i.'</td>
										<td>'.$fetch['quizname'].'</td>
										<td><button><a href="editquiz.php?quizid='.$fetch['sl'].'
										" style="color:white;"><i class="fas fa-edit"></i>Edit</a></button><button><a href="deletequiz.php?quizid='.$fetch['sl'].'" style="color:white;"><i class="fas fa-trash"></i>Delete</a></button></td>
									</tr>';
								$i++;
							}
						}
					
					?>
				</tbody>
			</table>
		</div>
	</section>
</body>
</html>