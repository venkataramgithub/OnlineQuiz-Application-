<?php
	include_once("config.php");
	session_start();
	$userid=$_SESSION['userid'];
	if(!isset($userid)){
		header('location:adminlogin.php');
	}
	$subject=$_GET['subject'];
	if(!$subject){
		header('location:result.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>online exam</title>
	<link rel="stylesheet" href="../css/subjectresult.css">
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
		<div class="teachers-box">
			<a href="results.php"><i class="fas fa-arrow-left"></i></a><p><?php echo $subject ?> Results</p>
			<div class="search-box">
				<form method="post" action="" enctype="multipart/form-data">
					<input type="search" name="search" placeholder="Enter Name to Search results" required><button name="search-btn"><i class="fas fa-search"></i>
				</button>
			</form> 
			<div class="table-manage">
				<table>
					<thead>
						<tr>
							<th>Sl</th>
							<th>Name</th>
							<th>Marks</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(isset($_POST['search-btn'])){
								$search=mysqli_real_escape_string($conn,$_POST['search']);
								$row=mysqli_query($conn,"select * from results where name='$search'");;
								if(mysqli_num_rows($row)>0){
									while($fetch=mysqli_fetch_assoc($row)){
										echo '<tr>
												<td>'.$fetch['studentsl'].'</td>
												<td>'.$fetch['name'].'</td>
												<td>'.$fetch['marks'].'</td>
											</tr>';
									}
								}
								else{
									echo '<div>No Results are found</div>';
								}
							}
							else{
								$row=mysqli_query($conn,"select * from results where subject='$subject'");;
								if(mysqli_num_rows($row)>0){
									while($fetch=mysqli_fetch_assoc($row)){
										echo '<tr>
												<td>'.$fetch['studentsl'].'</td>
												<td>'.$fetch['name'].'</td>
												<td>'.$fetch['marks'].'</td>
											</tr>';
									}
								}
								else{
									echo '<div>No Results are found</div>';
								}
							}	
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</body>
</html>