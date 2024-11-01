<?php 
	if (!isset($_SESSION['user_pass'])) {
		header("Location:login.php");
	}
?>
<?php 
	function fetch_schoolName(){
	include('config/db.php');
	$fetch_school=$con->prepare("select * from school_name");
	$fetch_school->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_school->execute();

	while ($row=$fetch_school->fetch()) :
		echo "<option value=".$row['school_id'].">".$row['school_name']."</option>";
	endwhile;
	}


	function fetch_class(){
	include('config/db.php');
	$fetch_class=$con->prepare("select * from class");
	$fetch_class->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_class->execute();

	while ($row=$fetch_class->fetch()) :
		echo "<option value=".$row['class_id'].">".$row['class']."</option>";
	endwhile;
	}


	function fetch_type(){
	include('config/db.php');
	$fetch_type=$con->prepare("select * from school_type");
	$fetch_type->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_type->execute();

	while ($row=$fetch_type->fetch()) :
		echo "<option value=".$row['type_id'].">".$row['type_name']."</option>";
	endwhile;
	}


	function fetch_branch(){
	include('config/db.php');
	$fetch_branch=$con->prepare("select * from school_branch");
	$fetch_branch->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_branch->execute();

	while ($row=$fetch_branch->fetch()) :
		echo "<option value=".$row['branch_id'].">".$row['branch_name']."</option>";
	endwhile;
	}

	function fetch_year(){
	include('config/db.php');
	$fetch_year=$con->prepare("select * from admission_year");
	$fetch_year->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_year->execute();

	while ($row=$fetch_year->fetch()) :
		echo "<option value=".$row['year_id'].">".$row['year']."</option>";
	endwhile;
	}

	function fetch_nationality(){
	include('config/db.php');
	$fetch_nationality=$con->prepare("select * from nationality");
	$fetch_nationality->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_nationality->execute();

	while ($row=$fetch_nationality->fetch()) :
		echo "<option value=".$row['nationality_id'].">".$row['nationality']."</option>";
	endwhile;
	}

	function fetch_status(){
	include('config/db.php');
	$fetch_status=$con->prepare("select * from student_status");
	$fetch_status->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_status->execute();

	while ($row=$fetch_status->fetch()) :
		echo "<option value=".$row['status_id'].">".$row['status']."</option>";
	endwhile;
	}

	function fetch_gender(){
	include('config/db.php');
	$fetch_gender=$con->prepare("select * from gender");
	$fetch_gender->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_gender->execute();

	while ($row=$fetch_gender->fetch()) :
		echo "<option value=".$row['gender_id'].">".$row['gender']."</option>";
	endwhile;
	}

	// teachers Detail start--------------------------------------------

	function fetch_subject(){
	include('config/db.php');
	$fetch_subject=$con->prepare("select * from subject");
	$fetch_subject->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_subject->execute();

	while ($row=$fetch_subject->fetch()) :
		echo "<option value=".$row['subject_id'].">".$row['subject']."</option>";
	endwhile;
	}


	// end fetch ID Here....................-------------------------------------
	
// View teachers Detail------------------------------------------

