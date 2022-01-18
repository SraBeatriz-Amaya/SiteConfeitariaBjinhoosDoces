<?php
 $sessionid="0";
 session_start();
 $sessionid = session_id();
 $conn = new mysqli("localhost","root","","projetobj");
                        if (!$conn) {
                             die("Connection failed: " . mysqli_connect_error());
                             header("location:login.php");
                     }
                        if($_SESSION["logado"] != 1){
                         $codcliente = $_SESSION["codigo"];
                         $codproduto = $_GET["codProduto"];
                            $sql = "select * from produto where codigo='".$codproduto."'";
                            $res =  mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($res);
                            $nomeproduto = $row["titulo"];
                            $preco = $row["valor"];
                            $imagem= $row["imagem"];
                            $conn->close();
                            $conn = new mysqli("localhost","root","","projetobj");
                            if (!$conn) {
                                 die("Connection failed: " . mysqli_connect_error());
                                 header("location:login.php");
                         }
                            $qtd = 1;
                            $sql = "insert into cesta (sessionid,codCliente,codProduto, qtd, valorUnitario, valorTotal) values('$sessionid','$codcliente','$codproduto','$qtd','$preco','".$preco * $qtd."')";
                            $res =  mysqli_query($conn, $sql);
                            header("location:cesta.php");
                        }else{
                         echo "<p>Você precisa estar logado para adicionar produtos ao carrinho</p>";
                        }
 ?>
