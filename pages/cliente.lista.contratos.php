<?php
include("DAO/conexao.php");
include("DAO/operacoesDAO.php");
include("DAO/financeiroDAO.php");
include('header.php');
if(true){
    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
    }

    if(isset($_POST['bol'])){
        $boleto = $_POST['bol'];
    }else{
        $boleto = 'denario';
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

?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                  <h1 class="page-header">Contratos de Clientes</h1>
                </div><!-- /.col-lg-12 -->
            </div><!-- /.row -->

            <div class="row">
                <div class="col-lg-12">
                  <?php if(array_key_exists("status", $_GET) && $_GET['status']=='excluido'){?>
                    <div class="alert alert-success fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Cliente excluído com <strong>Successo!</strong>
                    </div>
                  <?php }  ?>
                </div><!-- /.col12 -->



                <table class="table table-striped">
                  <thead>
                      <tr>
                          <th>Id venda</th>
                          <th>Cliente</th>
                          <th>Data venda</th>
                          <th>Produto/Serviço</th>
                          <th>Valor total</th>

                      </tr>
                   </thead>

            <?php
                $array_vendas = listaClientesEContratos($debito, $credito, $boleto, $cheque, $especie, $conexao);
                foreach($array_vendas as $venda) {
                ?>
                    <tr>

                        <td><?= $venda['id_venda'] ?></td>
                        <td><?= $venda['nome_cliente'] ?></td>
                        <td><?= $venda['data_venda'] ?></td>
                        <td><?= $venda['nome_servico'] ?></td>
                        <td>R$ <?= $venda['total'] ?></td>
                        

                    </tr>

                    <!-- Fim do for -->
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>


                    </tr>

                  </table>

                <button class="btn btn-default" onclick="imprime()">Imprimir</button>

              </div><!-- /.row -->

        </div><!-- /#page-wrapper -->

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