function fetch_teacher(){
	include('config/db.php');
	$fetch_teacher=$con->prepare("select * from teacher_name");
	$fetch_teacher->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_teacher->execute();
	$i=1;
	while ($row=$fetch_teacher->fetch()) :
	

	$gender_id=$row['gender'];
	$gender_name=$con->prepare("select * from gender where gender_id='$gender_id'");
	$gender_name->setFetchMode(PDO:: FETCH_ASSOC);
	$gender_name->execute();
	$row_gender=$gender_name->fetch();

	$nation_id=$row['nationality'];
	$nation_name=$con->prepare("select * from nationality where nationality_id='$nation_id'");
	$nation_name->setFetchMode(PDO:: FETCH_ASSOC);
	$nation_name->execute();
	$row_nation=$nation_name->fetch();


	$school_name_id=$row['school_name'];
	$school_name=$con->prepare("select * from school_name where school_id='$school_name_id'");
	$school_name->setFetchMode(PDO:: FETCH_ASSOC);
	$school_name->execute();
	$row_school_name=$school_name->fetch();

	$subject_id=$row['subject'];
	$subject_name=$con->prepare("select * from subject where subject_id='$subject_id'");
	$subject_name->setFetchMode(PDO:: FETCH_ASSOC);
	$subject_name->execute();
	$row_subject_name=$subject_name->fetch();

	$type_id=$row['school_type'];
	$type_name=$con->prepare("select * from school_type where type_id='$type_id'");
	$type_name->setFetchMode(PDO:: FETCH_ASSOC);
	$type_name->execute();
	$row_type=$type_name->fetch();
	
		echo "<tr>
				<td>".$i++."</td>
				<td>
					<img src='../img/profile_img/".$row['teacher_profile']."'/>
				</td>
				<td>".$row['teacher_name']."</td>
				
				<td>".$row['birth']."</td>
				<td>".$row_gender['gender']."</td>
				<td>".$row_nation['nationality']."</td>
				
				<td>".$row['father_name']."</td>
				<td>".$row_school_name['school_name']."</td>
				<td>".$row_subject_name['subject']."</td>
				<td>".$row_type['type_name']."</td>
				<td>".$row['school_branch']."</td>
				<td>".$row['id_number']."</td>
				<td>".$row['admission_year']."</td>
				<td>".$row['status']."</td>
				
				<td>".$row['email']."</td>
				<td>".$row['green_book']."</td>
				<td>".$row['create_at']."</td>

			</tr>";
	
	endwhile;

}

// End Teacher section -------------------------------------
	// start student Detail Here....................-------------------------------------


	function fetch_students(){
	include('config/db.php');
	$fetch_students=$con->prepare("select * from student_name");
	$fetch_students->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_students->execute();
	$i=1;

	while ($row=$fetch_students->fetch()) :
	
	$gender_id=$row['gender'];
	$gender_name=$con->prepare("select * from gender where gender_id='$gender_id'");
	$gender_name->setFetchMode(PDO:: FETCH_ASSOC);
	$gender_name->execute();
	$row_gender=$gender_name->fetch();

	$nation_id=$row['nationality'];
	$nation_name=$con->prepare("select * from nationality where nationality_id='$nation_id'");
	$nation_name->setFetchMode(PDO:: FETCH_ASSOC);
	$nation_name->execute();
	$row_nation=$nation_name->fetch();

	$grade_id=$row['class'];
	$grade_name=$con->prepare("select * from class where class_id='$grade_id'");
	$grade_name->setFetchMode(PDO:: FETCH_ASSOC);
	$grade_name->execute();
	$row_grade=$grade_name->fetch();

	$school_name_id=$row['school_name'];
	$school_name=$con->prepare("select * from school_name where school_id='$school_name_id'");
	$school_name->setFetchMode(PDO:: FETCH_ASSOC);
	$school_name->execute();
	$row_school_name=$school_name->fetch();

	$type_id=$row['school_type'];
	$type_name=$con->prepare("select * from school_type where type_id='$type_id'");
	$type_name->setFetchMode(PDO:: FETCH_ASSOC);
	$type_name->execute();
	$row_type=$type_name->fetch();
	
		echo "<tr>
				<td>".$i++."</td>
				<td>
					<img src='../img/profile_img/".$row['student_profile']."'/>
				</td>
				<td>".$row['student_name']."</td>
				<td>".$row['student_roll']."</td>
				<td>".$row['birth']."</td>
				<td>".$row_gender['gender']."</td>
				<td>".$row_nation['nationality']."</td>
				<td>".$row_grade['class']."</td>
				<td>".$row['father_name']."</td>
				<td>".$row_school_name['school_name']."</td>
				<td>".$row_type['type_name']."</td>
				<td>".$row['school_branch']."</td>
				<td>".$row['id_number']."</td>
				<td>".$row['admission_year']."</td>
				<td>".$row['status']."</td>
				
				<td>".$row['email']."</td>
				<td>".$row['green_book']."</td>
				<td>".date('M', strtotime($row['create_at'])).','. date('d', strtotime($row['create_at'])).','. date('Y', strtotime($row['create_at']))."</td>

			</tr>";
	endwhile;
}

