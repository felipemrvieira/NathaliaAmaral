<?php
//seta o horário padrao para esse script
date_default_timezone_set("Brazil/East");

session_start();
include('../DAO/conexao.php');

$formaPagamento = $_POST['formaPagamento'];
$parcelas = $_POST['parcelas'];
$data_entrega = $_POST['data_entrega'];
$produto_entregue = $_POST['entregue'];



$id_venda = cadastraVenda($_SESSION['id_cliente'], date("Y-m-d H:i:s"), $data_entrega, $produto_entregue, $conexao);
cadastraItensVenda($id_venda, $conexao);
cadastraFormaPagamento($id_venda, $formaPagamento, $parcelas, $conexao);


//listaProdutos();
//limpaCesta();


header("location: ../vencimentos.php?id=$id_venda&parcelas=$parcelas");
//header("location: ../index.php?vendaStatus=ok&id=$id_venda");
die();


function cadastraVenda($id_cliente, $data_venda, $data_entrega, $produto_entregue, $conexao){
    
    if(isset($_SESSION['cesta'])==true){
        $query = "insert into venda (id_cliente, data_venda, data_entrega, entregue) values ('{$id_cliente}', '{$data_venda}', '{$data_entrega}', '{$produto_entregue}')";
        $resultado = mysqli_query($conexao, $query);
        printf ("New Record has id %d.\n", mysqli_insert_id($conexao));

        return mysqli_insert_id($conexao);
    }
} 

function cadastraItensVenda($id_venda, $conexao){
    $total = $_SESSION['totalCesta'];
   
    
    if(isset($_SESSION['cesta'])==true){
       $qtd = sizeof($_SESSION['cesta']);
        
        for($i=0; $i < $qtd; $i++) {
            echo 'Cadastrando itens';               
                          
            $queryItem = "insert into itens_venda (id_venda, qtd_itens, id_prod_serv) values ('{$id_venda}', '{$_SESSION['cesta'][$i]['qtd']}', '{$_SESSION['cesta'][$i]['id_prod_serv']}')";
            $resultado = mysqli_query($conexao, $queryItem);
        }
        //return $resultado;
        echo "total ".$total;
        $update = "UPDATE venda SET total ='{$total}' WHERE  id_venda='{$id_venda}' ";
        $resultado = mysqli_query($conexao, $update);
    }

}


function listaProdutos(){
    if(isset($_SESSION['cesta'])==true){
        $_SESSION['totalCesta']=0;
        $qtd = sizeof($_SESSION['cesta']);
        
        echo "<hr>";
        echo 'lista de produtos';
        echo"<br>";
        for($i=0; $i < $qtd; $i++) {
                   
            echo $_SESSION['cesta'][$i]['nome'].'<br>';
            echo $_SESSION['cesta'][$i]['id_prod_serv'].'<br>' ;
            echo $_SESSION['cesta'][$i]['qtd'].'<br>';
            echo $_SESSION['cesta'][$i]['valor'].'<br>';
            
            $_SESSION['totalCesta'] +=  $_SESSION['cesta'][$i]['totalItem'];

            echo'<br>';
                
    }
        echo "<hr>";
  }
}

function cadastraFormaPagamento($id_venda, $formaPagamento, $parcelas, $conexao){
     if(isset($_SESSION['cesta'])==true){
        $query = "insert into forma_pagamento (id_venda, forma_pgto, qtd_parcelas) values ('{$id_venda}', '{$formaPagamento}', '{$parcelas}')";
        $resultado = mysqli_query($conexao, $query);
        printf ("New Record has id %d.\n", mysqli_insert_id($conexao));

        return mysqli_insert_id($conexao);
    }
}





function limpaCesta(){
    unset($_SESSION['nome_cliente']);
    unset($_SESSION['id_cliente']);
    unset($_SESSION['indice']);
    unset($_SESSION['cesta']);
    unset($_SESSION['totalCesta']);    
}