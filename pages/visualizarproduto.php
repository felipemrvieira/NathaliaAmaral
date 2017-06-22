<?php
    include('header.php');
    include("DAO/conexao.php");
    include("DAO/estoqueDAO.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Visualizar Produto</h1>
                </div>
                <!-- /.col-lg-12 -->
     
                                
           <?php if(array_key_exists("id", $_GET)) {
                
                                        
                $array_produtos = detalhaProduto($conexao, $_GET['id']);
                foreach($array_produtos as $produto) {?>
                
                <div class="col-lg-12">
                <div class="panel panel-default" >
                    <div class="panel-heading"><?=$produto['id_produto'] ?> <strong><?=$produto['nome_produto'] ?></strong></div>
                      <div class="panel-body">
                          <strong>Valor do produto:</strong> <?= $produto['valor_produto'] ?><br>
                          <strong>Quantidade disponível:</strong> <?= $produto['qtd'] ?><br>
                                                  
                          <form method="post">
                          
                                <button type="submit" formaction="editaCliente.php?id=<?=$cliente['id_cliente']?>" class="btn btn-warning btn">Editar Cliente</button>
                                <button type="submit" formaction="excluiCliente.php?id=<?=$cliente['id_cliente']?>" class="btn btn-danger btn">Excluir Cliente</button>
                            
                            </form>
                                
                           
                        </div>
                    </div>
                    </div>
                <?php }  ?>
                
            <?php }  ?>
                
                
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