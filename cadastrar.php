<!DOCTYPE html>
<html>
<head>
	<title>SALIM - Cadastro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="layout_login.css">
</head>
<body>
	<header style="width:100%;">
		<h1>
			<img src="img/logo.png" alt="Salim" title="Salim">
		</h1>
	</header>

	<section>
		<div>
			<form autocomplete="on" method="post" action="login.php">
				<strong>CADASTRO</strong>
				<input type="text" name="nome" placeholder="NOME" required="true">
				</br>
				<input type="password" name="senha" placeholder="PASSWORD" required="true">
				</br>
				<input type="submit" name="login" value="CADASTRAR">
			</form>
		</div>
	</section>

	<footer>
		<img src="img/logo_fmm.png">	
	</footer>
</body>
</html>