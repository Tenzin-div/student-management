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
			<li style='color: #fff;'><?php echo	$_SESSION['user_name']?></li>
		</ul>
	</div>
</header>
