<?php 
	session_start();
	$login = $_POST['nome'];
	$senha = $_POST['senha'];
	$con = mysql_connect("localhost", "root", "") or die ("Sem conexão com o servidor");
	$select = mysql_select_db("db_nickson") or die("Sem acesso ao DB, Entre em contato com o Administrador, gilson_sales@bytecode.com.br");
	$result = mysql_query("SELECT * FROM `tb_login` WHERE `NOME` = '$login' AND `SENHA`= '$senha'");
	
	if(mysql_num_rows ($result) > 0 )
	{
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		header('location:main.php');
	}
	else
	{
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);
		header('location:index.php');
		
	}
?>