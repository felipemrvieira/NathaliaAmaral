<?php
include("DAO/conexao.php");
include("DAO/financeiroDAO.php");

$id_parcela = $_GET['id'];

desfazPagamento($conexao, $id_parcela);

header("location: aPagar.php");
die();
