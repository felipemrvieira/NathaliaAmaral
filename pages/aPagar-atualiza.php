<?php
include("DAO/conexao.php");
include("DAO/financeiroDAO.php");

echo $parcela['valor_parcela'] = $_POST['valor_parcela'];
echo $parcela['id_parcela'] = $_POST['id_parcela'];
echo $parcela['vencimento_parcela'] = $_POST['vencimento_parcela'];

aPagarAlteraVencimento($conexao, $parcela);

header("location: aPagar.php?status=pago");
die();
