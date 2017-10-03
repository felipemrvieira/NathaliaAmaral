<?php
  include("DAO/conexao.php");
  include("DAO/financeiroDAO.php");

  excluirParcela($conexao, $_POST['id']);

  header("location: aPagar.php?status=excluido");
  die();