function fetch_school(){
	include('config/db.php');
	$fetch_school=$con->prepare("select * from school_name");
	$fetch_school->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_school->execute();
 	$i=1;
	while ($row=$fetch_school->fetch()) :
		echo "<tr>
				<td>".$i++."</td>
				
				<td>".$row['school_name']."</td>
				<td> <a href='index.php?view_school_wise_teacher=".$row['school_id']."'>View Teacher Strength</a></td>
				<td style='padding: 14px 20px;'> <a href='index.php?view_school_wise_student=".$row['school_id']."'>View Student Strength</a></td>
				<td>".date('M', strtotime($row['create_at'])).','. date('d', strtotime($row['create_at'])).','. date('Y', strtotime($row['create_at']))."</td>
				
			</tr>";
	endwhile;
	}





	// start school heading -----------------------------------

	function fetch_school_heading(){
		include('config/db.php');
		if (isset($_GET['view_school_wise_teacher'])) {
		$view_school_id=$_GET['view_school_wise_teacher'];
		$fetch_students=$con->prepare("select * from teacher_name where school_name='$view_school_id'");
		$fetch_students->setFetchMode(PDO:: FETCH_ASSOC);
		$fetch_students->execute();
		$row=$fetch_students->fetch();

		$school_name_id=$row['school_name'];
		$school_name=$con->prepare("select * from school_name where school_id='$school_name_id'");
		$school_name->setFetchMode(PDO:: FETCH_ASSOC);
		$school_name->execute();
		$row_school_name=$school_name->fetch();
		
			echo "<p style='width: 500px; color: blue; font-size: 18px;'><marquee direction='left'>".$row_school_name['school_name']." Dashboard</marquee></p>";	
	}
}


// start student heading -----------------------------------

	function fetch_student_heading(){
		include('config/db.php');
		if (isset($_GET['view_school_wise_student'])) {
		$view_school_id=$_GET['view_school_wise_student'];
		$fetch_students=$con->prepare("select * from student_name where school_name='$view_school_id'");
		$fetch_students->setFetchMode(PDO:: FETCH_ASSOC);
		$fetch_students->execute();
		$row=$fetch_students->fetch();

		$student_name_id=$row['school_name'];
		$student_name=$con->prepare("select * from school_name where school_id='$student_name_id'");
		$student_name->setFetchMode(PDO:: FETCH_ASSOC);
		$student_name->execute();
		$row_student_name=$student_name->fetch();
		
			echo "<p style='width: 500px; color: blue; font-size: 18px;'><marquee direction='left'>".$row_student_name['school_name']." Dashboard</marquee></p>";	
	}
}


// start school wise student------------------------------------

	function fetch_school_wise_teacher(){
	include('config/db.php');
	
	if (isset($_GET['view_school_wise_teacher'])) {
	$view_school_id=$_GET['view_school_wise_teacher'];
	$fetch_students=$con->prepare("select * from teacher_name where school_name='$view_school_id'");
	$fetch_students->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_students->execute();
	$i=1;
	while ($row=$fetch_students->fetch()) :
	

	$gender_id=$row['gender'];
	$gender_name=$con->prepare("select * from gender where gender_id='$gender_id'");
	$gender_name->setFetchMode(PDO:: FETCH_ASSOC);
	$gender_name->execute();
	$row_gender=$gender_name->fetch();

	$nation_id=$row['nationality'];
	$nation_name=$con->prepare("select * from nationality where nationality_id='$nation_id'");
	$nation_name->setFetchMode(PDO:: FETCH_ASSOC);
	$nation_name->execute();
	$row_nation=$nation_name->fetch();

	$subject_id=$row['subject'];
	$subject_name=$con->prepare("select * from subject where subject_id='$subject_id'");
	$subject_name->setFetchMode(PDO:: FETCH_ASSOC);
	$subject_name->execute();
	$row_subject=$subject_name->fetch();

	$school_name_id=$row['school_name'];
	$school_name=$con->prepare("select * from school_name where school_id='$school_name_id'");
	$school_name->setFetchMode(PDO:: FETCH_ASSOC);
	$school_name->execute();
	$row_school_name=$school_name->fetch();

	$type_id=$row['school_type'];
	$type_name=$con->prepare("select * from school_type where type_id='$type_id'");
	$type_name->setFetchMode(PDO:: FETCH_ASSOC);
	$type_name->execute();
	$row_type=$type_name->fetch();
	
		echo "<tr>
				<td>".$i++."</td>
				<td>
					<img src='../img/profile_img/".$row['teacher_profile']."'/>
				</td>
				<td>".$row['teacher_name']."</td>
				<td>".$row['birth']."</td>
				<td>".$row_gender['gender']."</td>
				<td>".$row_nation['nationality']."</td>
				
				<td>".$row['father_name']."</td>
				<td>".$row_school_name['school_name']."</td>
				<td>".$row_subject['subject']."</td>
				<td>".$row_type['type_name']."</td>
				<td>".$row['school_branch']."</td>
				<td>".$row['id_number']."</td>
				<td>".$row['admission_year']."</td>
				<td>".$row['status']."</td>
				
				<td>".$row['email']."</td>
				<td>".$row['green_book']."</td>
				<td><a href='index.php?view_individual_teacher=".$row['teacher_id']."'>Viw Teacher</a></td>
				<td>".$row['create_at']."</td>
			</tr>";
	endwhile;
}
}

