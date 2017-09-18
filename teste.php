<?php
$link = mysql_connect('localhost', 'root','');

if (!mysql_select_db('db_nickson', $link)) {
    echo 'Não foi possível selecionar o banco de dados';
    exit;
}

$sql    = 'SELECT nome FROM tb_login';
$result = mysql_query($sql, $link);

if (!$result) {
    echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
    echo 'Erro MySQL: ' . mysql_error();
    exit;
}

while ($row = mysql_fetch_assoc($result)) {
    echo $row['nome'];
}

?>