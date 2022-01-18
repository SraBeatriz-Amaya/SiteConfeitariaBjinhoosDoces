<?php
        $nome = $_GET["nome"];
        $email = $_GET["email"];
        $fone = $_GET["telefone"];
        $senha1 = $_GET["senha1"];
        $senha2 = $_GET["senha2"];

        $conexao = new mysqli("localhost","root","","projetobj");
        $sql = "insert into cliente (nome,email,telefone,senha1,senha2) values('$nome','$email','$fone',md5('$senha1'),md5('$senha2'))";
        if($err = mysqli_query ($conexao, $sql)){
            echo "<h3>Cadastro realizado</h3>";
            mysqli_close($conexao);
            header("location: principal.html");
        }else{
            echo "<h3>OPS! Algo deu errado</h3>";
        }
    
?>