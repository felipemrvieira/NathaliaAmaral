<?php
date_default_timezone_set("Brazil/East");
include("DAO/conexao.php");
include("DAO/estoqueDAO.php");

$produto['id'] = $_POST['id'];
$produto['nome_produto'] = $_POST['nome_produto'];
$produto['qtd_produto'] = $_POST['saida'];

$movimentacao['destino_produto'] = $_POST['destino_produto'];

alteraProdutoSelect($conexao, $produto);
cadastrarMovimentacaoBaixa($conexao, $produto, $movimentacao);



header("location: estoque.lista.php?status=alterado");
die();


?>
