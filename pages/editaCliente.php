<?php
    include('header.php');
    include("DAO/conexao.php");
    include("DAO/operacoesDAO.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Cliente</h1>
                </div>
                <!-- /.col-lg-12 -->



           <?php if(array_key_exists("id", $_GET)) {


                $array_clientes = detalhaCliente($conexao, $_GET['id']);
                foreach($array_clientes as $cliente) {
                    $caminho = 'uploads/'.$cliente['endereco_foto'];
                ?>
                <div class="col-lg-12">

                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok'){?>
                        <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Cliente alterado com <strong>Successo!</strong>
                      </div>
                    <?php }  ?>


                    </div>
                <?php }  ?>

            <?php }  ?>


            </div>

             <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <strong><?=$cliente['nome_cliente'] ?><?=$cliente['id_cliente'] ?></strong>
                        </div>
                        <div class="panel-body">

                                    <form role="form" action="editarCliente.php?id=<?=$cliente['id_cliente'] ?>" method="post">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                       <img src="<?=$caminho?>" width="25%"><br><br>
                                    </div>
                                       <hr>

                                        <div class="col-lg-12">
                                            <div class="form-group ">
                                                <label>Nome:</label>
                                                <input class="form-control" value="<?= $cliente['nome_cliente'] ?>" name="nome" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>CPF:</label>
                                                <input type="number" class="form-control" value="<?= $cliente['cpf'] ?>" name="cpf" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>RG:</label>
                                                <input type="number" class="form-control" value="<?= $cliente['rg'] ?>" name="rg" required>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Sexo:</label>
                                                <label class="radio-inline">

                                                   <input type="radio" name="sexo" id="masc" value="masculino" <?php if($cliente['sexo'] == 'masculino') echo'checked' ?>>Masculino
                                                </label>
                                                <label class="radio-inline">
                                                   <input type="radio" name="sexo" id="fem" value="feminino" <?php if($cliente['sexo'] == 'feminino') echo'checked' ?>>Feminino
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                           <label> Data de nascimento:</label>
                                                <div class="row">
                                                    <div class='col-sm-6'>
                                                        <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker2'>
                                                                <input type='date' value="<?= $cliente['data_nascimento'] ?>" class="form-control" name="data_nascimento"/>

                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(function () {
                                                            $('#datetimepicker2').datetimepicker({
                                                                locale: 'ru'
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>E-mail:</label>
                                                <input class="form-control" value="<?= $cliente['email_cliente'] ?>" name="email">
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Telefone:</label>
                                                <input class="form-control" value="<?= $cliente['telefone_cliente'] ?>" name="telefone">
                                            </div>
                                        </div>

                                        <!-- <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Manequim:</label>
                                                <input class="form-control" value="<?= $cliente['manequim'] ?>" name="manequim">
                                            </div>
                                        </div> -->

                                        <!--<div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Trocar imagem</label>
                                                <input type="file" name="userfile">
                                            </div>
                                        </div>-->

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Observações:</label>
                                                <input type="text" class="form-control" rows="5" value="<?= $cliente['obs'] ?>" name="obs"></input>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <a href="search.client.php" class="btn btn-danger btn">Voltar</a>
                                            <button type="submit" class="btn btn-success btn">Salvar</button>
                                        </div>
                                    </div> <!--row-->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div></div>
            </div>

            </div>




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
