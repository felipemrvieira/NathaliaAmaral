<?php
  include("DAO/conexao.php");
  include("DAO/financeiroDAO.php");

  excluirParcelaAReceber($conexao, $_POST['id']);
  echo $mes = trim($_POST['mes']);

  header("location: aReceber.php?status=excluido&mes=mes".$mes);
  die();
