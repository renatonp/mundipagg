<?php
require_once '../model/usuario.php';
$usuario_email = explode("@", strtolower($_POST["email"]));
$usuario = new UsuarioModel();
$usuario->setEmail($_POST['email']);
$vet = $usuario->verificarUsuarioCadastrado();
if($vet["linhas"] == 0){
    $usuario->setNome($_POST["nome"]);
    $usuario->setEmail($_POST["email"]);
    $usuario->setSenha($_POST["senha"]);
    $usuario->setData(date("Y-m-d H:i:s"));
    $vet = $usuario->cadastrarUsuario();
    echo $vet["msg"];
    $pathname = $_SERVER["DOCUMENT_ROOT"]."/mundipagg/fotos/".$usuario_email[0];
    if(!is_dir($pathname)){
        mkdir($pathname,0777);
    }
}
?>
