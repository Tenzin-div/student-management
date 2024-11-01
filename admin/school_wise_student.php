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
		$student_id=$_GET['view_school_wise_student'];
		$fetch_students=$con->prepare("select * from student_name where school_name='$student_id'");
		$fetch_students->setFetchMode(PDO:: FETCH_ASSOC);
		$fetch_students->execute();
		$count=$fetch_students->rowCount();
 	?>					
					<p><?php echo $count ?></p>
				</div>
				<div class="student_number" style="background-color: #fcbe9b; border-left: 10px solid #e15c10;">
					<h4>No of Female:</h4>
					<p>242</p>
				</div>
				<div class="student_number" style="background-color: #fdeb9a; border-left: 10px solid #facf0d;">
					<h4>No of Male:</h4>
					<p>22</p>
				</div>
			</div>
			<div class="student_add_form">
				<span><a href="index.php?student_form"><i class="fa fa-plus"></i></span>Add Students</a>
			</div>
		</div>
		
			<div class="table_header">
				<h3>Student Dashboard</h3>
				<div class="table_search">
					<?php include("layout/function.php"); fetch_student_heading(); ?>
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
						
					
						<th>Gender</th>
						<th>Nation</th>
						
						<th>School Name</th>
						<th>View</th>
						
						<th>Student ID</th>
						<th>Admission Year </th>
						<th>Student Status</th>
						
					</tr>
				</thead>
				<tbody>
					<?php fetch_school_wise_students(); ?>
				</tbody>
			</table>
		</div>
	</div>
</section>