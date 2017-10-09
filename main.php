<!DOCTYPE html>
<html>

<head>
	<title>Salim - Sistema Automatizado Da Limpeza Dos Igarapés De Manaus</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/layout_main.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>

<body>
	
	<header>
		<?php 
			session_start();
			if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
			{
				unset($_SESSION['login']);
				unset($_SESSION['senha']);
				header('location:index.php');
				}

			$logado = $_SESSION['login'];
		?>
		<img src="img/logo.png">
	</header>

	<div id="user">
		<a href="">
			<span class="fontawesome-arrow-down"></span>
			<p><?php echo $_SESSION['login'] ?></p>
			<img src="img/user.png">
		</a>
	</div>
	
	<nav>
		<ul>
			<a href="maps.php?mapa=manaus"><li><p>maps</p></li></a>
			<a href="boats.php"><li><p>boats</p></li></a>
			<a href="contacts.php"><li><p>contacts</p></li></a>
			<a href="about.php"><li><p>about</p></li></a>			
		</ul>	
	</nav>
</body>

</html>