// start school wise student------------------------------------
function fetch_school_wise_students(){
	include('config/db.php');
	
	if (isset($_GET['view_school_wise_student'])) {
		$school_id=$_GET['view_school_wise_student'];
	$fetch_students=$con->prepare("select * from student_name where school_name='$school_id'");
	$fetch_students->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_students->execute();
	$i=1;
	while ($row=$fetch_students->fetch()) :
	

	$gender_id=$row['gender'];
	$gender_name=$con->prepare("select * from gender where gender_id='$gender_id'");
	$gender_name->setFetchMode(PDO:: FETCH_ASSOC);
	$gender_name->execute();
	$row_gender=$gender_name->fetch();

	$nation_id=$row['nationality'];
	$nation_name=$con->prepare("select * from nationality where nationality_id='$nation_id'");
	$nation_name->setFetchMode(PDO:: FETCH_ASSOC);
	$nation_name->execute();
	$row_nation=$nation_name->fetch();

	$grade_id=$row['class'];
	$grade_name=$con->prepare("select * from class where class_id='$grade_id'");
	$grade_name->setFetchMode(PDO:: FETCH_ASSOC);
	$grade_name->execute();
	$row_grade=$grade_name->fetch();

	$status_id=$row['status'];
	$status_name=$con->prepare("select * from student_status where status_id='$status_id'");
	$status_name->setFetchMode(PDO:: FETCH_ASSOC);
	$status_name->execute();
	$row_status=$status_name->fetch();


	$school_name_id=$row['school_name'];
	$school_name=$con->prepare("select * from school_name where school_id='$school_name_id'");
	$school_name->setFetchMode(PDO:: FETCH_ASSOC);
	$school_name->execute();
	$row_school_name=$school_name->fetch();

	$type_id=$row['school_type'];
	$type_name=$con->prepare("select * from school_type where type_id='$type_id'");
	$type_name->setFetchMode(PDO:: FETCH_ASSOC);
	$type_name->execute();
	$row_type=$type_name->fetch();
	
		echo "<tr>
				<td>".$i++."</td>
				<td>
					<img src='../img/profile_img/".$row['student_profile']."'/>
				</td>
				<td>".$row['student_name']."</td>
	
				<td>".$row_gender['gender']."</td>
				<td>".$row_nation['nationality']."</td>
			
				
				<td>".$row_school_name['school_name']."</td>
				<td><a href='index.php?view_individual_student=".$row['student_id']."'>Viw Student</a></td>
				<td>".$row['id_number']."</td>
				<td>".$row['admission_year']."</td>
				<td>".$row_status['status']."</td>
				
		
				

				<td>".$row['create_at']."</td>
			</tr>";
	endwhile;
}
}

// End school wise student-----------------------------------------

