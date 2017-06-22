<?php
include("DAO/conexao.php");
include("DAO/financeiroDAO.php");

$id_parcela = $_GET['id'];
$id = $_GET['usuario'];


desfazRecebimento($conexao, $id_parcela);

header("location: visualizarcliente.php?parcela=alterada&id=".$id);
die();
