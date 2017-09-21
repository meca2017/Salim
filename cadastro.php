<?php 
	$login = $_POST['nome'];
	$senha = ($_POST['senha']);
	$connect = mysql_connect('localhost','root','');
	$db = mysql_select_db('db_nickson');
	$query_select = "SELECT NOME FROM tb_login WHERE NOME = '$login'";
	$select = mysql_query($query_select,$connect);
	$array = mysql_fetch_array($select);
	$logarray = $array['NOME'];

	  if($login == "" || $login == null){
	    echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastrar.html';</script>";

	    }else{
	      if($logarray == $login){

	        echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastrar.php';</script>";
	        die();

	      }else{
	        $query = "INSERT INTO tb_login (NOME,SENHA) VALUES ('$login','$senha')";
	        $insert = mysql_query($query,$connect);
	        
	        if($insert){
	          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='index.php'</script>";
	        }else{
	          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastrar.php'</script>";
	        }
	      }
	    }
?>