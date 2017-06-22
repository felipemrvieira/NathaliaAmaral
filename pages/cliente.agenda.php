<?php

    include("DAO/conexao.php");
    include("DAO/operacoesDAO.php");

include('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                  <h1 class="page-header">Agenda de Clientes</h1>
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
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Telefone</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $nome="";
                      $array_clientes = listaClienteEmOrdem($conexao, $nome);
                      foreach($array_clientes as $cliente) {
                    ?>
                    <tr>
                      <td><?= $cliente['id_cliente'] ?></td>
                      <td><?= $cliente['nome_cliente'] ?></td>
                      <td><?= $cliente['telefone_cliente'] ?></td>
                      <td><?= $cliente['email_cliente'] ?></td>
                    </tr>
                    <?php
                      };?>

                  </tbody>
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
