<?php
date_default_timezone_set("Brazil/East");
include("DAO/conexao.php");
include("DAO/estoqueDAO.php");

$produto['id'] = $_POST['id'];;
$produto['nome_produto'] = $_POST['nome_produto'];
$produto['qtd_produto'] = $_POST['qtd_produto'];

$movimentacao['codigo_nf'] = $_POST['codigo_nf'];
$movimentacao['valor_produto'] = $_POST['valor_produto'];



adicionaProduto($conexao, $produto);
cadastrarMovimentacao($conexao, $produto, $movimentacao);

header("location: estoque.lista.php?status=alterado");
die();





?>
