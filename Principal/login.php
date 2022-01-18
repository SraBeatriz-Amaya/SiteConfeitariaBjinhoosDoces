<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=initial-scale=1.0">
    <link rel="sortcut icon" href="../img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../Principal/principal.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Login</title>
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
                       <?php
                       session_start();
                       ?>
                        <form method="post" action="validarLogin.php">
                            <h3>Login</h3>

                            <div class="form-holder">
                                <input id="email" name="email" type="text" placeholder="E-mail" class="campo">
                            </div>
                            <div class="form-holder">
                                <input name="senha1" id="senha1" type="Password" placeholder="Password" class="campo" style="font-size: 15px;">
                            </div>
                            <div class="entrar">
                                <button type="submit" class="btn-entrar" onclick="validar();">Entrar</button>
                                <p>Não possui uma conta? <a href="../Principal/cadastro.html" class="linkc">Cadastrar-se</a></p>
                                <a href="../Principal/esquecisenha.php">Esqueceu sua senha?</a>
                            </div>
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
