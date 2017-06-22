<?php
ob_start();
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");


$cliente['id_cliente'] = $_POST['id'];



$uploaddir = 'uploads/';
//$uploadfile = $uploaddir . basename($_FILES['foto']['name']);
$uploadfile = $uploaddir . $cliente['id_cliente'].'-avatar'.date("h-i-sa").'.png';

if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
    $cliente['endereco_foto'] = $cliente['id_cliente'].'-avatar'.date("h-i-sa").'.png';
    
}
echo $cliente['endereco_foto'];

alterarFotoCliente($conexao, $cliente);

header("location: visualizarcliente.php?id=".$cliente['id_cliente']);
die();
