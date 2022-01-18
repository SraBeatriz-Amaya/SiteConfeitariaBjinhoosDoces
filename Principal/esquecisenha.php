<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esqueci Senha</title>

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
            <div class="centro">
                <div class="inner ">
                    <div class="login">
                       
                        <form method="post" action="esquecisenha.php">
                            <h3>Esqueci Senha</h3>

                            <div class="form-holder">
                                <input id="email" name="email" type="text" placeholder="E-mail" class="campo">
                            </div>
                            <div class="entrar">
                                <button name="enviar" type="submit" class="btn-entrar" onclick="validar();">OK</button>
                            </div>
                            <?php
                            if(isset($_POST["enviar"])) enviaremail();?>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="container-fluid text-center bg-footer">
                <p>Desenvolvido por Beatriz e Jezreel</p>
            </footer>
        </div>
    </header>
</body>
</html>
<?php
function enviaremail()
{
    $email = $_POST["email"];
    $conn = new mysqli("localhost","root","","projetobj");
    $sql = "select senha1 from cliente where email='$email'";
    $res =  mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
     $senha1 = $row["senha1"];
}
        $assunto = "Redefinir Senha";
        $mensagem = "Olá,Foi solicitada a recuperação de senha para este usuário, se não foi 
        você quem solicitou desconsidere esta mensagem e continue utilizando sua senha atual.
        Sua senha cadastrada e criptografada é ".$senha1."
        Este é um e-mail automático enviado pela BjinhoosDoces e expira em 15minutos, favor não responder. ";
        $header = "MIME-Version: 1.0\r\n";
        $header .= "from: Redefinir Senha<biagatona_01@hotmail.com>";
        $conexao = new mysqli("localhost", "root", "", "projetobj");
        $sql = "select * from cliente where email='$email'";
        mysqli_query($conexao, $sql);
        mail($email, $assunto, $mensagem, $header);
        echo "Email enviado com sucesso";
        mysqli_close($conexao);
}
?>