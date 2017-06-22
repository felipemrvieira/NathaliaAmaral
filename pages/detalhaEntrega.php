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
    
    <?php if(array_key_exists("status", $_GET) && $_GET['status']=='ok'){    ?>
        <div class="alert alert-success fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Alteração cadastrada com <strong>Successo!</strong>
        </div>
    <?php } ?>
    
    <?php if(array_key_exists("id", $_GET) && $_GET['id']<>''){    ?>

    <ul style="list-style-image: url('img/chave-li.png');">
                        
                        <?php
                            $array_atividades = detalhaAtividades($conexao, $_GET['id']);
                            foreach($array_atividades as $atividade) {
                                
                            //$myDateTime= DateTime::createFromFormat('Y-m-d', $atividade['data_entrega']);
                            //$saida_formatada = $myDateTime->format('d-m-Y');
                            
                                
                        
                        ?>
                        
                        
                            <li>
<!--                                <a href="detalhaEntrega.php?id=">-->
                                <div>
                                    <p>
                                    <strong><?=$atividade['nome_cliente']?></strong>
                                    <span class="pull-right text-muted"><?=$atividade['percentual']?>% do prazo</span>
                                    <div class="">Manequim: <?=$atividade['manequim']?></div>
                                    <br>
                                    <div class="">Produto: <?=$atividade['nome_prod_serv']?></div>
                                    <div class="">Valor Pago: R$ <?=$atividade['valor']?></div>
                                    <br>
                                    <!--<div class="">Data de compra: //=$atividade['data_venda']?></div>-->
                                    <div class="">Data de compra: <?=$atividade['data_venda']?></div>
                                    <div class="">Data de entrega: <?=$atividade['data_entrega']?></div>
                                    <div class="">Dias restantes: <?=$atividade['restante']?></div>
                                    <br>


                                    <form action="entregar.php?id=<?=$atividade['id_venda']?>" method="post">
                                        <div class="form-group">
                                            <label>Produto entregue:</label>
                                            <label class="radio-inline">
                                               <input type="radio" name="entregue" id="sim" value="sim" <?php if($atividade['entregue'] == 'sim'){echo 'checked';}?>>Sim
                                            </label>
                                            <label class="radio-inline">
                                               <input type="radio" name="entregue" id="nao" value="nao" <?php if($atividade['entregue'] == 'nao'){echo 'checked';}?>>Não
                                            </label>
                                        </div>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$atividade['percentual']?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$atividade['percentual']?>%">
                                            <span class="sr-only">90% Complete</span>
                                        </div>

                                    </div>
                                </div>
<!--                                </a>-->
                            </li>
                <hr>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-outline btn-info btn-block">Entregar</button>
                                            </div>
                                        </form>
                      
                        <?php } ?>
    <br>
    <div>
        <a href="listaEntregas.php">Voltar!</a>
    </div>
                    
    </ul>
 <?php }?>

    
    
    
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
