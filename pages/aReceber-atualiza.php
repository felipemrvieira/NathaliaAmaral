<?php
include("DAO/conexao.php");
include("DAO/financeiroDAO.php");

echo $parcela['valor_parcela'] = $_POST['valor_parcela'];
echo $parcela['id_parcela'] = $_POST['id_parcela'];
echo $parcela['vencimento_parcela'] = $_POST['vencimento_parcela'];
echo $mes = trim($_POST['mes']);

aReceberAlteraVencimento($conexao, $parcela);

header("location: aReceber.php?status=pago&mes=mes".$mes);
die();
