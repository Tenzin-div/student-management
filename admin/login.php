<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Project Two</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="icon" type="imgage" href="../img/logo.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-image: url('../img/background.jpg');">
	<div class="login">
		<div class="logincontent">
			<div class="form_header">
				<h3>Education Database</h3>
			</div>
			<div class="form">
				<form method="POST">
					<label for="" class="login_label">User Name</label><br><br>
					<input type="text" name="user_name" placeholder="user name..." required><br><br>
					<label for="" class="login_label">Password</label><br><br>
					<div class="pass_visivility">
						<input type="password" name="user_pass" placeholder="password.." required id="myInput">
						<i class="fa fa-eye" onclick="viewPassword()"></i>
					</div><br>
					<button type="submit" name="login">Login</button>
				</form>
				<div class="registar">
					<p>Registrar? Create Account</p>
				</div>
			</div>
		</div>
	</div>
	<?php 
		include('config/db.php');
		if (isset($_POST['login'])) {
			$user_name=$_POST['user_name'];
		
			$user_pass=md5($_POST['user_pass']);
			$get_user=$con->prepare("select * from user where user_name='$user_name' AND user_pass='$user_pass'");
			$get_user->setFetchMode(PDO:: FETCH_ASSOC);
			$get_user->execute();
			$count=$get_user->rowCount();

			if ($count==1) {
		
			 $_SESSION['user_pass']=$user_pass;
			 header("Location:index.php");
			
			}
			else{
				echo "<script>alert('Invalid user name or password');</script>";
			}
		}
	 ?>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>