<?php
session_start();

$_SESSION["itens"] = array();

$nome_cliente = $_POST['cliente'];
$produto = $_POST['produto'];
$qtd = $_POST['qtd']; 
$desconto = $_POST['desconto']; 

$_SESSION["itens"]['nome'] = $nome_cliente;
$_SESSION["itens"]['produto'] = $produto;
$_SESSION["itens"]['qtd'] = $qtd;
$_SESSION["itens"]['desconto'] = $desconto;

//echo $_SESSION["itens"]['nome'];


header("location: index.php?status=ok");
die();