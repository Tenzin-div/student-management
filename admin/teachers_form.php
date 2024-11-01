<?php 
	if (!isset($_SESSION['user_pass'])) {
		header("Location:login.php");
	}
?>

<div class="right">
	<div class="right-layout">
		<div class="form">
			<div class="form_view">
				<h3>Add Teachers Details</h3>
				<p><a href="index.php?view_teacher">View Teacher</a></p>
			</div>
			<form method="POST" enctype="multipart/form-data">
				<div class="student_row">
					<div class="student_col">
						<label for="fname">Teacher Name<span style="color: red;">*</span></label><br><br>
						<input type="text" name="teacher_name" placeholder="Teacher Name..." required>
					</div>


					<div class="student_col">
						<label for="fname">Date of Birth<span style="color: red;">*</span></label><br><br>
						<input type="date" name="birth">
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
							<option>--Choose Nationality--</option>
							<?php fetch_nationality(); ?>
						</select>
					</div>


					<div class="student_col">
						<label for="fname">Father Name<span style="color: red;">*</span></label><br><br>
						<input type="text" name="father_name">
					</div>

					<div class="student_col">
						<label for="fname">School Name<span style="color: red;">*</span></label><br><br>
						<select type="text" name="school_name" required>
							<option>--Choose School Name--</option>
							<?php fetch_schoolName(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">Subject Name<span style="color: red;">*</span></label><br><br>
						<select type="text" name="subject" required>
							<option>--Choose Subject Name--</option>
							<?php fetch_subject(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">School Type<span style="color: red;">*</span></label><br><br>
						<select type="text" name="school_type" required>
							<option>--Choose School Type--</option>
							<?php fetch_type(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">Branch Name<span style="color: red;">*</span></label><br><br>
						<select type="text" name="school_branch" required>
							<option>--Choose School Branch--</option>
							<?php fetch_branch(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">Identity Number<span style="color: red;">*</span></label><br><br>
						<input type="text" name="id_number" placeholder="Student ID Number">
					</div>


					<div class="student_col">
						<label for="fname">Admission Year<span style="color: red;">*</span></label><br><br>
						<select type="text" name="admission_year" required>
							<option>--Choose Year--</option>
							<?php fetch_year(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">Tearcher Status<span style="color: red;">*</span></label><br><br>
						<select type="text" name="status" required>
							<option>--Choose Teacher Status--</option>
							<?php fetch_status(); ?>
						</select>
					</div>

					<div class="student_col">
						<label for="fname">Teacher Profile<span style="color: red;">*</span></label><br><br>
						<input type="file" name="teacher_profile">
					</div>

					<div class="student_col">
						<label for="fname">Email Address<span style="color: red;">*</span></label><br><br>
						<input type="email" name="email" placeholder="Add Email...">
					</div>

					<div class="student_col">
						<label for="fname">Green Book Number<span style="color: red;">*</span></label><br><br>
						<input type="text" name="green_book" value="IN">
					</div>
				</div><!--end student row-->

				<div class="button">
						<button type="reset" class="reset">Reset</button>
						<button type="submit" name="submit">Add Teacher detail</button>
				</div>
			</form>


		</div> <!--end form-->
	</div>
</div>
</section>


<?php 
include("config/db.php");
if (isset($_POST['submit'])) {
	if ($_POST['teacher_name'] =="" OR $_POST['gender'] =="") {
		echo "<script>alert('emmpty stiring not accepted');</script>";
	}
	else{
		$teacher_name=$_POST['teacher_name'];
		$birth=$_POST['birth'];
		$gender=$_POST['gender'];
		$nationality=$_POST['nationality'];

		$father_name=$_POST['father_name'];
		$school_name=$_POST['school_name'];
		$subject=$_POST['subject'];
		$school_type=$_POST['school_type'];
		$school_branch=$_POST['school_branch'];
		$id_number=$_POST['id_number'];
		$admission_year=$_POST['admission_year'];
		$status=$_POST['status'];
		$teacher_profile=$_FILES['teacher_profile']['name'];
		$teacher_profile_tmp=$_FILES['teacher_profile']['tmp_name'];

		move_uploaded_file($teacher_profile_tmp,"../img/profile_img/$teacher_profile");

		$email=$_POST['email'];
		$green_book=$_POST['green_book'];

		$add_teacher=$con->prepare("insert into teacher_name(teacher_name,birth,gender,nationality,father_name,school_name,subject,school_type,school_branch,id_number,admission_year,status,teacher_profile,email,green_book,create_at)values('$teacher_name','$birth','$gender','$nationality','$father_name','$school_name','$subject','$school_type','$school_branch','$id_number','$admission_year','$status','$teacher_profile','$email','$green_book',NOW())");


		if ($add_teacher->execute()) {
			echo "<script>alert('add teacher name successfull');</script>";
			echo "<script>window.open('index.php?view_teacher','_self');</script>";
		}
		else{
			echo "<script>alert('add teacher teacher_name not successfull');</script>";

		}
	}
}

?>