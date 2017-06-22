<?php
    include("DAO/conexao.php");
    include("DAO/financeiroDAO.php");

include('header.php');
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
                            Resumo diário
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">


                                    <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Data da venda</th>
                        <th>Item da venda</th>
                        <th>Forma de Pagamento</th>
                        <th>Parcelas</th>
                        <th>Valor</th>

                    </tr>
                 </thead>

                                <?php
                $array_vendas = listaVendas($conexao);
                foreach($array_vendas as $venda) {
                ?>
                                        <tr>

                                            <td><?= $venda['id_venda'] ?></td>
                                            <td><?= $venda['nome_cliente'] ?></td>
                                            <td><?= $venda['data_venda'] ?></td>
                                            <td><?= $venda['nome_servico'] ?></td>
                                            <td><?= $venda['forma_pgto'] ?></td>
                                            <td><?= $venda['qtd_parcelas'] ?></td>
                                            <td>R$ <?= $venda['total'] ?></td>
                                            <?php $_SESSION['total']  += $venda['total'] ?>

                                        </tr>

                                        <!-- Fim do for -->
                                        <?php } ?>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td align="right">Total do dia:</td>
                                            <td>R$ <?=$_SESSION['total']?></td>
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
