<?php
ob_start();
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");


echo $endereco['id_cliente'] = $_POST['id_cliente'];
echo $endereco['cidade'] = $_POST['cidade'];
echo $endereco['rua'] = $_POST['rua'];
echo $endereco['numero'] = $_POST['numero'];
echo $endereco['bairro'] = $_POST['bairro'];
echo $endereco['complemento'] = $_POST['complemento'];

$id_cliente = $endereco['id_cliente'];


cadastrarEnderecoCliente($conexao, $endereco);
    
header("location: search.client.php?status=ok&idCliente=$id_cliente");
die();

                 
