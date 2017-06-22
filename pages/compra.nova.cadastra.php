<?php
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");
include("DAO/estoqueDAO.php");

session_start();

$compra['historico'] = $_POST['historico'];
$compra['codigo'] = $_POST['codigo'];
$compra['data_compra'] = $_POST['data_compra'];
$compra['total'] = $_POST['total'];
$compra['parcelamento'] = $_POST['parcelamento'];

$_SESSION['totalCompra'] = $compra['total'];
echo $idCompra = cadastrarCompra($conexao, $compra);

header("location: compra.cadastrar.parcelas.php?id=".$idCompra."&parcelas=".$compra['parcelamento']);
die();
