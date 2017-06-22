<?php
include("DAO/conexao.php");
include("DAO/estoqueDAO.php");


$produto['nome_produto'] = $_POST['nome_produto'];
$produto['qtd_produto'] = $_POST['qtd_produto'];
$produto['minimo_produto'] = $_POST['minimo_produto'];

$movimentacao['codigo_nf'] = $_POST['codigo_nf'];
$movimentacao['valor_produto'] = $_POST['valor_produto'];

cadastrarProduto($conexao, $produto);
cadastrarMovimentacao($conexao, $produto, $movimentacao);

//echo $nome_produto;
//echo $valor_produto;
//echo $qtd_produto;

header("location: estoque.lista.php?status=ok");
die();