// start individual wise student------------------------------------
function fetch_individual_wise_students(){
	include('config/db.php');
	
	if (isset($_GET['view_individual_student'])) {
		$student_id=$_GET['view_individual_student'];
	$fetch_students=$con->prepare("select * from student_name where student_id='$student_id'");
	$fetch_students->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_students->execute();
	$i=1;
	while ($row=$fetch_students->fetch()) :
	

	$gender_id=$row['gender'];
	$gender_name=$con->prepare("select * from gender where gender_id='$gender_id'");
	$gender_name->setFetchMode(PDO:: FETCH_ASSOC);
	$gender_name->execute();
	$row_gender=$gender_name->fetch();

	$nation_id=$row['nationality'];
	$nation_name=$con->prepare("select * from nationality where nationality_id='$nation_id'");
	$nation_name->setFetchMode(PDO:: FETCH_ASSOC);
	$nation_name->execute();
	$row_nation=$nation_name->fetch();

	$grade_id=$row['class'];
	$grade_name=$con->prepare("select * from class where class_id='$grade_id'");
	$grade_name->setFetchMode(PDO:: FETCH_ASSOC);
	$grade_name->execute();
	$row_grade=$grade_name->fetch();

	$school_name_id=$row['school_name'];
	$school_name=$con->prepare("select * from school_name where school_id='$school_name_id'");
	$school_name->setFetchMode(PDO:: FETCH_ASSOC);
	$school_name->execute();
	$row_school_name=$school_name->fetch();

	$type_id=$row['school_type'];
	$type_name=$con->prepare("select * from school_type where type_id='$type_id'");
	$type_name->setFetchMode(PDO:: FETCH_ASSOC);
	$type_name->execute();
	$row_type=$type_name->fetch();
	
		echo "<div class='img_profile'>
						<img src='../img/profile_img/".$row['student_profile']."'/>
						<div class='name_detail'>
							<div class='name_list'>
								<p>Name:</p>
								<span>".$row['student_name']."</span>
							</div>
							<div class='name_list'>
								<p>Roll No:</p>
								<span>".$row['student_roll']."</span>
							</div>
							<div class='name_list'>
								<p>Gender:</p>
								<span>".$row['gender']."</span>
							</div>
							<div class='name_list'>
								<p>Class:</p>
								<span>".$row_grade['class']."</span>
							</div>
							<div class='name_list'>
								<p>Date of Birth:</p>
								<span>".$row['birth']."</span>
							</div>
						</div>
					</div>

					<div class='name_detail' style='margin-top: 20px;'>
							<div class='name_list'>
								<p>Nationality:</p>
								<span>".$row_nation['nationality']."</span>
								<p>Father Name:</p>
								<span>".$row['father_name']."</span>
							</div>
							<div class='name_list'>
								<p>School Name:</p>
								<span>".$row_school_name['school_name']."</span>
								<p>Roll No:</p>
								<span>4980</span>
							</div>
							<div class='name_list'>
								<p>School Type:</p>
								<span>".$row_type['type_name']."</span>
								<p>Branch:</p>
								<span>".$row['school_branch']."</span>
							</div>
							<div class='name_list'>
								<p>ID Number:</p>
								<span>".$row['id_number']."</span>
								<p>Admission Year:</p>
								<span>".$row['admission_year']."</span>
							</div>
						</div>

						<div class='name_detail'>
							<div class='name_list'>
								<p>Green Book:</p>
								<span>".$row['green_book']."</span>
							</div>
							<div class='name_list'>
								<p>Email Address:</p>
								<span>".$row['email']."</span>
							</div>
							<div class='name_list'>
								<p>Status:</p>
								<span>".$row['status']."</span>
							</div>
						</div>

						<div class='name_detail'>
							<div class='name_list'>
								<p>Green Book:</p>
								<span>".$row['green_book']."</span>
							</div>
							<div class='name_list'>
								<p>Email Address:</p>
								<span>".$row['email']."</span>
							</div>
							<div class='name_list'>
								<p>Status:</p>
								<span>".$row['status']."</span>
							</div>
						</div>";
	endwhile;
}
}

// End individual wise student-----------------------------------------

