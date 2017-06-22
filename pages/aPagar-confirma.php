<?php
include("DAO/conexao.php");
include("DAO/financeiroDAO.php");

$id_parcela = $_GET['id'];

confirmaPagamento($conexao, $id_parcela);

header("location: aPagar.php?status=pago");
die();
