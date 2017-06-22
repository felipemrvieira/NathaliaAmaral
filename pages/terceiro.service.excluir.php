<?php
ob_start();
    
    include("DAO/conexao.php");
    include("DAO/operacoesDAO.php");

if(array_key_exists("id", $_GET)) {

    echo $resultado = excluiServicoTerceiros($conexao, $_GET['id']);
}
                 
header("location: terceiro.service.search.php?status=excluido");
die();
