<?php
session_start();
require_once '../model/usuario.php';
$usuario = new UsuarioModel();
$usuario->setNome($_POST["nome"]);
$usuario->setEmail($_POST["email"]);
$usuario->setFoto($_POST["foto"]);

if($_POST['senha']==$_POST['confirmarsenha']){
    $usuario->setSenha($_POST['senha']);
    $msg="";
}
else{
    $msg="<br />Sua senha n&atilde;o foi alterada pois elas n&atilde;o conferem";
}

$vet = $usuario->alterarDados();
echo $vet["msg"].$msg;
?>