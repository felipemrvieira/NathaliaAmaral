<?php
include("DAO/conexao.php");
include("DAO/financeiroDAO.php");

$id_parcela = $_GET['id'];

desfazRecebimento($conexao, $id_parcela);

header("location: aReceber.php");
die();
