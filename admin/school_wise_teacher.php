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
		$teacher_id=$_GET['view_school_wise_teacher'];
		$fetch_teacher=$con->prepare("select * from teacher_name where school_name='$teacher_id'");
		$fetch_teacher->setFetchMode(PDO:: FETCH_ASSOC);
		$fetch_teacher->execute();
		$count=$fetch_teacher->rowCount();
 	?>	
					<p><?php echo $count ?></p>
				</div>
				<div class="student_number" style="background-color: #fcbe9b; border-left: 10px solid #e15c10;">
					<h4>No of Female:</h4>
	<?php 
		include('config/db.php');
		$gender_id=$_GET['view_school_wise_teacher'];
		$fetch_teacher=$con->prepare("select * from teacher_name where gender='$gender_id'");
		$fetch_teacher->setFetchMode(PDO:: FETCH_ASSOC);
		$fetch_teacher->execute();
		$count=$fetch_teacher->rowCount();
 	?>					
					<p><?php echo $count ?></p>
				</div>
				<div class="student_number" style="background-color: #fdeb9a; border-left: 10px solid #facf0d;">
					<h4>No of Male:</h4>
					<p>22</p>
				</div>
			</div>
			<div class="student_add_form">
				<span><a href="index.php?teachers_form"><i class="fa fa-plus"></i></span>Add Students</a>
			</div>
		</div>
		
			<div class="table_header">
				<h3>Teacher's Dashboard</h3>
				<div class="table_search">
					<?php include("layout/function.php"); fetch_school_heading(); ?>
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
						<th>Date Birth</th>
						<th>Gender</th>
						<th>Nation</th>
						<th>subject</th>
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
					<?php fetch_school_wise_teacher(); ?>
				</tbody>
			</table>
		</div>
	</div>
</section>