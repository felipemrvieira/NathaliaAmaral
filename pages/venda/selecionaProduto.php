<?php
session_start();
include('funcoesProdutos.php');


if(isset($_SESSION["indice"]) !== true){
    if(isset($_POST['produto']) == true){
        $_SESSION["indice"] = 0;
        $_SESSION["cesta"][$_SESSION["indice"]]['nome'] = extraiNome($_POST['produto']);
        $_SESSION["cesta"][$_SESSION["indice"]]['id_prod_serv'] = extraiId($_POST['produto']);
        $_SESSION["cesta"][$_SESSION["indice"]]['qtd'] = $_POST['qtd'];
        $_SESSION['data_venda'] = $_POST['data_venda'];
        $_SESSION["cesta"][$_SESSION["indice"]]['valor'] = extraiValor($_POST['produto']);
        $_SESSION["cesta"][$_SESSION["indice"]]['totalItem'] = $_SESSION["cesta"][$_SESSION["indice"]]['qtd'] *
            $_SESSION["cesta"][$_SESSION["indice"]]['valor'];

        echo 'produto '.$_SESSION["indice"].' adicionado';
    }


}else{
    if(isset($_POST['produto']) == true){
        $_SESSION["indice"] += 1;
        $_SESSION["cesta"][$_SESSION["indice"]]['nome'] = extraiNome($_POST['produto']);
        $_SESSION["cesta"][$_SESSION["indice"]]['id_prod_serv'] = extraiId($_POST['produto']);
        $_SESSION["cesta"][$_SESSION["indice"]]['qtd'] = $_POST['qtd'];
        $_SESSION['data_venda'] = $_POST['data_venda'];
        $_SESSION["cesta"][$_SESSION["indice"]]['valor'] = extraiValor($_POST['produto']);
        $_SESSION["cesta"][$_SESSION["indice"]]['totalItem'] = $_SESSION["cesta"][$_SESSION["indice"]]['qtd'] *
            $_SESSION["cesta"][$_SESSION["indice"]]['valor'];

        echo 'produto '.$_SESSION["indice"].' adicionado';
    }
}




echo '<br>';
exibeCliente();
echo '<br>';
echo 'Lista de itens';
echo '<br>';
echo '------------------------------';
echo '<br>';
echo 'Nome: - Valor:';
echo '<br>';
listaItens();
echo '<br>';
echo '------------------------------';
echo '<br>';
echo 'itens na cesta';
echo '<br>';
echo sizeof($_SESSION['cesta']);




//limpaCarrinho();


header("location: ../selecionarProduto.php");
die();
