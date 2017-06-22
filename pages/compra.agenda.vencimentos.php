<?php
session_start();
include('DAO/conexao.php');
echo '<br>id da compra ';

echo $id_compra = $_GET['id'];
 echo '<br> total da cesta';
echo $totalCompra = $_SESSION['totalCompra'];
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

  cadastraVencimentosCompra($id_compra, $totalCompra, $parcela, $valor_parcela, $vencimento, $pago, $conexao);
  echo '<br>';
  echo '<br>';
};

 limpaCesta();

header("location: compra.listar.php?compra=ok");
die();

function cadastraVencimentosCompra($id_compra, $totalCompra, $parcela, $valor_parcela, $vencimento, $pago, $conexao){
    echo $query = "insert into contas_a_pagar(id_compra,  total_compra, parcela, vencimento, valor_parcela, pago)
                                    values('{$id_compra}', '{$totalCompra}',  '{$parcela}', '{$vencimento}','{$valor_parcela}',  '{$pago}')";

    $resultado = mysqli_query($conexao, $query);
        printf ("New Record has id %d.\n", mysqli_insert_id($conexao));

        return mysqli_insert_id($conexao);

};


function limpaCesta(){
    unset($_SESSION['nome_cliente']);
    unset($_SESSION['id_cliente']);
    unset($_SESSION['indice']);
    unset($_SESSION['cesta']);
    unset($_SESSION['totalCompra']);
}
