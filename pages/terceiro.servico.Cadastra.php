<?php
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");
include("DAO/estoqueDAO.php");

$servico['terceiro'] = $_POST['terceiro'];
$servico['data_saida'] = $_POST['data_saida'];
$servico['data_retorno'] = $_POST['data_retorno'];
$servico['descricao'] = $_POST['descricao'];


$baixa['id'] = $_POST['id'];
$baixa['saida'] = $_POST['saida'];


if ($baixa['id']!= "vazio") {
  alteraProdutoSelect($conexao, $baixa);
}


cadastrarServicosTerceiros($conexao, $servico);

header("location: terceiro.service.search.php?status=ok");
die();
