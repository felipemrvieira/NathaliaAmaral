<?php
date_default_timezone_set('America/Sao_Paulo');

include("header.php");
include("DAO/operacoesDAO.php");
include("DAO/conexao.php");

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
                  <?php if(array_key_exists("email", $_GET) && $_GET['email']=='ok'){?>
                    <div class="alert alert-success fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Email enviado com <strong>Successo!</strong>
                    </div>
                  <?php }  ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Aniversariantes do dia</strong>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                           <form method="post">
                                <?php
                $array_clientes = listaAniversariantesDia($conexao);
                foreach($array_clientes as $cliente) {
                    $caminho = 'uploads/'.$cliente['endereco_foto'];
                ?>
                <div class="col-lg-4">
                  <div class="panel panel-default" >
                    <div class="panel-heading"><strong><?=$cliente['id_cliente'] ?> <?=$cliente['nome_cliente'] ?></strong></div>
                      <div class="panel-body">

                          <img src="<?=$caminho?>" width="100%"><br>
                          <strong>Nascimento:</strong> <?= date("d-m-Y", strtotime($cliente['data_nascimento'])) ?><br>
                          <strong>Email:</strong> <?= $cliente['email_cliente'] ?><br>
                          <strong>Telefone:</strong> <?= $cliente['telefone_cliente'] ?><br><br>

                          <?php
                          if ($cliente['parabenizado'] == 's') {
                            echo '<button disabled type="submit" class="btn btn-info btn-block">Email enviado!</button>';
                          }else{
                            echo '<button type="submit" formaction="aniversariantes.parabenizar.php?id=' .$cliente['id_cliente'].' " class="btn btn-info btn-block">Parebenizar</button>';
                          }
                          ?>

                        </div>
                    </div>
                  </div>




                <?php
            }?>

                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Aniversariantes do Mês</strong>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                           <form method="post">
                                <?php
                $array_clientes = listaAniversariantes($conexao);
                foreach($array_clientes as $cliente) {
                     $caminho = 'uploads/'.$cliente['endereco_foto'];
                ?>
                <div class="col-lg-4">
                <div class="panel panel-default" >
                    <div class="panel-heading"><strong><?=$cliente['id_cliente'] ?> <?=$cliente['nome_cliente'] ?></strong></div>
                      <div class="panel-body">
                          <img src="<?=$caminho?>" width="80%"><br>
                          <strong>Nascimento:</strong> <?= date("d-m-Y", strtotime($cliente['data_nascimento'])) ?><br>
                          <strong>Email:</strong> <?= $cliente['email_cliente'] ?><br>
                          <strong>Telefone:</strong> <?= $cliente['telefone_cliente'] ?><br><br>

                          <?php
                          if ($cliente['oferta_mes_aniversario'] == 's') {
                            echo '<button disabled type="submit" class="btn btn-info btn-block">Desconto enviado!</button>';
                          }else{
                            echo '<button type="submit" formaction="aniversariantes.enviarDesconto.php?id=' .$cliente['id_cliente'].' " class="btn btn-info btn-block">Enviar desconto!</button>';
                          }
                          ?>



                        </div>
                    </div>
                    </div>




                <?php
            }?>

                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

                                <!--div class="col-lg-6">
                                <!--div class="col-lg-6">


                                    <!--h1>Input Groups</h1>
                                    <form role="form">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-eur"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Font Awesome Icon">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" class="form-control">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div-->
                                <!-- /.col-lg-6 (nested) -->
                            <!--/div>
                            <!-- /.row (nested) -->
                        <!--/div>
                        <!-- /.panel-body -->
                    <!--/div>
                    <!-- /.panel -->
                <!--/div>
                <!-- /.col-lg-12 -->
            <!--/div>
            <!-- /.row -->
        <!--/div>
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
