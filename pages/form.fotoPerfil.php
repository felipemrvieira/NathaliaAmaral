<?php
include("header.php");
?>

        <div id="page-wrapper">
            <div class="row">
                                
                <div class="col-lg-12">
                                        
                    <h1 class="page-header">Alterar Cliente</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    
                 <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok' && array_key_exists("idCliente", $_GET) && $_GET['idCliente']<>''){?>
                            <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            Cliente cadastrado com sucesso! <strong>Id: <?php echo $_GET['idCliente'] ?></strong>
                          </div>
                        <?php }  ?>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Preencha o formulário abaixo
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form enctype="multipart/form-data" role="form" action="alteraFotoCliente.php" method="post">
                                       
									   
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                               <input type="hidden" name="id" value="<?php  echo $_GET['id']?>" required>
                                               
                                                <label>Selecione a nova imagem</label>
                                                <input type="file" name="foto">
                                            </div>
                                        </div>
                                        
                                       
                                    <div class="col-lg-12">    
                                        <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div></div>
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
