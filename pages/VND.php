<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SysOficin - Venda</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- DataTables CSS -->
        <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            var total=0;
            function adicionarNoCarrinho(codigoBarra,nome,preco){
                var linha= document.createElement("tr");
                var colunaCodigo= document.createElement("td");
                var colunaNome= document.createElement("td");
                var colunaPreco= document.createElement("td");
                var colunaQuantidade= document.createElement("td");
                colunaCodigo.appendChild(document.createTextNode(codigoBarra));
                colunaNome.appendChild(document.createTextNode(nome));
                colunaPreco.appendChild(document.createTextNode(preco));
                colunaPreco.setAttribute("class","preco");
                colunaQuantidade.innerHTML="<input type='number' value='1' class='quantidade' onchange='atualizarValor("+preco+",this.value)'/>"
                
                //adicionar coluna na linha;
                linha.appendChild(colunaCodigo);
                linha.appendChild(colunaNome);
                linha.appendChild(colunaPreco);
                linha.appendChild(colunaQuantidade);
                
                //adicionar linha na tabela;
                document.getElementById("tbodyCarrinho").appendChild(linha);
                
                adicionarPreco(preco, 1);
            }
            
            function adicionarPreco(preco, quantidade){
                total+=(preco*quantidade);
                document.getElementById("total").innerHTML=total;
            }
            
            function atualizarValor(preco, quantidade){
                novoTotal=0;
                var precos=document.getElementsByClassName("preco");
                var quantidades=document.getElementsByClassName("quantidade");
                
                for (i=0;i<precos.length;i++){
                novoTotal+=(precos[i].innerHTML*quantidades[i].value);
                }
                document.getElementById("total").innerHTML= novoTotal;
            }
            
        </script>
    </head>
    <body>

<?php include $_SERVER['DOCUMENT_ROOT']."/sysoficin/pages/menuLateral.php"?>
<?php include $_SERVER['DOCUMENT_ROOT']."/sysoficin/pages/menuTop.php"?>
  
        <div id="wrapper">
          
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Venda</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    
                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Produtos Listados
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Codigo</th>
                                                    <th>Nome</th>
                                                    <th>Preço de Venda</th>
                                                    <th>Quantidade</th>
                                                    <th>Descrição</th>
                                                    <th>Adicionar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
require_once $_SERVER['DOCUMENT_ROOT']."/sysoficin/dao/ProdutoDAO.php"; 
$dao= new ProdutoDAO();
$lista= $dao->listarTodos();
foreach ($lista as $produto) {
    $textoDoCSS= "";
    if($produto->getQuantidade()<=0){
        $textoDoCSS= "style='background-color:red'";
    }
    else if ($produto->getQuantidade()<=10){
        $textoDoCSS= "style='background-color:yellow'";
    }
    echo "<tr class='odd '".$textoDoCSS.">";
    echo "<td>".$produto->getCodigo()."</td>";
    echo "<td>".$produto->getNome()."</td>";
    echo "<td>".$produto->getPrecoVenda()."</td>";
    echo "<td>".$produto->getQuantidade()."</td>";
    echo "<td>".$produto->getDescricao()."</td>";
    echo "<td><button class='btn btn-success btn-circle' onclick='adicionarNoCarrinho(\"".$produto->getCodigo()."\",\"".$produto->getNome()."\",".$produto->getPrecoVenda().")'><i class=' fa fa-shopping-basket'></i></button></td>";
    echo "</tr>";
}
?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->                         
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                            <!-- /.panel -->
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                    Carrinho de Compras
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Codigo</th>
                                                    <th>Nome</th>
                                                    <th>Preço de Venda</th>
                                                    <th>Quantidade</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyCarrinho">
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->                         
                                </div>
                                <!-- /.panel-body -->
                            </div>
                                </div>
                            <div class="col-lg-6">
                                <h2> Total: <span id= "total"></span></h2>
                            </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>
