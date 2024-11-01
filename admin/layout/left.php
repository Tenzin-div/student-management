<?php 
	if (!isset($_SESSION['user_pass'])) {
		header("Location:login.php");
	}
?>
<section>
		<div class="left">
			<ul>
				<li>
					<a href="index.php">
						<i class="fa">&#xf080;</i>
						<span>Dashboard</span>
					</a>
				</li>
			
				
				<li>
					<a href="index.php?view_students">
						<i class="fa fa-user"></i>
						<span>View Students</span>
					</a>
				</li>

				<li>
					<a href="index.php?view_teacher">
						<i class="fa fa-users"></i>
						<span>View Teacher</span>
					</a>
				</li>

				<li>
					<a href="index.php?view_school">
						<i class="fa fa-university"></i>
						<span>View School</span>
					</a>
				</li>


		
			</ul>
		</div>

		<?php 
		
			if (isset($_GET['student_form'])) {
				include('student_form.php');
			}
			if (isset($_GET['teachers_form'])) {
				include('teachers_form.php');
				// code...
			}
			if (isset($_GET['view_students'])) {
				include('view_students.php');
				// code...
			}
			if (isset($_GET['view_school'])) {
				include('view_school.php');
			}
		
			if (isset($_GET['view_teacher'])) {
				include('view_teacher.php');
				// code...
			}
			if (isset($_GET['view_school_wise_student'])) {
				include('school_wise_student.php');
				// code...
			}
			if (isset($_GET['view_school_wise_teacher'])) {
				include('school_wise_teacher.php');
				// code...
			}
			
			if (isset($_GET['view_individual_teacher'])) {
				include('teacher_individual.php');
				// code...
			}
			if (isset($_GET['view_individual_student'])) {
				include('individual.php');
				// code...
			}
		 ?>
		 