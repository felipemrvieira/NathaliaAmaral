<?php
session_start();
include('../DAO/conexao.php');
echo '<br>id da venda ';

echo $id_venda = $_GET['id'];
 echo '<br> total da cesta';
echo $totalCesta = $_SESSION['totalCesta'];
echo '<br> parcelas ';

echo $parcelas = $_GET['parcelas'];
echo '<br>';




for($i = 0; $i<$parcelas; $i++){
  echo '<br>vencimento ';
  echo $vencimento = $_POST['vencimento_parcela'.$i];

  echo '<br>parcela ';
  echo $parcela = $i+1;

  echo '<br> pago ';

  if(!isset($_POST['pago'.$i])){
      $pago = 'n';
  }else{
      $pago = 's';
  };

  echo $pago;
  echo '<br>';
  echo '<br> Valor da parcela';
  echo $valor_parcela = $_POST['valor_parcela'.$i];
  echo '<br> insert no banco ------';

  cadastraVencimentos($id_venda, $totalCesta, $parcela, $valor_parcela, $vencimento, $pago, $conexao);
  echo '<br>';
  echo '<br>';
};

limpaCesta();

header("location: ../index.php?venda=ok");
die();

function cadastraVencimentos($id_venda, $totalCesta, $parcela, $valor_parcela, $vencimento, $pago, $conexao){
    echo $query = "insert into contas_a_receber(id_venda,  total_venda, parcela, valor_parcela, vencimento, recebido)
                                    values('{$id_venda}', '{$totalCesta}',  '{$parcela}', '{$valor_parcela}', '{$vencimento}', '{$pago}')";

    $resultado = mysqli_query($conexao, $query);
        printf ("New Record has id %d.\n", mysqli_insert_id($conexao));

        return mysqli_insert_id($conexao);

};


function limpaCesta(){
    unset($_SESSION['nome_cliente']);
    unset($_SESSION['id_cliente']);
    unset($_SESSION['indice']);
    unset($_SESSION['cesta']);
    unset($_SESSION['totalCesta']);
}
