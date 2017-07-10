<?php

    include("DAO/conexao.php");
    include("DAO/estoqueDAO.php");

include('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Consultar Serviço</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='excluido'){?>
                        <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Serviço excluído com <strong>Successo!</strong>
                      </div>
                    <?php }  ?>

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok'){?>
                        <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Serviço alterado com <strong>Successo!</strong>
                      </div>
                    <?php }  ?>



                    <!-- <div class="panel panel-default">
                        <div class="panel-heading">
                            Filtragem de serviços
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">

                                        <div class="form-group">

                                            <input class="form-control" placeholder="Insira um dado aqui">
                                        </div>

                                        <button type="submit" class="btn btn-default">Pesquisar</button>
                                        <button type="reset" class="btn btn-default">Limpar</button>

                                    </form>
                                      </div>
                                </div>
                                </div>
                                </div>

                <br>


                  <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo">Filtrar</button>
                  <br>
                  <br> -->

                    <div id="demo" class="collapse">

                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">

                                        <div class="form-group">

                                            <input class="form-control" placeholder="Insira um dado aqui">
                                        </div>

                                        <button type="submit" class="btn btn-default">Pesquisar</button>
                                        <button type="reset" class="btn btn-default">Limpar</button>

                                    </form>
                                      </div>
                                </div>

                  </div>
                    <br>
                    <br>



            <form method="post">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome do serviço</th>
                        <th>Valor</th>
                       <!-- <th>Disponibilidade</th>-->
                    </tr>
                 </thead>

                                <?php
                $array_servicos = listaservico($conexao);
                foreach($array_servicos as $servico) {
                ?>

                <tr>

                    <td><?= $servico['id_servico'] ?></td>
                    <td><?= $servico['nome_servico'] ?></td>
                    <td>R$ <?= $servico['valor_servico'] ?></td>
                   <!-- <td><label><?php
                                if($servico['disp_servico']=='s'){
                                    echo 'Sim';
                                }else{
                                    echo 'Não';
                                };?>
                        </label></td>-->
                    <td>
                       <button type="submit" formaction="editaServico.php?id=<?= $servico['id_servico'] ?>" class="btn btn-default btn-block">Alterar informações</button>

                    </td>
                    <!--<td>
                        <button type="submit" formaction="encerraServico.php?id=<?= $servico['id_servico'] ?>&disp=<?= $servico['disp_servico'] ?>" class="btn btn-warning btn-block"><?php
                            if($servico['disp_servico']=='s'){echo 'Encerrar disponibilidade';}
                            else{echo 'Tornar disponível';}
                            ?></button>
                    </td>-->
                    <td>
                        <button type="submit" formaction="excluiServico.php?id=<?= $servico['id_servico'] ?>" class="btn btn-danger btn-block">Excluir serviço</button>
                    </td>
                </tr>
                <?php
            }?>
            </table>
<button type="submit" class="btn btn-primary btn-block" formaction="form.services.php">Cadastrar novo serviço</button>
                <br>
        </form>
                        </div>
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
