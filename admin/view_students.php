
<?php 
	if (!isset($_SESSION['user_pass'])) {
		header("Location:login.php");
	}
?>
<div class="right">
	<div class="right-layout">
		<div class="view_detail_heading">
			<div class="student_add">
				<div class="student_number" style="background-color: #c9faee; border-left: 10px solid #06bd90;">
					<h4>No of students:</h4>
					<?php 
						include('config/db.php');
						$fetch_students=$con->prepare("select * from student_name");
						$fetch_students->setFetchMode(PDO:: FETCH_ASSOC);
						$fetch_students->execute();

						$count = $fetch_students->rowCount();

					 ?>
					<p><?php echo $count ?></p>
				</div>
				<div class="student_number" style="background-color: #fcbe9b; border-left: 10px solid #e15c10;">
					<h4>No of Female:</h4>
					<?php 
						include('config/db.php');
						$fetch_female=$con->prepare("select * from student_name where gender='1'");
						$fetch_female->setFetchMode(PDO:: FETCH_ASSOC);
						$fetch_female->execute();

						$count = $fetch_female->rowCount();
					 ?>
					<p><?php echo $count ?></p>
				</div>
				<div class="student_number" style="background-color: #fdeb9a; border-left: 10px solid #facf0d;">
					<h4>No of Male:</h4>
					<?php 
						include('config/db.php');
						$fetch_male=$con->prepare("select * from student_name where gender='2'");
						$fetch_male->setFetchMode(PDO:: FETCH_ASSOC);
						$fetch_male->execute();

						$count = $fetch_male->rowCount();
					 ?>
					<p><?php echo $count ?></p>
				</div>
			</div>
			<div class="student_add_form">
				<span><a href="index.php?student_form"><i class="fa fa-plus"></i></span>Add Students</a>
			</div>
		</div>


			<div class="table_header">
				<h3>Student Dashboard</h3>
				<div class="table_search">
					<p style="width: 500px;"><marquee direction="left">in this dashboard view all the students name and their details</marquee></p>
				</div>
				<div class="table_search">
					<input type="search" name="">
					<i class="fa fa-search"></i>
				</div>
			</div>
			<div class="view_table">
			<table >
				<thead>
					<tr>
						<th>Sr No</th>
						<th>Profile</th>
						<th>Name</th>
						<th>Roll No</th>
						<th>Date Birth</th>
						<th>Gender</th>
						<th>Nation</th>
						<th>Grade</th>
						<th>Father Name</th>
						<th>School Name</th>
						<th>School Type</th>
						<th>School Branch</th>
						<th>Student ID</th>
						<th>Admission Year </th>
						<th>Student Status</th>
						<th>Email</th>
						<th>Green Book</th>
					</tr>
				</thead>
				<tbody>
					<?php include("layout/function.php"); fetch_students(); ?>
				</tbody>
			</table>
		</div>
	</div>
</section>