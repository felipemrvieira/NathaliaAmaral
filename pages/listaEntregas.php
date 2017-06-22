<?php
    
   include("DAO/conexao.php");
   include('header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><img width="40%" src="img/Marca%20sem%20fundo.png"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>


<div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Em aberto</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        
          
          
          <div class="panel-body">
        
                    <ul style="list-style-image: url('img/chave-li.png');">
                        
                        <?php
                            $array_atividades = listaAtividades($conexao);
                            foreach($array_atividades as $atividade) {
                        ?>
                        
                        
                            <li>
                                <a href="detalhaEntrega.php?id=<?=$atividade['id_venda']?>">
                                    <div>
                                        <p>
                                            <strong><?=$atividade['nome_cliente']?></strong>
                                            <span class="pull-right text-muted"><?=$atividade['percentual']?>% do prazo</span>
                                            <div class="">Produto: <?=$atividade['nome_prod_serv']?></div>
                                            <div class="">Data de entrega: <?=$atividade['data_entrega']?></div>
                                            <div class="">Dias restantes: <?=$atividade['restante']?></div>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$atividade['percentual']?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$atividade['percentual']?>%">
                                                <span class="sr-only">90% Complete</span>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </li>
                <hr>
                      
                        <?php } ?>
                    </ul>
 
                
                  
            
          </div>

          
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Entregues</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        
          
          
          <div class="panel-body">
        
                    <ul style="list-style-image: url('img/chave-li.png');">
                        
                        <?php
                            $array_atividades = listaAtividadesConclusas($conexao);
                            foreach($array_atividades as $atividade) {
                        ?>
                        
                        
                            <li>
                                <a href="detalhaEntrega.php?id=<?=$atividade['id_venda']?>">
                                    <div>
                                        <p>
                                            <strong><?=$atividade['nome_cliente']?></strong>
                                            <span class="pull-right text-muted"><?=$atividade['percentual']?>% do prazo</span>
                                            <div class="">Produto: <?=$atividade['nome_prod_serv']?></div>
                                            <div class="">Data de entrega: <?=$atividade['data_entrega']?></div>
                                            <div class="">Dias restantes: <?=$atividade['restante']?></div>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$atividade['percentual']?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$atividade['percentual']?>%">
                                                <span class="sr-only">90% Complete</span>
                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </li>
                <hr>
                      
                        <?php } ?>
                    </ul>
 
                
                  
            
          </div>
          
          
      </div>
    </div>
    
  </div> 
   

<!--    <script>
        function preenche(parametro){
            document.formvenda.valor.value = parametro;
        }
    </script>-->


         
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
