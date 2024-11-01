<?php session_start(); 
	if (!isset($_SESSION['user_pass'])) {
		header("Location:login.php");
	}
?>


<header>
	<img src="../img/logo.png">
	<div class="menu">
		<ul>
			
			<li><a href="logout.php?logout">Signout</a></li>
			
			<?php 
				include("config/db.php");
				$get_username=$con->prepare("select * from user ");
				$get_username->setFetchMode(PDO:: FETCH_ASSOC);
				$get_username->execute();

				$row=$get_username->fetch();

				echo "<li style='color: #fff;'>".$row['user_name']."</li>";
			 ?>
		</ul>
	</div>
</header>
