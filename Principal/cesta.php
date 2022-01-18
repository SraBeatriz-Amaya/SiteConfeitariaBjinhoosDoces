<!DOCTYPE html>
<html lang="pt-br">
<?php
    $sessionid="0";
    session_start();
    $sessionid = session_id();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta</title>

    <link rel="sortcut icon" href="../img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Principal/principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
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
            <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Carrinho</h3>

                <p>Abaixo você confere os produtos da sua cesta</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div id="alerta" class="alert alert-success" role="alert">Os itens foram adicionados na sua cesta.<a class="alert-link" href="../Principal/cardapio.html">Clique aqui</a> para continuar comprando</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-hover table-bordered table-responsive-sm" id="tabela-itens">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Subtotal</th>
                            <th>Excluir <form method="post" action="cesta.php"><button id='bt-remover'name="btn-remover" class='btn btn-remover'><i class='fa fa-trash fa-xs '></i></button></form></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = new mysqli("localhost","root","","projetobj");
                        if (!$conn) {
                             die("Connection failed: " . mysqli_connect_error());
                             header("location:login.php");
                     }
                     
                            $sql = "select * from produto as p join cesta as c on (p.codigo = c.codProduto) where c.sessionid='$sessionid'";
                            $res =  mysqli_query($conn, $sql);
                         if (mysqli_num_rows($res) > 0) {
                             while($row = mysqli_fetch_array($res)) {
                                 echo"
                                 <tr>
                                 <td id='produto-imagem'><img src='".$row["imagem"]."' width='200' height='250'>".$row["titulo"]."</td>
                                 <td class='item-preco'>R$".$row["valor"].",00</td>
                                 <td  id='quantidadeProduto'>
                                     <button id='bt-mais' class='btn btn-mais'><i class='fa fa-plus fa-xs'></i></button>
                                     <input class='input-quantidade' type='text' maxlength='5' readonly  value='".$row["qtd"]."'/>
                                     <button id='bt-menos' class='btn  btn-menos'><i class='fa fa-minus fa-xs'></i></button>
                                 </td>
                                 <td class='subtotal'>".$row["qtd"] * $row["valor"]."</td>
                                 <td ></td>
                                 </tr>";
                         
                     }
                        }
                        ?>
                        <?php
                            if(isset($_POST["btn-remover"])){
                                $conn = new mysqli("localhost","root","","projetobj");
                                $sql = "delete from cesta where sessionid='$sessionid'";
                                echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
                                if($res =  mysqli_query($conn, $sql)){
                                    echo "Removido";
                                }else{
                                    echo "Erro ao remover";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-sm-12 " id="calculoFrete">
                <p>Calcule frete e prazo</p>
                <input class="input-group" type="text" id="input-cep" placeholder="CEP" size="40">
                <button id="bt-ok" class="btn input-group-btn">ok</button>
                <p id="p-cep"><a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="new">Não sei meu cep</a></p>
                <p>As opções de envio serão atualizadas durante a finalização da compra. </p>
                <p>Escolha o melhor frete para você:</p>
                <div id="alerta-frete" class="alert alert-danger">
                    Digite seu endereço para ver as opções de entrega.
                  </div> 
                <div  id="frete">
                    <label>
                        <div class="card" id="card-frete">
                            <div class="card-body">
                              <h5 class="card-title">Economica</h5>
                              <p class="card-text">7 dias uteis  </p>
                              <p class="card-text" id="valor-frete">R$18.50</p>
                              <input type="radio" name="frete" class="input-frete" id="input-frete">
                            </div>
                          </div>
                    </label>
                    <label>
                        <div class="card" id="card-frete">
                            <div class="card-body">
                              <h5 class="card-title">correios</h5>
                              <p class="card-text">20 dias uteis  </p>
                              <p id="valor-frete" class="card-text">R$28.00</p>
                              <input type="radio" class ="input-frete"name="frete" id="input-frete">
                            </div>
                          </div>
                    </label>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12" id="resumoPedido">
                <h4>Resumo do pedido</h4>
                <br>
                <p id="quantidade-preco">1 produto         R$</p>
                <p id="p-frete">Frete                R$0,00</p>
                <br>
                <p id="total"><b>Total               R$20,00</b></p>
                <button class="btn btn-primary" id="bt-finalizar">Finalizar Pedido</button>
                <br>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Finalizar compra</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form>
                  <div class="row">
                      <div class="col">
                        <label for="nome">Nome Titular</label><input type="text" class="form-control" id="nome" placeholder="Nome do Titular" required>
                      </div>
                      <div class="col">
                        <label for="nome">Numero do Cartao</label><input type="text" class="form-control" id="cartao" placeholder="Numero do cartão" required>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <label for="nome">CVV</label><input type="text" class="form-control" id="cvv" placeholder="CVV" required>
                    </div>
                    <div class="col">
                      <label for="nome">Vencimento</label><input type="text" class="form-control" id="vencimento" placeholder="mm/aa" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <br>
                        <button type="button" class="btn btn-primary"  onclick="validarPagamento();">Finalizar Pedido</button>
                    </div>
                    <div class="col">
                        <br>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Fechar</button>
                    </div>
                    
                </div>
              </form>
            </div>
                   
          </div>
        </div>
      </div>
</body>
</html>
<script lang="javascript">
    $("#bt-finalizar").click(function(){
        if(parseFloat($("#p-frete").text().replace(/[^0-9,.]/g,''))<=0){
            alert("Por favor escolha uma opção de envio");
        }else{
            $("#myModal").modal('show');
        }
    })
    function atualizaDados(){
        var rows = $("#tabela-itens tbody tr").length;
        var subt=0;
        var total=0;
        
        $("#tabela-itens tbody tr").each(function(){
            subt+=parseFloat($(this).closest('tr').find(".subtotal").text());
        });
        $("#quantidade-preco").text(rows+" produtos                  R$"+subt);
        if(subt<=0){
            $("#p-frete").text("Frete R$00,00");
        }
        
        total = subt + parseFloat($("#p-frete").text().replace(/[^0-9,.]/g,''));
        $("#total").text("Total                      R$"+total);
       
    }
    $(document).ready(function(){
        atualizaDados();
    });
    $(".btn-remover").click(function(){
       /*$(this).closest('tr').remove();
        atualizaDados();*/
    });
    $(".btn-mais").click(function(){
      var qtd = $(this).closest('#quantidadeProduto').find(".input-quantidade").val();
      var cont = parseFloat(qtd) + 1;
      $(this).closest('tr').find(".subtotal").text(parseFloat($(this).closest('tr').find(".item-preco").text())*cont);
      $(this).closest('#quantidadeProduto').find(".input-quantidade").val(cont);
      atualizaDados();
      
    });
    $(".btn-menos").click(function(){
      var qtd = $(this).closest('#quantidadeProduto').find(".input-quantidade").val();   
      var cont = parseFloat(qtd);
      if(cont>0){
        cont--;
            if(cont<=0){
                /*$(this).closest('tr').remove();
                atualizaDados();*/
            }else{
                $(this).closest('tr').find(".subtotal").text(parseFloat($(this).closest('tr').find(".item-preco").text())*cont);
                $(this).closest('#quantidadeProduto').find(".input-quantidade").val(cont);
                atualizaDados();
            }
      }
    });

</script>
<script lang="javascript">
    $("#bt-ok").click(function(){   
        if($("#input-cep").val() < 9 || $("#input-cep").val().indexOf("-") < 4 || $("#input-cep").val().indexOf("-") > 6){
            alert("digite um cep valido");
        }else{
            $("#frete").css("visibility","visible");
            $("#alerta-frete").hide();
        }
    });
</script>
<script lang="javascript">
        $(".input-frete").click(function(){
        var valor= $(this).closest('.card').find('#valor-frete').text();
        valor = valor.replace(/[^0-9,.]/g,'');
        $("#p-frete").text("Frete R$"+ valor);
        atualizaDados();
    });

</script>

