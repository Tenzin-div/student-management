<?php 
	if (!isset($_SESSION['user_pass'])) {
		header("Location:login.php");
	}
?>
<div class="right">
	<div class="right-layout">
			<div class="table_header">
				<h3>School Name and details</h3>
				<div class="table_search">
					<input type="text" name="" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
					<i class="fa fa-search"></i>
				</div>
			</div>
			<div class="view_table">
			<table id="myTable">
				<thead>
					<tr class="header">
						<th>Sr No</th>
						<th>School Name</th>
						<th>View Teachers</th>
						<th>View Students</th>
						<th>Create Date</th>
					</tr>
				</thead>
				<tbody>
					<?php include("layout/function.php"); fetch_school(); ?>

				</tbody>
			</table>
		</div>
	</div>
</section>
