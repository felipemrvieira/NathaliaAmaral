<?php
ob_start();
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");

$terceiro['nome'] = $_POST['nome'];
$terceiro['cnpj'] = $_POST['cnpj'];
$terceiro['cpf'] = $_POST['cpf'];
$terceiro['telefone'] = $_POST['telefone'];
$terceiro['email'] = $_POST['email'];
$terceiro['cidade'] = $_POST['cidade'];
$terceiro['rua'] = $_POST['rua'];
$terceiro['bairro'] = $_POST['bairro'];
$terceiro['numero'] = $_POST['numero'];
$terceiro['dadosBancarios'] = $_POST['dados-bancarios'];

cadastrarTerceiro($conexao, $terceiro);

header("location: terceiro.form.php?status=ok");
die();
