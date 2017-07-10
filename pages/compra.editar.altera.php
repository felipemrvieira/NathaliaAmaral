<?php
include("DAO/conexao.php");
include("DAO/financeiroDAO.php");
include("DAO/estoqueDAO.php");

session_start();

$compra['id'] = $_POST['id'];
$compra['historico'] = $_POST['historico'];
$compra['codigo'] = $_POST['codigo'];
$compra['data_compra'] = $_POST['data_compra'];
$compra['total'] = $_POST['total'];
$compra['parcelamento'] = $_POST['parcelamento'];

$_SESSION['totalCompra'] = $compra['total'];
editarCompra($conexao, $compra);

header("location: compra.listar.php");
die();
