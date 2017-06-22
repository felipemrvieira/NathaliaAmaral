<?php
//seta o horário padrao para esse script
date_default_timezone_set("Brazil/East");

    include("DAO/conexao.php");
    include("DAO/financeiroDAO.php");
    include('header.php');

if(isset($_POST['dataInicial'])){
    $dataInicial = $_POST['dataInicial'];
    $dataFinal = $_POST['dataFinal'];
    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
    }

    if(isset($_POST['bol'])){
        $boleto = $_POST['bol'];
    }else{
        $boleto = 'denario';
    }

    if(isset($_POST['recebido'])){
        $recebido = $_POST['recebido'];
    }else{
        $recebido = 'n';
    }

    if(isset($_POST['esp'])){
       $especie = $_POST['esp'];
    }else{
        $especie = 'denario';
    }

    if(isset($_POST['deb'])){
        $debito = $_POST['deb'];
    }else{
        $debito = 'denario';
    }

    if(isset($_POST['cre'])){
        $credito = $_POST['cre'];
    }else{
        $credito = 'denario';
    }

    if(isset($_POST['che'])){
        $cheque = $_POST['che'];
    }else{
        $cheque = 'denario';
    }
    if($boleto == 'denario' && $especie == 'denario' && $debito == 'denario' && $credito == 'denario' && $cheque == 'denario'){
        $boleto = 'boleto';
        $especie = 'especie';
        $debito = 'debito';
        $credito = 'credito';
        $cheque = 'cheque';
    }
}

$_SESSION['total'] = 0;
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><img width="40%" src="img/Marca%20sem%20fundo.png"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Filtro
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form action="aReceber.analitico.php" method="post" role="form">
                                    <div class="col-lg-12">

                                        <div class="form-group col-lg-6">
                                           <label>Nome do Cliente</label>
                                            <input name="nome" type="text" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3">
                                           <label>Data Inicial</label>
                                            <input name="dataInicial" required type="date" value="<?php echo date('Y-m-d', strtotime( '- 1 day')); ?>" class="form-control">
                                        </div>

                                        <div class="form-group col-lg-3">
                                           <label>Data Final</label>
                                            <input name="dataFinal" required type="date" value="<?php echo date('Y-m-d', strtotime( '+ 1 month')); ?>" class="form-control">
                                        </div>
                                        <div class="form-group col-lg-12">
                                           <label class="checkbox-inline">
                                              <input name="cre" type="checkbox" value="credito">Crédito
                                            </label>
                                            <label class="checkbox-inline">
                                              <input name="deb" type="checkbox" value="debito">Débito
                                            </label>
                                            <label class="checkbox-inline">
                                              <input name="esp" type="checkbox" value="especie">Espécie
                                            </label>
                                            <label class="checkbox-inline">
                                              <input name="che" type="checkbox" value="cheque">Cheque
                                            </label>
                                            <label class="checkbox-inline">
                                              <input name="bol" type="checkbox" value="boleto">Boleto
                                            </label>
                                        </div>
                                        <div class="form-group col-lg-12">
                                           <label class="checkbox-inline">
                                              <input name="recebido" type="checkbox" value="s">Parcela Recebida
                                            </label>

                                        </div>
								        <div class="form-group col-lg-12">
                                            <button type="submit" class="btn btn-default">Pesquisar</button>
                                            <button type="reset" class="btn btn-default">Limpar</button>
                                        </div>

                                    </div>
                                </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Contas Recebidas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">


                                    <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th>Venda</th>
                                              <th>Data da venda</th>
                                              <th>Cliente</th>

                                              <th>Forma de Pagamento</th>

                                              <th>Parcela</th>
                                              <th>Vencimento</th>
                                              <th>Valor da parcela</th>
                                              <th>Recebido</th>
                                              <!-- <th>Modificado dia</th> -->


                                          </tr>
                                       </thead>

                                <?php
                                        $total=0;
                                        if(isset($_POST['nome'])){
                                          $array_vendas = buscaContasAReceberAnalitico($conexao, $nome, $recebido, $dataInicial, $dataFinal, $debito, $credito, $boleto, $cheque, $especie);
                                          foreach($array_vendas as $venda) {
                                          ?>
                                        <tr>

                                            <td><?= $venda['id_venda'] ?></td>
                                            <td><?= $venda['data_venda'] ?></td>
                                            <td><?= $venda['nome_cliente'] ?></td>

                                            <td><?= $venda['forma_pgto'] ?></td>

                                            <td><?= $venda['parcela'] ?></td>
                                            <td><?= $venda['vencimento'] ?></td>
                                            <td>R$ <?= $venda['valor_parcela'] ?></td>
                                            <td><?= $venda['recebido'] ?></td>

                                            <?php $total += $venda['valor_parcela']?>





                                        </tr>

                                        <!-- Fim do for -->
                                        <?php }} ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td></td>
                                            <td></td>
                                            <td align="right">Total:</td>
                                            <td>R$ <?=$total?></td>
                                            <td></td>
                                        </tr>

            </table>
                               <button class="btn btn-default" onclick="imprime()">Imprimir</button>


                                 </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
</div>




        </div>

    <!--/div>
    <!-- /#wrapper -->
    <script>
function imprime() {
    window.print();
}
</script>

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
