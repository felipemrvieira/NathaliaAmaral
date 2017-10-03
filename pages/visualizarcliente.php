<?php
  date_default_timezone_set("Brazil/East");
  include('header.php');
  include("DAO/conexao.php");
  include("DAO/operacoesDAO.php");
  include("DAO/financeiroDAO.php");

  if(true){
      

      if(isset($_POST['bol'])){
          $boleto = $_POST['bol'];
      }else{
          $boleto = 'denario';
      }

      if(isset($_POST['esp'])){
         $especie = $_POST['esp'];
      }else{
          $especie = 'denario';
      }

      if(isset($_POST['deb'])){
          $debito = $_POST['deb'];
      }else{
          $debito = 'denario';
      }

      if(isset($_POST['cre'])){
          $credito = $_POST['cre'];
      }else{
          $credito = 'denario';
      }

      if(isset($_POST['che'])){
          $cheque = $_POST['che'];
      }else{
          $cheque = 'denario';
      }
      if($boleto == 'denario' && $especie == 'denario' && $debito == 'denario' && $credito == 'denario' && $cheque == 'denario'){
          $boleto = 'boleto';
          $especie = 'especie';
          $debito = 'debito';
          $credito = 'credito';
          $cheque = 'cheque';
      }
  }


?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Visualizar Cliente</h1>
                    <?php if(array_key_exists("parcela", $_GET) && $_GET['parcela']=='alterada'){?>
                        <div class="alert alert-success fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        Parcela alterada com <strong>Successo!</strong>
                      </div>
                    <?php }  ?>
                </div>
                <!-- /.col-lg-12 -->


           <?php if(array_key_exists("id", $_GET)) {


                $array_clientes = detalhaCliente($conexao, $_GET['id']);
                foreach($array_clientes as $cliente) {
                    $caminho = 'uploads/'.$cliente['endereco_foto'];
                ?>
                <div class="col-lg-12">
                <div class="panel panel-default" >
                    <div class="panel-heading"><strong>id: <?=$cliente['id_cliente'] ?> <?=$cliente['nome_cliente'] ?></strong></div>
                      <div class="panel-body">
                            <div class="img-avatar-container-full">
                              <img  src="<?=$caminho?>" class="img-responsive"><br>
                            </div>
                            <a href="form.fotoPerfil.php?id=<?=$cliente['id_cliente']?>" class="btn btn-default">Alterar foto</a>

                          <br>
                          <hr>
                          <div class="row">
                            <div class="col-md-4">
                              <h4>Informações básicas</h4>
                              <strong>Nome completo:</strong> <?= $cliente['nome_cliente'] ?><br>
                              <strong>Sexo:</strong> <?= $cliente['sexo'] ?><br>
                              <strong>Nascimento:</strong> <?= date("d-m-Y", strtotime($cliente['data_nascimento'])) ?><br>
                              <!-- <strong>Manequim:</strong> <?= $cliente['manequim'] ?><br> -->
                              <strong>OBS:</strong> <?= $cliente['obs'] ?><br>
                            </div>
                            <div class="col-md-4">
                              <h4>Documentos</h4>
                              <strong>RG:</strong> <?= $cliente['rg'] ?><br>
                              <strong>CPF:</strong> <?= $cliente['cpf'] ?><br>
                              <br>
                            </div>
                            <div class="col-md-4">
                              <h4>Contato</h4>
                              <strong>Email:</strong> <?= $cliente['email_cliente'] ?><br>
                              <strong>Telefone:</strong> <?= $cliente['telefone_cliente'] ?><br>
                            </div>
                            <div class="col-md-12">
                              <form class="form-group" method="post">
                                <button type="submit" formaction="editaCliente.php?id=<?=$cliente['id_cliente']?>" class="btn btn-info btn">Editar Cliente</button>
                              </form>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-md-6">
                              <h4>Endereço</h4>
                              <?php
                                  $endereco_cliente = detalhaEnderecoCliente($conexao, $_GET['id']);
                                  foreach($endereco_cliente as $endereco) { ?>

                              <strong>Cidade:</strong> <?= $endereco['cidade'] ?><br>
                              <strong>Rua:</strong> <?= $endereco['rua'] ?><br>
                              <strong>Bairro:</strong> <?= $endereco['bairro'] ?><br>
                              <strong>Número:</strong> <?= $endereco['numero'] ?><br>
                              <strong>Complemento:</strong> <?= $endereco['complemento'] ?>
                              <br>
                              <br>

                              <?php } ?>

                              <form method="post">
                              <button type="submit" formaction="editaEnderecoCliente.php?id=<?=$cliente['id_cliente']?>" class="btn btn-default btn">Editar Endereço</button>

                              <button type="submit" formaction="form.endereco.php?idCliente=<?=$cliente['id_cliente']?>" class="btn btn-default btn">Cadastrar Endereço</button>
                              </form>
                            </div>
                            <div class="col-md-6">
                              <div class="col-md-12">

                                <h4>Manequim</h4>

                                <?php
                                  $manequim_cliente = detalhamanequimCliente($conexao, $_GET['id']);
                                  foreach($manequim_cliente as $manequim) { ?>


                                    <div class="col-md-6">
                                      <strong>Busto:</strong> <?= $manequim['busto'] ?><br>
                                      <strong>Cintura:</strong> <?= $manequim['cintura'] ?><br>
                                      <strong>Quadril:</strong> <?= $manequim['quadril'] ?><br>
                                      <strong>Top:</strong> <?= $manequim['top'] ?><br>
                                      <strong>Saia:</strong> <?= $manequim['saia'] ?><br>
                                      <strong>Cava Frente:</strong> <?= $manequim['cavaFrente'] ?><br>
                                      <strong>Cava Costas:</strong> <?= $manequim['cavaCostas'] ?><br>
                                      <strong>Ombro:</strong> <?= $manequim['ombro'] ?><br>
                                    </div>
                                    <div class="col-md-6">
                                      <strong>Entre Busto:</strong> <?= $manequim['entreBusto'] ?><br>
                                      <strong>Comprimento Manga:</strong> <?= $manequim['comprimentoManga'] ?><br>
                                      <strong>Largura Manga:</strong> <?= $manequim['larguraManga'] ?><br>
                                      <strong>Punho:</strong> <?= $manequim['punho'] ?><br>
                                      <strong>Decote Frente:</strong> <?= $manequim['decoteFrente'] ?><br>
                                      <strong>Decote Costas:</strong> <?= $manequim['decoteCostas'] ?><br>
                                      <strong>OBS:</strong> <?= $manequim['obs'] ?><br>
                                    </div>

                                    <br>
                                    <br>

                                    <?php } ?>


                              <form method="post">
                              <button type="submit" formaction="form.manequim.php?id=<?=$cliente['id_cliente']?>" class="btn btn-default btn-block">Editar Manequim</button>
                              </form>
                            </div>
                              </div>

                          </div>

                            <hr>
                          <div class="row">

                          <div class="col-md-12">
                            <h4>Histórico financeiro</h4>
                            <br>



                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Compras realizadas
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">


                                            <table class="table table-striped">
                                              <thead>
                                                  <tr>
                                                      <th>Id venda</th>
                                                      <th>Cliente</th>
                                                      <th>Data venda</th>
                                                      <th>Produto/Serviço</th>
                                                      <th>Valor total</th>
                                                      <th>Parcelas</th>
                                                      <th>Forma de Pagamento</th>
                                                  </tr>
                                               </thead>

                                        <?php
                                            $array_vendas = buscaVendasCliente($debito, $credito, $boleto, $cheque, $especie, $cliente['nome_cliente'], $conexao);
                                            foreach($array_vendas as $venda) {
                                            ?>
                                                <tr>

                                                    <td><?= $venda['id_venda'] ?></td>
                                                    <td><?= substr($venda['nome_cliente'],0,8) ?>.</td>
                                                    <td><?= $venda['data_venda'] ?></td>
                                                    <td><?= $venda['nome_servico'] ?></td>
                                                    <td>R$ <?= $venda['total'] ?></td>
                                                    <td><?= $venda['qtd_parcelas'] ?></td>
                                                    <td><?= $venda['forma_pgto'] ?></td>

                                                </tr>

                                                <!-- Fim do for -->
                                                <?php } ?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                              </table>

                                         </div>


                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel panel-danger">
                                            <div class="panel-heading">
                                                Parcelas em aberto
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12">


                                                        <table class="table table-striped">
                                                          <thead>
                                                              <tr>
                                                                  <th>Venda</th>

                                                                  <th>Parcela</th>
                                                                  <th>Vencimento</th>
                                                                  <th>Valor parcela</th>
                                                                  <th>Recebido</th>
                                                                  <th></th>

                                                              </tr>
                                                           </thead>

                                                    <?php
                                                            $total=0;
                                    $array_vendas = buscaContasAReceberCliente($conexao, $cliente['nome_cliente']);
                                    foreach($array_vendas as $venda) {
                                    ?>
                                                            <tr>

                                                                <td><?= $venda['id_venda'] ?></td>

                                                                <td><?= $venda['parcela'] ?></td>
                                                                <td><?= $venda['vencimento'] ?></td>
                                                                <td>R$ <?= $venda['valor_parcela'] ?></td>
                                                                <td><?= $venda['recebido'] ?></td>

                                                                <td><a href="aReceber-confirma-usuario.php?id=<?= $venda['id_parcela'] ?>&usuario=<?= $_GET['id'] ?>"> Informar recebimento <i class="fa fa-check" aria-hidden="true"></i></a> </td>
                                                                <?php $total += $venda['valor_parcela']?>


                                                            </tr>

                                                            <!-- Fim do for -->
                                                            <?php } ?>
                                                            <tr>

                                                                <td></td>

                                                                <td></td>

                                                                <td align="right">Total a receber:</td>
                                                                <td>R$ <?=$total?></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>

                                </table>


                                                     </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    <div class="col-lg-6">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                Parcelas recebidas
                                            </div>
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12">


                                                        <table class="table table-striped">
                                                          <thead>
                                                              <tr>
                                                                  <th>Venda</th>


                                                                  <th>Parcela</th>
                                                                  <th>Vencimento</th>
                                                                  <th>Valor parcela</th>
                                                                  <th>Recebido</th>

                                                                  <th></th>

                                                              </tr>
                                                           </thead>

                                                    <?php
                                                            $total=0;
                                    $array_vendas = buscaContasRecebidasCliente($conexao, $cliente['nome_cliente']);
                                    foreach($array_vendas as $venda) {
                                    ?>
                                                            <tr>

                                                                <td><?= $venda['id_venda'] ?></td>


                                                                <td><?= $venda['parcela'] ?></td>
                                                                <td><?= $venda['vencimento'] ?></td>
                                                                <td>R$ <?= $venda['valor_parcela'] ?></td>
                                                                <td><?= $venda['recebido'] ?></td>

                                                                <td><a href="aReceber-desfaz-usuario.php?id=<?= $venda['id_parcela'] ?>&usuario=<?= $_GET['id'] ?>">Desfazer <i class="fa fa-undo" aria-hidden="true"></i></a> </td>
                                                                <?php $total += $venda['valor_parcela']?>


                                                            </tr>

                                                            <!-- Fim do for -->
                                                            <?php } ?>
                                                            <tr>

                                                                <td></td>

                                                                <td></td>
                                                                <td align="right">Total:</td>
                                                                <td>R$ <?=$total?></td>

                                                                <td></td>
                                                                <td></td>
                                                            </tr>

                                </table>


                                                     </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                      </div>




                                </div>

                          </div>






                          <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Excluir Cliente</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Excluir Cliente</h4>
      </div>
      <div class="modal-body">
        <form method="post">
          <p>Tem certeza que quer excluir o cliente?</p>
          <button type="submit" formaction="excluiCliente.php?id=<?=$cliente['id_cliente']?>" class="btn btn-danger btn">Excluir Cliente</button>
        </form>
      </div>

    </div>

  </div>
</div>



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
