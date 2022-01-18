<?php
$conexao = new mysqli("localhost","root","","projetobj");

session_start();

 
if(empty($_POST['email']) || empty($_POST['senha1'])) {
	header('Location: login.php');
	exit();
}
 
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha1 = mysqli_real_escape_string($conexao, $_POST['senha1']);
 
$query = "select * from cliente where email = '{$email}' and senha1 = md5('{$senha1}')";
 
$result = mysqli_query($conexao, $query);
 
$row = mysqli_num_rows($result);
 
if($row == 1) {
	$_SESSION['email'] = $email;
	header('Location: cardapio.html');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: cardapio.html');
    
	exit();
}

?>