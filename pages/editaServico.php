<?php
    include('header.php');
    include("DAO/conexao.php");
    include("DAO/estoqueDAO.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Alterar informações</h1>
                </div>
                <!-- /.col-lg-12 -->
                
     
                                
           <?php if(array_key_exists("id", $_GET)) {
                $id = $_GET['id'];
                                    
                $array_servicos = detalhaServico($conexao, $id);
                foreach($array_servicos as $servico) {
                    
                ?>
                <div class="col-lg-12">
                    
                    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok'){?>
                        <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Serviço alterado com <strong>Successo!</strong>
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
                            Preencha com as novas informações do produto <?=$servico['id_prod_serv'] ?>
                        </div>
                        <div class="panel-body">
                           
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="editarServico.php?id=<?=$servico['id_prod_serv'] ?>" method="post">
                                       
                                        <div class="form-group">
                                            <label>Novo nome:</label>
                                            <input type="text" name="nome_servico" class="form-control" value="<?=$servico['nome_servico'] ?>">
										</div>
																			
										<div class="form-group">
											<label>Novo valor: </label>
											<input type="number" min="0.01" step="0.01" name="valor_servico" class="form-control" value="<?=$servico['valor_servico'] ?>">
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success btn-sm">Alterar</button>
                                       
								
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