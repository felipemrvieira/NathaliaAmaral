<?php
include("DAO/conexao.php");
include("DAO/financeiroDAO.php");

$id_parcela = $_GET['id'];
echo $mes = $_GET['mes'];


confirmaRecebimento($conexao, $id_parcela);

header("location: aReceber.php?mes=".$mes);
die();
