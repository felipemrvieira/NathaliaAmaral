<?php
ob_start();
    
    include("DAO/conexao.php");
    include("DAO/operacoesDAO.php");

if(array_key_exists("id", $_GET)) {

    echo $resultado = entregaServicoTerceiros($conexao, $_GET['id']);
}
                 
header("location: terceiro.service.search.php?status=entregue");
die();
