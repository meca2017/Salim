<!DOCTYPE html>
<html>
<head>
	<title>SALIM - Cadastro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/layout_index.css">
</head>
<body>

	<section>
		<div id="logo">
			<img src="img/logo.png">
		</div>

		<div id="login">
			<form autocomplete="on" method="post" action="cadastro.php">
				<header class="titulo">
					
				</header>
				<p>
					<span class="fontawesome-user"></span>
					<input type="text" name="nome" placeholder="NOME" required="true">
				</p>
				<p>
					<span class="fontawesome-lock"></span>
					<input type="password" name="senha" placeholder="SENHA" required="true">
				</p>
				<p><input type="submit" name="login" value="CADASTRAR"></p>
			</form>
		</div>
	</section>
</body>
</html>