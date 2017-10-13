<!DOCTYPE html>
<html>

<head>
	<title>Salim - Sistema Automatizado Da Limpeza Dos Igarapés De Manaus</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/layout_main.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
	<div id="testao">		
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
	</div>
	
	<nav>
		<ul>
			<a href="maps.php?mapa=manaus"><li><p>maps</p></li></a>
			<a href="boats.php"><li><p>boats</p></li></a>
			<a href="contacts.php"><li><p>contacts</p></li></a>
			<a href="about.php"><li><p>about</p></li></a>			
		</ul>	
	</nav>

	<div id="map"></div>

	<script>
	function myMap() {
	var mapOptions = {
	    center: new google.maps.LatLng(51.5, -0.12),
	    zoom: 10,
	    mapTypeId: google.maps.MapTypeId.HYBRID
	}
	var map = new google.maps.Map(document.getElementById("map"), mapOptions);
	}
	</script>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2nbcDRU_E8zrYgZ8wWUg7dsVzfVmBpr0&callback=myMap"></script>

	<div id="novidades">
		<h2>NOTICIAS</h2>

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

</body>

</html>