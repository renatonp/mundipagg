<?php
require_once '../model/usuario.php'; // carrega o conteúdo das classes de apoio
$usuario_email = explode("@", $_POST["email"]); // pega o usuário de e-mail do usuário do blog
$usuario = new UsuarioModel(); // define o objeto da clase UsuarioModel
$usuario->setEmail($_POST['email']); // seta o e-mail do usuário na classe
$vet = $usuario->verificarUsuarioCadastrado(); // verifica se o usuário já está cadastrado no site

// se o usuário não estiver cadastrado, seta as demais variávis da classe
if($vet["linhas"] == 0){
    $usuario->setNome($_POST["nome"]);
    $usuario->setEmail($_POST["email"]);
    $usuario->setSenha($_POST["senha"]);
    $usuario->setData(date("Y-m-d H:i:s"));
    $vet = $usuario->cadastrarUsuario(); // cadastra o usuário no site
    $pathname = $_SERVER["DOCUMENT_ROOT"]."/mundipagg/fotos/".$usuario_email[0]; //define uma pasta para o usuário
    // se a pasta em questão não existir, a mesma é criada
    if(!is_dir($pathname)){
        mkdir($pathname,0777);
    }
}
echo $vet["msg"]; // manda a mensagem ao usuário
?>
