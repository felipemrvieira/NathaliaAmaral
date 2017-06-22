<?php
ob_start();
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");


$clienteAlterado['id'] = $_GET['id'];
$clienteAlterado['nome_cliente'] =  $_POST['nome'];
$clienteAlterado['sexo'] = $_POST['sexo'];
$clienteAlterado['rg'] = $_POST['rg'];
$clienteAlterado['cpf'] = $_POST['cpf'];
$clienteAlterado['obs'] = $_POST['obs']; 
$clienteAlterado['manequim'] = $_POST['manequim']; 
$clienteAlterado['email_cliente'] = $_POST['email'];
$clienteAlterado['telefone_cliente'] = $_POST['telefone'];
$clienteAlterado['data_nascimento'] = $_POST['data_nascimento'];

//print_r(array_values($clienteAlterado));

editaCliente($conexao, $clienteAlterado);
                 
header("location: editaCliente.php?status=ok&id=".$clienteAlterado['id']);
die();
