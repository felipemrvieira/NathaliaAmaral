<?php
include("DAO/conexao.php");
include("DAO/estoqueDAO.php");


$nome_servico = $_POST['nome_servico'];
$valor_servico = $_POST['valor_servico'];

cadastrarServico($conexao, $nome_servico, $valor_servico);

//vau para a tela de venda
header("location: selecionarProduto.php");

//vai para a pagina de cadastro de serviços
// header("location: form.services.php?status=ok");
die();
