<?php
include("DAO/conexao.php");
include("DAO/estoqueDAO.php");


$id = $_GET['id'];
$nome_servico = $_POST['nome_servico'];
$valor_servico = $_POST['valor_servico'];


editaServico($conexao, $nome_servico, $valor_servico, $id);
                 
header("location: editaServico.php?status=ok&id=$id ");
die();
