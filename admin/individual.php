<?php 
	if (!isset($_SESSION['user_pass'])) {
		header("Location:login.php");
	}
?>
<div class="right">
	<div class="right-layout">
			<div class="main_individual">
				<div class="individual_heading">
					<img src="../img/logo.png">
					<div class="individual_header">
						<h2>Sambhota Tibetan School (STSS)</h2>
						<p>Under the care of Department of Education</p>
					</div>
				</div>
				<div class="individual_content">
					<?php include('layout/function.php'); fetch_individual_wise_students(); ?>
				</div>
				<div class="individual_footer">
					<p>Department of Education,CTA<br>Gangchen Kyishong<br>Dharamshala</p>
				</div>
			</div>
		</div>
	</div>
</section>