// start individual wise teacher------------------------------------
function fetch_individual_wise_teacher(){
	include('config/db.php');
	
	if (isset($_GET['view_individual_teacher'])) {
		$teacher_id=$_GET['view_individual_teacher'];
	$fetch_teacher=$con->prepare("select * from teacher_name where teacher_id='$teacher_id'");
	$fetch_teacher->setFetchMode(PDO:: FETCH_ASSOC);
	$fetch_teacher->execute();
	$i=1;
	while ($row=$fetch_teacher->fetch()) :
	

	$gender_id=$row['gender'];
	$gender_name=$con->prepare("select * from gender where gender_id='$gender_id'");
	$gender_name->setFetchMode(PDO:: FETCH_ASSOC);
	$gender_name->execute();
	$row_gender=$gender_name->fetch();

	$nation_id=$row['nationality'];
	$nation_name=$con->prepare("select * from nationality where nationality_id='$nation_id'");
	$nation_name->setFetchMode(PDO:: FETCH_ASSOC);
	$nation_name->execute();
	$row_nation=$nation_name->fetch();

	$subject_id=$row['subject'];
	$subject_name=$con->prepare("select * from subject where subject_id='$subject_id'");
	$subject_name->setFetchMode(PDO:: FETCH_ASSOC);
	$subject_name->execute();
	$row_subject=$subject_name->fetch();

	$school_name_id=$row['school_name'];
	$school_name=$con->prepare("select * from school_name where school_id='$school_name_id'");
	$school_name->setFetchMode(PDO:: FETCH_ASSOC);
	$school_name->execute();
	$row_school_name=$school_name->fetch();

	$type_id=$row['school_type'];
	$type_name=$con->prepare("select * from school_type where type_id='$type_id'");
	$type_name->setFetchMode(PDO:: FETCH_ASSOC);
	$type_name->execute();
	$row_type=$type_name->fetch();
	
		echo "<div class='img_profile'>
						<img src='../img/profile_img/".$row['teacher_profile']."'/>
						<div class='name_detail'>
							<div class='name_list'>
								<p>Name:</p>
								<span>".$row['teacher_name']."</span>
							</div>
							
							<div class='name_list'>
								<p>Gender:</p>
								<span>".$row['gender']."</span>
							</div>
							<div class='name_list'>
								<p>Class:</p>
								<span>".$row_subject['subject']."</span>
							</div>
							<div class='name_list'>
								<p>Date of Birth:</p>
								<span>".$row['birth']."</span>
							</div>
						</div>
					</div>

					<div class='name_detail' style='margin-top: 20px;'>
							<div class='name_list'>
								<p>Nationality:</p>
								<span>".$row_nation['nationality']."</span>
								<p>Father Name:</p>
								<span>".$row['father_name']."</span>
							</div>
							<div class='name_list'>
								<p>School Name:</p>
								<span>".$row_school_name['school_name']."</span>
								<p>Roll No:</p>
								<span>4980</span>
							</div>
							<div class='name_list'>
								<p>School Type:</p>
								<span>".$row_type['type_name']."</span>
								<p>Branch:</p>
								<span>".$row['school_branch']."</span>
							</div>
							<div class='name_list'>
								<p>ID Number:</p>
								<span>".$row['id_number']."</span>
								<p>Admission Year:</p>
								<span>".$row['admission_year']."</span>
							</div>
						</div>

						<div class='name_detail'>
							<div class='name_list'>
								<p>Green Book:</p>
								<span>".$row['green_book']."</span>
							</div>
							<div class='name_list'>
								<p>Email Address:</p>
								<span>".$row['email']."</span>
							</div>
							<div class='name_list'>
								<p>Status:</p>
								<span>".$row['status']."</span>
							</div>
						</div>

						<div class='name_detail'>
							<div class='name_list'>
								<p>Green Book:</p>
								<span>".$row['green_book']."</span>
							</div>
							<div class='name_list'>
								<p>Email Address:</p>
								<span>".$row['email']."</span>
							</div>
							<div class='name_list'>
								<p>Status:</p>
								<span>".$row['status']."</span>
							</div>
						</div>";
	endwhile;
}
}

// End individual wise teacher-----------------------------------------




 ?>



