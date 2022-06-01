<?php

$servidor = "localhost";
$banco = "id18876815_aulasecursospw";
$usuario = "id18876815_guilherme_tavares";
$senha = "CORoa990236381$$";
$porta = "3306";


// criando uma conexão com banco de dados
$conn = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);

// checando a conexão se foi bem sucedida
if (!$conn) {
    die("A conexão falhou: " . mysqli_connect_error());
}
#echo " Conexao bem sucedida";
?>