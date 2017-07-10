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
            </div>
            <!-- /.row -->

            <?php if(array_key_exists("status", $_GET) && $_GET['status']=='pago'){?>
                <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Confirmação de pagamento realizada com <strong>Successo!</strong>
              </div>
            <?php }  ?>

            <div class="row">
<!-- INICIO PAINEL -->
                <!-- <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Compras realizadas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">


                                    <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th>Id da compra</th>
                                              <th>Descrição</th>
                                              <th>Valor total</th>
                                              <th>Qtd parcelas</th>
                                              <th>Parcela</th>
                                              <th>Vencimento</th>
                                              <th>Valor</th>
                                              <th>Pago</th>

                                          </tr>
                                       </thead>



                                      </table>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
<!-- FIM PAINEL -->
<div class="col-md-12">

<div class="panel-group" id="accordion1">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion1" href="#collapse1">Janeiro</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">

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
              $array_compras = listaComprasEParcelasPorMes($conexao, 1);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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

<div class="panel-group" id="accordion2">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion2" href="#collapse2">Fevereiro</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse in">

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
            $totalPago=0;              $array_compras = listaComprasEParcelasPorMes($conexao, 2);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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

<div class="panel-group" id="accordion3">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion3" href="#collapse3">Março</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse in">

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
            $totalPago=0;              $array_compras = listaComprasEParcelasPorMes($conexao, 3);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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

<div class="panel-group" id="accordion4">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion4" href="#collapse4">Abril</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse in">

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
            $totalPago=0;              $array_compras = listaComprasEParcelasPorMes($conexao, 4);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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

<div class="panel-group" id="accordion3">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion5" href="#collapse5">Maio</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse in">

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
              $array_compras = listaComprasEParcelasPorMes($conexao, 5);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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

<div class="panel-group" id="accordion6">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion6" href="#collapse6">Junho</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse in">

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
            $array_compras = listaComprasEParcelasPorMes($conexao, 6);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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


<div class="panel-group" id="accordion7">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion7" href="#collapse7">Julho</a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse in">

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
              $array_compras = listaComprasEParcelasPorMes($conexao, 7);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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


<div class="panel-group" id="accordion8">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion8" href="#collapse8">Agosto</a>
        </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse in">

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
              $array_compras = listaComprasEParcelasPorMes($conexao, 8);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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


<div class="panel-group" id="accordion9">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion9" href="#collapse9">Setembro</a>
        </h4>
      </div>
      <div id="collapse9" class="panel-collapse collapse in">

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
              $array_compras = listaComprasEParcelasPorMes($conexao, 9);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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


<div class="panel-group" id="accordion10">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion10" href="#collapse10">Outubro</a>
        </h4>
      </div>
      <div id="collapse10" class="panel-collapse collapse in">

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
              $array_compras = listaComprasEParcelasPorMes($conexao, 10);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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


<div class="panel-group" id="accordion11">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion11" href="#collapse11">Novembro</a>
        </h4>
      </div>
      <div id="collapse11" class="panel-collapse collapse in">

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
              $array_compras = listaComprasEParcelasPorMes($conexao, 11);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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


<div class="panel-group" id="accordion12">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion12" href="#collapse12">Dezembro</a>
        </h4>
      </div>
      <div id="collapse12" class="panel-collapse collapse in">

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
              $array_compras = listaComprasEParcelasPorMes($conexao, 12);
              foreach($array_compras as $compra) {
              ?>
                    <tr>
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
                          echo '<a href="aPagar-confirma.php?id='.$compra['id_parcela']. ' "> Informar pgto <i class="fa fa-check" aria-hidden="true"></i></a>';
                        } else {
                          echo '<a href="aPagar-desfaz.php?id='.$compra['id_parcela']. ' "> Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a>';                                                }
                         ?>
                       </td>
                       <?php if ($compra['pago'] == 'n') {
                         $totalAberto+=$compra['valor_parcela'];
                       } else {
                         $totalPago+=$compra['valor_parcela'];
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
