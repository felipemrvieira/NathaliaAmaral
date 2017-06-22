<?php
include("DAO/conexao.php");
include("DAO/estoqueDAO.php");


$id = $_GET['id'];
$disp = $_GET['disp'];

if ($disp == 's'){
    $disp = 'n';
}elseif($disp == 'n'){
    $disp = 's';
}
encerraServico($conexao, $disp, $id);  
                 
header("location: search.services.php?status=ok&id=$id ");
die();
