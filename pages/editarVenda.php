<?php
include('header.php');
include('venda/funcoesProdutos.php');
//parametro para exibição do botão de edição na função de listagem de produtos
$_SESSION['editaCesta'] = true;

?>



        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">

                  <?php if(array_key_exists("removido", $_GET) && $_GET['removido']=='ok'){?>
                    <br>
                      <div class="alert alert-success fade in">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              Item removido com <strong>successo!</strong>
                      </div>
                  <?php }?>

                    <h1 class="page-header">Editar Venda</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>


                <div class="row">
                    <div class="col-lg-12">

                    <table class="table table-condensed">
                        <thead>
                          <tr>
                           <th>Produto</th>
                            <th>Qtd</th>
                            <th>Valor</th>
                            <th>Total Item</th>
                          </tr>
                        </thead>

                        <tbody>
                            <?php
                            if(isset($_SESSION['cesta'])==true){
        $_SESSION['totalCesta']=0;
        $qtd = sizeof($_SESSION['cesta']);

        for($i=0; $i < $qtd; $i++) {
        echo'<tr>';

        echo'<td>'.$_SESSION['cesta'][$i]['nome'].'</td>';
        echo'<td>'.$_SESSION['cesta'][$i]['qtd'].'</td>';
        echo'<td>R$ '.$_SESSION['cesta'][$i]['valor'].'</td>';
        echo'<td>R$ '.$_SESSION['cesta'][$i]['totalItem'].'</td>';

        ?>
                <td>
                    <form method="post">
                        <button type="submit" formaction="venda/editaVenda.php?id=<?= $i ?>" class="btn btn-default btn-block">Remover
                        </button>
                    </form>
                </td>

        <?php
        $_SESSION['totalCesta'] +=  $_SESSION['cesta'][$i]['totalItem'];

        echo'</tr>';

        }//fim do for

        //rodape de informaçoes da nota
        echo'<tr>';
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong>Total:</strong></td>';
        echo'<td><strong>R$ '.$_SESSION['totalCesta'].'</strong></td>';
        echo'</tr>';

        echo'<tr>';
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong>Total itens:</strong></td>';
        echo'<td><strong>'. sizeof($_SESSION['cesta']).'</strong></td>';
        echo'</tr>';

        echo'<tr>';
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong></strong></td>';
        echo'<td align="right"><strong>Cliente Selecionado:</strong></td>';
        echo'<td><strong>'. $_SESSION['nome_cliente'] .'</strong></td>';
        echo'</tr>';
    }
                            ?>

                        </tbody>
                        </table>

                    </div>



                </div>
                <a href="selecionarProduto.php" class="btn btn-info btn-block" role="button">Voltar para a venda</a>
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
