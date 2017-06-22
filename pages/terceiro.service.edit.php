<?php

include("DAO/conexao.php");
include("DAO/operacoesDAO.php");
include("header.php");
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Serviço Terceirizado</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok'){?>
    <div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    Cadastrado com <strong>Successo!</strong>
  </div>
<?php }  ?>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Preencha o formulário abaixo
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="terceiro.servico.Cadastra.php" method="post" role="form">
                                    <?php
                $array_servicos_terceiros = buscaServicosTerceiros($conexao, $_GET['id']);
                foreach($array_servicos_terceiros as $servico) {
                    $myDateTime= DateTime::createFromFormat('Y-m-d', $servico['data_saida']);
                    $saida_formatada = $myDateTime->format('d-m-Y');
                    
                    $myDateTime= DateTime::createFromFormat('Y-m-d', $servico['data_retorno']);
                    $retorno_formatada = $myDateTime->format('d-m-Y');
                ?>   
                                        
                                        <div class="form-group col-lg-12">
                                            <label>Prestador:</label>
                                             <select name="terceiro" class="form-control">
                                        <?php
                                            $array_terceiros = listaTerceiros($conexao);
                                            foreach($array_terceiros as $terceiro) {
                                            ?>
                                                <option value="<?= $terceiro['id_terceiro'] ?>"><?= $terceiro['id_terceiro'] ?> - <?= $terceiro['nome_terceiro'] ?></option>

                                            <?php
                                            }?>
                                        </select>
										</div>
                                        
                                        <div class="form-group col-lg-6">
                                           <label>Data de saída</label>
                                            <input name="data_saida" required type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                                        </div>
                                        
                                        <div class="form-group col-lg-6">
                                           <label>Data de retorno</label>
                                            <input name="data_retorno" required type="date" class="form-control">
                                        </div>
                                          
                                        <div class="form-group col-lg-6">
                                           <div class="checkbox">
                                              <label><input type="checkbox" name="entregue" value="">Entregue</label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-lg-12">
                                           <label>Descrição do Serviço</label>
                                            
                                            <textarea class="form-control" rows="7"  name="descricao" value="<?= $servico['descricao_servico_terceiro'] ?>"></textarea>
                                        </div>
                                        
                                        <div class="form-group col-lg-12">
                                            <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                                        </div>
                                       
								<?php }?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>

    
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
