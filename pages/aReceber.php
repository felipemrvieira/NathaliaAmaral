<?php
//seta o horário padrao para esse script
date_default_timezone_set("Brazil/East");

    include("DAO/conexao.php");
    include("DAO/financeiroDAO.php");
    include('header.php');

if(isset($_POST['dataInicial'])){
    $dataInicial = $_POST['dataInicial'];
    $dataFinal = $_POST['dataFinal'];

}

$_SESSION['total'] = 0;
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contas a Receber</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php if(array_key_exists("status", $_GET) && $_GET['status']=='pago'){?>
                <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Confirmação de pagamento realizada com <strong>Successo!</strong>
              </div>
            <?php }  ?>

            <div class="row">


<?php
function alteraMes($i){
  switch ($i) {
    case 1:
      return "Janeiro";
      break;
    case 2:
      return "Fevereiro";
      break;
    case 3:
      return "Março";
      break;
    case 4:
      return "Abril";
      break;
    case 5:
      return "Maio";
      break;
    case 6:
      return "Junho";
      break;
    case 7:
      return "Julho";
      break;
    case 8:
      return "Agosto";
      break;
    case 9:
      return "Setembro";
      break;
    case 10:
      return "Outubro";
      break;
    case 11:
      return "Novembro";
      break;
    case 12:
      return "Dezembro";
      break;
  }
}

 ?>

<div class="col-md-12">
<?php for ($i=1; $i < 13; $i++) {?>

<div class="panel-group" id="accordion1">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion<?=$i?>" href="#collapse<?=$i?>"><?php echo alteraMes($i) ?></a>
        </h4>
      </div>
      <div id="collapse<?=$i?>" class="panel-collapse collapse in">

          <div class="panel-body">
            <div class="col-lg-12">


                <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>Venda</th>
                          <th>Data venda</th>
                          <th>Cliente</th>
                          <th>Parcela</th>
                          <th>Vencimento</th>
                          <th>Valor</th>
                          <th>Meio pgto</th>
                          <th>Recebido</th>

                      </tr>
                   </thead>

            <?php
                    $total=0;
                    $totalAberto=0;
                    $totalRecebido=0;
              $array_contas = buscaContasAReceberPorMes($conexao, $i);
              foreach($array_contas as $conta) {
              ?>
                    <tr>
                        <td><?= $conta['id_venda'] ?></td>
                        <td><?= $conta['data_venda'] ?></td>
                        <td><?= $conta['nome_cliente'] ?></td>

                        <td><?= $conta['parcela'] ?></td>
                        <td><a href="aReceberAtualizaValor.php?id=<?= $conta['id_parcela'] ?>"><?= $conta['vencimento'] ?></a></td>
                        <td><a href="aReceberAtualizaValor.php?id=<?= $conta['id_parcela'] ?>">R$ <?= $conta['valor_parcela'] ?></a></td>
                        <?php $total += $conta['valor_parcela']?>
                        <td><?= $conta['forma_pgto'] ?></td>

                        <td> <?php if ($conta['recebido'] == 'n') {
                          echo 'Não';
                        } else {
                          echo 'Sim';
                        }
                         ?>
                       </td>
                        <td> <?php if ($conta['recebido'] == 'n') {
                          echo '<a href="aReceber-confirma.php?id='.$conta['id_parcela']. ' "> Informar recebimento <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aReceber-desfaz.php?id='.$conta['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($conta['recebido'] == 'n') {
                         $totalAberto+=$conta['valor_parcela'];
                       } else {
                         $totalRecebido+=$conta['valor_parcela'];
                       }
                        ?>

                    </tr>

                    <!-- Fim do for -->
                    <?php } ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right">Total do mês:</td>
                        <td>R$ <?=$total?></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right">Total recebido:</td>
                        <td>R$ <?=$totalRecebido?></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right">Total em aberto:</td>
                        <td>R$ <?=$totalAberto?></td>
                        <td></td>
                        <td></td>

                        <td></td>
                    </tr>

                  </table>
             </div>
          </div>

      </div>
    </div>

</div>
<?php } ?>


<button class="btn btn-default" onclick="imprime()">Imprimir</button>
<br><br>

  <!-- div 12 colunas -->
</div>
    </div>
</div>
</div>
        </div>

         <script>
function imprime() {
    window.print();
}
</script>
    <!--/div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
