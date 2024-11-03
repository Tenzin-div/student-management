<?php 
	if (!isset($_SESSION['user_pass'])) {
		header("Location:login.php");
	}
?>
<?php 
	if (!isset($_GET['index.php'])) {
	if (!isset($_GET['student_form'])) {
	if (!isset($_GET['teachers_form'])) {
	if (!isset($_GET['view_students'])) {
	if (!isset($_GET['view_teacher'])) {
	if (!isset($_GET['view_school'])) {
	if (!isset($_GET['view_school_wise_student'])) {
	if (!isset($_GET['view_school_wise_teacher'])) {
	if (!isset($_GET['view_individual_teacher'])) {
	if (!isset($_GET['view_individual_student'])) {

		// code...
	
 ?>


<div class="right">
	<div class="right-layout">
		<div class="row">	
					<div class="col" style="background-color: #fbdc5d;">
						<div class="colcontent">
							<div class="colheading">
								<h3>Total Students</h3>
								<?php 
									include('config/db.php');
									$fetch_students=$con->prepare("select * from student_name");
									$fetch_students->setFetchMode(PDO:: FETCH_ASSOC);
									$fetch_students->execute();

									$count = $fetch_students->rowCount();

								 ?>
								<p><?php echo $count ?></p>
								
							</div>
							<div class="colicon">
								<i class="fa fa-university"></i>
							</div>
						</div>
						<div class="collink" style="background-color: #d3aa03;">
								<a href="">View All</a>
								<i class="fa fa-arrow-right"></i>
						</div>
					</div>

					<div class="col" style="background-color: #cff75c;">
						<div class="colcontent">
							<div class="colheading">
								<h3>Total School</h3>
								<?php 
									include('config/db.php');
									$fetch_school=$con->prepare("select * from school_name");
									$fetch_school->setFetchMode(PDO:: FETCH_ASSOC);
									$fetch_school->execute();

									$count = $fetch_school->rowCount();

								 ?>
								<p><?php echo $count ?></p>
							</div>
							<div class="colicon">
								<i class="fa fa-book"></i>
							</div>
						</div>
						<div class="collink" style="background-color: #98cb04;">
								<a href="">View All</a>
						</div>
					</div>

					<div class="col" style="background-color: #61c3fe;">
						<div class="colcontent">
							<div class="colheading">
								<h3>Total Male</h3>
								<?php 
									include('config/db.php');
									$fetch_male=$con->prepare("select * from student_name where gender='2'");
									$fetch_male->setFetchMode(PDO:: FETCH_ASSOC);
									$fetch_male->execute();

									$count = $fetch_male->rowCount();

								 ?>
								<p><?php echo $count ?></p>
								
							</div>
							<div class="colicon">
								<i class="fa fa-male"></i>
							</div>
						</div>
						<div class="collink" style="background-color: #087bc1;">
								<a href="">View All</a>
						</div>
					</div>

					<div class="col" style="background-color: #df97fe;">
						<div class="colcontent">
							<div class="colheading">
								<h3>Total Female</h3>
								<?php 
									include('config/db.php');
									$fetch_female=$con->prepare("select * from student_name where gender='1'");
									$fetch_female->setFetchMode(PDO:: FETCH_ASSOC);
									$fetch_female->execute();

									$count = $fetch_female->rowCount();

								 ?>
								<p><?php echo $count ?></p>
							</div>
							<div class="colicon">
								<i class="fa fa-female"></i>
							</div>
						</div>
						<div class="collink" style="background-color: #940ccf;">
								<a href="">View All</a>
						</div>
					</div>

					<div class="col" style="background-color: #07d5dc;">
						<div class="colcontent">
							<div class="colheading">
								<h3>Total Students</h3>
								<p>43242</p>
							</div>
							<div class="colicon">
								<i class="fa fa-folder"></i>
							</div>
						</div>
						<div class="collink" style="background-color: #19c2c7;">
								<a href="">View All</a>
						</div>
					</div>

					<div class="col" style="background-color: #fcfa6e;">
						<div class="colcontent">
							<div class="colheading">
								<h3>Total Teacher</h3>
								<?php 
									include('config/db.php');
									$fetch_teacher=$con->prepare("select * from teacher_name");
									$fetch_teacher->setFetchMode(PDO:: FETCH_ASSOC);
									$fetch_teacher->execute();

									$count = $fetch_teacher->rowCount();

								 ?>
								<p><?php echo $count ?></p>
							</div>
							<div class="colicon">
								<i class="fa fa-home"></i>
							</div>
						</div>
						<div class="collink" style="background-color: #c6c40c;">
								<a href="">View All</a>
						</div>
					</div>
				</div>
				<!-- end row -->
					<div class="data">
						<div class="category_data">	
							<div class="dash_teacher_content">
								<table>
								<thead style="background-color: #eaeaea;">
									<tr>
										<th>Sr No</th>
										<th>Profile</th>
										<th>Name</th>	
										<th>Date Birth</th>
										<th>Gender</th>
										<th>Nation</th>
										<th>Father Name</th>
										<th>School Name</th>
										<th>Subject Name</th>
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
									<?php include('layout/function.php'); fetch_teacher(); ?>
								</tbody>
								</table>
							</div>
						</div>
						<div class="sub_category_data">
							<table>
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
								  	<?php  fetch_students(); ?>

								</tbody>
							</table>
						</div>
					</div>
	</div>
</section>

<?php } } } } } } } } } } ?>