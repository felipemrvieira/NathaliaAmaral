<?php
  include("DAO/conexao.php");
  include("DAO/financeiroDAO.php");

  excluirCompraEParcelas($conexao, $_POST['id']);

  header("location: compra.listar.php");
  die();
