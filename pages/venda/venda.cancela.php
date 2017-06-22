<?php
//seta o horário padrao para esse script
date_default_timezone_set("Brazil/East");

session_start();
include('../DAO/conexao.php');


limpaCesta();


header("location: ../index.php");
//header("location: ../index.php?vendaStatus=ok&id=$id_venda");
die();






function limpaCesta(){
    unset($_SESSION['nome_cliente']);
    unset($_SESSION['id_cliente']);
    unset($_SESSION['indice']);
    unset($_SESSION['cesta']);
    unset($_SESSION['totalCesta']);    
}
