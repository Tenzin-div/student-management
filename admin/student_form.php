<?php 
	if (!isset($_SESSION['user_pass'])) {
		header("Location:login.php");
	}
?>
<div class="right">
	<div class="right-layout">
		<div class="form">
			<div class="form_view">
				<h3>Add Student Details</h3>
				<p><a href="index.php?view_students">View Student</a></p>
			</div>
			<form method="POST" enctype="multipart/form-data">
				<div class="student_row">
					<div>
						<label for="fname">Student Name<span style="color: red;">*</span></label><br><br>
						<input type="text" name="student_name" placeholder="Student Name" required>
					</div>

					<div class="student_col">
						<label for="fname">Roll Number<span style="color: red;">*</span></label><br><br>
						<input type="number" name="student_roll" placeholder="Roll Number..." required maxlength="4">
					</div>

					<div class="student_col">
						<label for="fname">Date of Birth<span style="color: red;">*</span></label><br><br>
						<input type="date" name="birth" required>
					</div>

					<div class="student_col">
						<label for="fname">Gender<span style="color: red;">*</span></label><br><br>
						<div class="student_col">
							<select type="text" name="gender" required>
								<option>--Choose Gender--</option>
								<?php include("layout/function.php"); fetch_gender(); ?>
							</select>
						</div>

					</div>

					<div class="student_col">
						<label for="fname">Nationality<span style="color: red;">*</span></label><br><br>
						<select type="text" name="nationality" required>
							<option>--Choose Nationality--</option required>
							<?php fetch_nationality(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">Class</label><br><br>
						<select type="text" name="class" required>
							<option>--Choose Class--</option>
							<?php fetch_class(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">Father Name</label><br><br>
						<input type="text" name="father_name" required>
					</div>

					<div class="student_col">
						<label for="fname">School Name</label><br><br>
						<select type="text" name="school_name" required>
							<option>--Choose School Name--</option>
							<?php fetch_schoolName(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">School Type</label><br><br>
						<select type="text" name="school_type" required>
							<option>--Choose School Type--</option>
							<?php fetch_type(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">Branch Name</label><br><br>
						<select type="text" name="school_branch" required>
							<option>--Choose School Branch--</option>
							<?php fetch_branch(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">Identity Number</label><br><br>
						<input type="text" name="id_number" placeholder="Student ID Number" required>
					</div>


					<div class="student_col">
						<label for="fname">Admission Year</label><br><br>
						<select type="text" name="admission_year" required>
							<option>--Choose Year--</option>
							<?php fetch_year(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">Student Status</label><br><br>
						<select type="text" name="status" required>
							<option>--Choose Student Status--</option>
							<?php fetch_status(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">Student Profile</label><br><br>
						<input type="file" name="student_profile" required>
					</div>

					<div class="student_col">
						<label for="fname">Email Address</label><br><br>
						<input type="email" name="email" placeholder="Add Email..." required>
					</div>

					<div class="student_col">
						<label for="fname">Green Book Number</label><br><br>
						<input type="text" name="green_book" value="IN" required>
					</div>
				</div><!--end student row-->

				<div class="button">
						<button type="reset" class="reset">Reset</button>
						<button type="submit" name="submit">Add Student</button>
				</div>
			</form>


		</div> <!--end form-->
	</div>
</div>
</section>


<?php 
include("config/db.php");
if (isset($_POST['submit'])) {
	if ($_POST['student_name'] =="" OR $_POST['gender'] =="") {
		echo "<script>alert('emmpty stiring not accepted');</script>";
	}
	else{
		$student_name=$_POST['student_name'];
		$student_roll=$_POST['student_roll'];
		$birth=$_POST['birth'];
		$gender=$_POST['gender'];
		$nationality=$_POST['nationality'];
		
		$class=$_POST['class'];
		$father_name=$_POST['father_name'];
		$school_name=$_POST['school_name'];
		$school_type=$_POST['school_type'];
		$school_branch=$_POST['school_branch'];
		$id_number=$_POST['id_number'];
		$admission_year=$_POST['admission_year'];
		$status=$_POST['status'];
		$student_profile=$_FILES['student_profile']['name'];
		$student_profile_tmp=$_FILES['student_profile']['tmp_name'];

		move_uploaded_file($student_profile_tmp,"../img/profile_img/$student_profile");

		$email=$_POST['email'];
		$green_book=$_POST['green_book'];

		$add_student=$con->prepare("insert into student_name(student_name,student_roll,birth,gender,nationality,class,father_name,school_name,school_type,school_branch,id_number,admission_year,status,student_profile,email,green_book,create_at)values('$student_name','$student_roll','$birth','$gender','$nationality','$class','$father_name','$school_name','$school_type','$school_branch','$id_number','$admission_year','$status','$student_profile','$email','$green_book',NOW())");


		if ($add_student->execute()) {
			echo "<script>alert('add student name successfull');</script>";
			echo "<script>window.open('index.php?view_students','_self');</script>";
		}
		else{
			echo "<script>alert('add category not successfull');</script>";

		}
	}
}

?>