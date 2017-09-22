<!DOCTYPE html>
<html>

<head>
	<title>Salim - Sistema Automatizado Da Limpeza Dos Igarapés De Manaus</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="layout_main.css">
</head>

<body>
	
	<header style="width:100%;">
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
		<h1>
			<img src="img/logo.png" alt="Salim" title="Salim">
		</h1>
	</header>
	
	<nav>
		<ul>
			<li><a href="">home</a></li>
			<li><a href="maps.php?mapa=manaus">maps</a></li>
			<li><a href="boats.php">boats</a></li>
			<li><a href="contacts.php">contacts</a></li>
			<li><a href="about.php">about</a></li>			
		</ul>	
	</nav>
	
	<section>
		<div id="news" style="width:20%;height:100%;float:left;overflow-y:scroll;">
			<header><h2>NEWS</h2></header>

			<?php

				$link = mysql_connect('localhost', 'root','');

				if (!mysql_select_db('db_nickson', $link)) {
				    echo 'Não foi possível selecionar o banco de dados';
				    exit;
				}

				$sql    = 'SELECT noticia,data,hora,barco FROM salim_news';
				$result = mysql_query($sql, $link);

				if (!$result) {
				    echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
				    echo 'Erro MySQL: ' . mysql_error();
				    exit;
				}

				while ($row = mysql_fetch_assoc($result)) {				    
				    
					echo"	<article>";
					echo"		<img src='img/logo.png'>";
					echo"		<p>";
					echo 			$row['hora'];
					echo "</br>";
					echo 			$row['noticia'];
					echo "</br>";
					echo 			$row['barco'];			
					echo"		</p>";
					echo"	</article>";
				}					
			?>			
		</div>
		
		<div id="googleMap" style="width:80%;height:100%;float:right;"></div>
		
		<script>
			function myMap() 
			{
				var mapProp= {center:new google.maps.LatLng(-3.0404977,-59.9465168,13), zoom:11};
				var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
			}
		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkWUwfgXgmBCnOEnhp0sJHkl3vgoLP68U&callback=myMap"></script>	
	</section>
	
	<footer>
		<img src="img/logo_fmm.png" style="float: left;">
		<div style="width:200px; height: 100%; float: right;">
			<img src="img/user.png" style="width: 80px; height: 80px; float: left;">
			<?php 
				echo"<p style='float:right;'>";
				echo $_SESSION['login'];
				echo "</p>";
			 ?>			
		</div>	
	</footer>

</body>

</html>