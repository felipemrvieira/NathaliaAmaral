<?php

    include("DAO/conexao.php");
    include("DAO/operacoesDAO.php");

include('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">Consultar Terceiro</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='excluido'){?>
                        <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Terceiro excluído com <strong>Successo!</strong>
                      </div>
                    <?php }  ?>

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok'){?>
                        <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Terceiro alterado com <strong>Successo!</strong>
                      </div>
                    <?php }  ?>



                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Filtragem de Terceiros
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




            <form method="post">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nome do Prestador</th>
                        <th>CPF</th>
                        <th>CNPJ</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Número</th>
                        <th>Dados Bancários</th>
                    </tr>
                 </thead>

                                <?php
                $array_terceiros = listaTerceiros($conexao);
                foreach($array_terceiros as $terceiro) {
                ?>

                <tr class="terceiros">

                    <td><label><?= $terceiro['id_terceiro'] ?></label></td>
                    <td><label><?= $terceiro['nome_terceiro'] ?></label></td>
                    <td><label><?= $terceiro['cpf_terceiro'] ?></label></td>
                    <td><label><?= $terceiro['cnpj_terceiro'] ?></label></td>
                    <td><label><?= $terceiro['telefone_terceiro'] ?></label></td>
                    <td><label><?= $terceiro['email_terceiro'] ?></label></td>
                    <td><label><?= $terceiro['rua_terceiro'] ?></label></td>
                    <td><label><?= $terceiro['bairro_terceiro'] ?></label></td>
                    <td><label><?= $terceiro['numero_terceiro'] ?></label></td>
                    <td><label><?= $terceiro['dados_bancarios'] ?></label></td>

                    <td><button formaction="excluiTerceiro.php?id=<?= $terceiro['id_terceiro'] ?>" class="btn btn-danger">Excluir</button></td>


                </tr>
                <?php
            }?>
            </table>
<button type="submit" class="btn btn-primary btn-block" formaction="terceiro.form.php">Cadastrar novo terceiro</button>
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
