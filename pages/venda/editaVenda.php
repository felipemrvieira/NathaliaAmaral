<?php
session_start();

$qtd = sizeof($_SESSION['cesta']);

        for($i=0; $i < $qtd; $i++) {
            $_SESSION['cesta'][$i]['nome'];
            $_SESSION['cesta'][$i]['qtd'];
            $_SESSION['cesta'][$i]['valor'];
            $_SESSION['cesta'][$i]['totalItem'];

            if($i == $_GET['id']){
                $_SESSION['cesta'][$i]['nome'] =  "CANCELADO " .                                                         $_SESSION['cesta'][$i]['nome'] ;
                //$_SESSION['cesta'][$i]['qtd'] = null;
                $_SESSION['cesta'][$i]['valor'] = 0;
                $_SESSION['cesta'][$i]['totalItem'] = 0;




            }

        }

header("location: ../editarVenda.php?removido=ok");
die();
