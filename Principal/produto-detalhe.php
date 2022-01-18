<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto Detalhes</title>

    <link rel="sortcut icon" href="../img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Principal/principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<header>
        <div id="container">
            <div class="topo">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown">
                        Conta
                        </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="../Principal/cadastro.html">Cadastra-se</a>
                        <a class="dropdown-item" href="../Principal/login.html">Login</a>
                    </div>

                </div> 

                <img src="../img/logo1.png" alt="logo" id="post_image" />
            </div>

            <div id="lista">
                <ul>
                    <li><a href="../Principal/principal.html">BjinhoosDoces</a></li>
                    <li><a href="../Principal/cardapio.html">Cardápio</a></li>
                    <li><a href="../Principal/encomenda.html">Encomendas</a></li>
                    <li><a href="../Principal/local.html">Localização</a></li>
                </ul>

                <br/>
            </div>
            <div class="container" id="produto-detalhe">
                <?php
                    function carrega(){
                    $conexao = new mysqli("localhost","root","","projetobj");
                    if (!$conexao) {
                        die("Connection failed: " . mysqli_connect_error());
                        header("location:esquecisenha.php");
                    }
                    $sql = "select * from produto where codigo=".$_GET["codigo"]."";
                    $res =  mysqli_query($conexao, $sql);
                    $row = mysqli_fetch_assoc($res);
                echo "<div class='row'>
                <div class='col-lg-6 col-md-7 col-sm-12'>
                    <div class='zoom'>
                        <p><img src='".$row["imagem"]."'   width='200' height='250' style='margin-left: 4%;' ></p><br>  
                    </div>
                </div>
                <div class='col-lg-5 col-md-4 col-sm-12 ' style='margin-right: 0;'>
                    <div class='container'>
                     <div class='row'>
                         <div class='col-lg-12 arial'>       
                                <h4 class='text-left'>".$row["titulo"]."</h4>
                        </div>
                    </div>     
                    <div class='row'>
                         <div class='col-lg-12 arial'>       
                                <p class='text-left'>".$row["descritivo"]."</p>
                        </div>
                    </div> 
                            </div>
                            <div class='row'>
                                <div class='mb-4' style='margin-left: 5%;'>
                                    <strong><h2>R$ ".$row["valor"].",00</h2></strong>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='mb-4' style='margin-left: 5%;'>
                                    <strong><h4>".$row["qtd"]." unidade</h4></strong>  
                                </div>
                            </div>
                            <div class='row'>
                                <div class='mb-4' style='margin-left: 5%;'>
                                    <strong><h4>Categoria: ".$row["categoria"]."</h4></strong>
                                    
                                </div>
                            </div>
                        </div>    
                        <div class='row'>
                                <div class='mb-2' style='margin-left: 10%;'>
                                    <table>
                                        <tr>
                                            <td>
                                                <a class='btn bg-light arial' href='../Principal/cardapio.html' role='button'>Voltar ao cardápio</a>
                                                <span class='arial'><b></b></span> 
                                            </td>
                                            <td>
                                                <a class='btn btn-default bg-success  arial' style='margin-left: 2%;' href='carrinho.php?codProduto=".$row["codigo"]."' role='button'>Realizar Compra</a>                            
                                            </td>
                                        </tr>
                                    </table>
                                    <span id='estoque 'class='arial'>Estoque: <b style='color: green;'>Disponivel</b></span>
                                </div>
                            </div>                      
                </div>        
                </div>";
                mysqli_close($conexao);
            }   
        ?>
           <?php
                carrega();
           ?>
        </div>
            <footer class="container-fluid text-center bg-footer">
                <p>Desenvolvido por Beatriz e Jezreel</p>
            </footer>
        </div>
    </header>
</body>
</html>