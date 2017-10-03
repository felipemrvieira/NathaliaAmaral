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
          <h1 class="page-header">Contas a Pagar</h1>
      </div>
      <!-- /.col-lg-12 -->
      <div class="col-lg-12">
          <a href="aPagar.php?ano=2017">2017</a> / <a href="aPagar.php?ano=2018">2018</a>
      </div>
    </div>
      <!-- /.row -->

    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='pago'){?>
        <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Confirmação de pagamento realizada com <strong>Successo!</strong>
      </div>
    <?php }  ?>

    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='excluido'){?>
        <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Excluido com <strong>successo!</strong>
      </div>
    <?php }  ?>
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

    <div class="row">
      <div class="col-md-12">

        <?php for ($i=1; $i < 13; $i++) {?>

        <div class="panel-group" id="mes<?=$i?>">

            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#mes<?=$i?>" href="#collapse<?=$i?>">
                    <?php echo alteraMes($i) ?>
                  </a>
                </h4>
              </div>
              <div id="collapse<?=$i?>" class="panel-collapse collapse in">

                  <div class="panel-body">
                    <div class="col-lg-12">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Id compra</th>
                            <th>Descrição</th>
                            <th>Valor total</th>
                            <th>Qtd parcelas</th>
                            <th>Parcela</th>
                            <th>Vencimento</th>
                            <th>Valor</th>
                            <th>Pago</th>
                          </tr>
                         </thead>
                          <?php
                           $total=0;
                           $totalAberto=0;
                           $totalPago=0;
                           if(array_key_exists("ano", $_GET) && $_GET['ano']=='2018'){
                             $ano = 2018;
                           }else {
                             $ano = 2017;
                           }
                           $array_compras = listaComprasEParcelasPorMes($conexao, $i, $ano);
                           foreach($array_compras as $compra) {
                          ?>

                          <tr>
                            <form method="post">

                            <td><?= $compra['id'] ?></td>
                            <td><a href="compra.editar.php?id=<?= $compra['id'] ?>"><?= $compra['historico'] ?></td></a></td>
                            <td>R$ <?= $compra['total'] ?></td>
                            <td><?= $compra['qtd_parcelas'] ?></td>
                            <td><?= $compra['parcela'] ?></td>
                            <td><a href="aPagarAtualizaValor.php?id=<?= $compra['id_parcela'] ?>"><?= $compra['vencimento'] ?></td></a></td>
                            <td><a href="aPagarAtualizaValor.php?id=<?= $compra['id_parcela'] ?>">R$ <?= $compra['valor_parcela'] ?></a></td>
                            <?php $total += $compra['valor_parcela']?>

                            <td> <?php if ($compra['pago'] == 'n') {
                              echo 'Não';
                            } else {
                              echo 'Sim';
                            }
                             ?>
                           </td>
                            <td> <?php if ($compra['pago'] == 'n') {
                              // echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. '&mes=#dezembro "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                              $caminhoConfirmacao = "aPagar-confirma.php?id=".$compra['id_parcela']."&mes=mes".$i;
                              echo '<button type="submit"
                                     formaction='.$caminhoConfirmacao.'
                                     class="btn btn-link">
                                       Informar pgto <i class="fa fa-check" aria-hidden="true"></i>
                                   </button>';
                            } else {
                              // echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' &mes=#dezembro"> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';
                              $caminhoCancelamento = "aPagar-desfaz.php?id=".$compra['id_parcela']."&mes=mes".$i;
                              echo '<button type="submit"
                                     formaction='.$caminhoCancelamento.'
                                     class="btn btn-link">
                                       Desfazer <i class="fa fa-undo" aria-hidden="true"></i>
                                   </button>';
                            }
                             ?>
                            </td>
                            <?php
                              if ($compra['pago'] == 'n') {
                                $totalAberto+=$compra['valor_parcela'];
                              }else{
                                $totalPago+=$compra['valor_parcela'];
                                }
                            ?>

                            <form method="post">
                          </tr>

                            <!-- Fim do for -->
                            <?php } ?>

                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td align="right">Total do mês:</td>
                              <td>R$ <?=$total?></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td align="right">Total pago:</td>
                              <td>R$ <?=$totalPago?></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td align="right">Total em aberto:</td>
                              <td>R$ <?=$totalAberto?></td>
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











<!-- ANTIGO ANTIGO ANTIGO ANTIGO -->




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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
        <script>
          function extraiMes() {
            nome = window.location.search.substring(1);
            posicao = nome.search("mes");
            mes = nome.substring(posicao);
            valor_mes = mes.substring(mes.search("=")+1);
            return valor_mes;
          }

          $(document).ready(function (){
            var mes = extraiMes();
            $('html, body').animate({
                scrollTop: $("#"+mes).offset().top
            }, 50);
          });
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
