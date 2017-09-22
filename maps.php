<!DOCTYPE html>
<html>
<head>
	<title>maps</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="layout_main.css">
</head>
<body>
	<header>
		<img src="img/logo.png">
		<?php 
			$local = @$_GET['mapa'];
			if($local == "manaus"){
				$x = -3.0590109;
				$y = -59.981879;
				$zoom = 11;
				$macadores ='';
			}
			else{				

				$link = mysql_connect('localhost', 'root','');

				if (!mysql_select_db('db_nickson', $link)) {
				    echo 'Não foi possível selecionar o banco de dados';
				    exit;
				}

				$sql    = 'SELECT x,y,zoom,script FROM tb_boats WHERE id = ' . $local;
				$result = mysql_query($sql, $link);

				if (!$result) {
				    echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
				    echo 'Erro MySQL: ' . mysql_error();
				    exit;
				}

				while ($row = mysql_fetch_assoc($result)) {	 
					$x =  floatval($row['x']);
					$y =  floatval($row['y']);
					$zoom =  floatval($row['zoom']);
					$macadores = $row['script'];
				}
			}
		?>
	</header>
	<nav>
		<ul>
			<li><a href="main.php">home</a></li>
			<li><a href="maps.php?mapa=manaus">maps</a></li>
			<li><a href="boats.php">boats</a></li>
			<li><a href="contacts.php">contacts</a></li>
			<li><a href="about.php">about</a></li>			
		</ul>	
	</nav>
	<section>
		<div style="width:20%;height:100%;float:left;overflow-y:scroll;">
			<header><h2>Mapas</h2></header>

			<?php

				$link = mysql_connect('localhost', 'root','');

				if (!mysql_select_db('db_nickson', $link)) {
				    echo 'Não foi possível selecionar o banco de dados';
				    exit;
				}

				$sql    = 'SELECT nome,id FROM tb_boats';
				$result = mysql_query($sql, $link);

				if (!$result) {
				    echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
				    echo 'Erro MySQL: ' . mysql_error();
				    exit;
				}

				while ($row = mysql_fetch_assoc($result)) {				    
				    echo"<a href='maps.php?mapa="; echo $row['id']; echo"'>";
					echo"	<article>";
					echo"		<img src='img/logo.png'>";
					echo"		<p>";
					echo 			$row['nome'];			
					echo"		</p>";
					echo"	</article>";
					echo "</a>";
				}					
			?>

		</div>
		<div id="googleMap" style="width:80%;height:100%;float:right;"></div>
		
		<script>
			function myMap() 
			{
				var myLatLng={lat: <?php echo $x; ?>, lng: <?php echo $y; ?>};
				var mapProp= {center:new google.maps.LatLng(<?php echo $x; ?>,<?php echo $y; ?>), zoom:<?php echo $zoom; ?>};
				var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

				var marker = new google.maps.Marker({
	          		position: myLatLng,
	          		googleMap: map,
	          		title: 'Hello World!'
	        	});
			}

		</script>

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkWUwfgXgmBCnOEnhp0sJHkl3vgoLP68U&callback=myMap"></script>	
	</section>
	</section>
	<footer>
		<img src="img/logo_fmm.png">
	</footer>
</body>
</html>