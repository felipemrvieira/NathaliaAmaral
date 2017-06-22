<?php

    include("DAO/conexao.php");
    include("DAO/operacoesDAO.php");

include('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Consultar Cliente</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

  <?php if(array_key_exists("status", $_GET) && $_GET['status']=='excluido'){?>
    <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Cliente excluído com <strong>Successo!</strong>
  </div>
<?php }  ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Filtragem de clientes
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="clienteBusca.php" method="post">

                                        <div class="form-group">

                                            <input class="form-control" placeholder="Insira um dado aqui" name="nome">
                                        </div>

                                        <button type="submit" class="btn btn-default">Pesquisar</button>
                                        <button type="reset" class="btn btn-default">Limpar</button>

                                    </form>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                  <a href="cliente.agenda.php">Agenda de Contatos</a>
                                </div>
                                <br>
                                <div class="col-md-12">
                                  <a href="#"><br></a>
                                </div>


                             <form method="post">
                                <?php
                                    if (isset($_GET['nome'])){
                                        $nome = $_GET['nome'];
                                    }else{
                                        $nome = "";
                                    }

                                    $array_clientes = listacliente($conexao, $nome);
                                    foreach($array_clientes as $cliente) {
                                        $caminho = 'uploads/'.$cliente['endereco_foto'];
                                ?>
                <div class="col-lg-4">
                <div class="panel panel-default" >
                    <div class="panel-heading"><strong><?=$cliente['id_cliente'] ?> <?=$cliente['nome_cliente'] ?></strong></div>
                      <div class="panel-body">
                          <div class="img-avatar-container">
                              <img  src="<?=$caminho?>" class="img-responsive" width="100%"><br>
                          </div>
                          <hr>
                          <strong>Email:</strong> <?= $cliente['email_cliente'] ?><br>
                          <strong>Telefone:</strong> <?= $cliente['telefone_cliente'] ?><br>
                           <hr>

                                <button type="submit" formaction="visualizarcliente.php?id=<?= $cliente['id_cliente']?>" class="btn btn-default btn-block">Visualizar</button>



                        </div>
                    </div>
                    </div>




                <?php
            }?>

                        </form>


                        </div>
                    </div>



        <!-- /#page-wrapper -->

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
