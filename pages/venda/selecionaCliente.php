<?php
session_start();

$id_nome_cliente = $_POST['cliente'];

//$_SESSION["venda"]['nome'] = $nome_cliente;
$_SESSION['nome_cliente'] = extraiNome($id_nome_cliente);
$_SESSION['id_cliente'] = extraiId($id_nome_cliente);

echo $_SESSION['nome_cliente'];
echo '<br>';
echo $_SESSION['id_cliente'];

function extraiId($dado){
   return substr($dado, 0, strpos($dado, '-'));
}

function extraiNome($dado){
    return substr($dado, strpos($dado, '-')+1, strlen($dado));
}
header("location: ../selecionarProduto.php");
die();