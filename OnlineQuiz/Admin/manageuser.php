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
							<li><a href="#">Manage Quiz</a></li>
							<li><a href="addquizquestion.php">Add Quiz Question</a></li>
							<li><a href="#">Manage Quiz Question</a></li>
							<li><a href="#">Answer Details</a></li>
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
					<tr>
						<td>1</td>
						<td>Samsundhar</td>
						<td>9211308876</td>
						<td>Male</td>
						<td>samsundhar@gmail.com</td>
						<td>sam123</td>
						<td>Computer Organization</td>
						<td><button name="edit">Edit</button><button name="delete">Delete</button></td>
					</tr>
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
					<tr>
						<td>1</td>
						<td>Samsundhar</td>
						<td>9211308876</td>
						<td>Male</td>
						<td>samsundhar@gmail.com</td>
						<td>sam123</td>
						<td>Computer Organization</td>
						<td>B.Tech</td>
						<td><button name="edit">Edit</button><button name="delete">Delete</button></td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>
</body>
</html>