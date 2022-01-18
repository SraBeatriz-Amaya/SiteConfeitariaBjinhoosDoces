<html>
<body>
<?php

$emails = $_GET["input_email"];
$para = "to:".$emails;
$assunto =  "Encomenda BjinhooDoces";
$mensagem = "teste";
$header = "MIME-Version: 1.0\r\n";
$header .= "from: BjinhoosDoces<biagatona_01@hotmail.com>";


if(mail($para, $assunto, $mensagem, $header)){
    echo "Email enviado com sucesso";
}else{
    echo "Nao foi ";
}


?>
</body>
</html>
