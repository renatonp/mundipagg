<?php
session_start();
// carrega o conteúdo das classes de apoio
require_once '../model/post.php';
require_once '../model/usuario.php';

$usuariomodel = new UsuarioModel(); // define o objeto da clase UsuarioModel
$post = new PostModel(); // define o objeto da clase PostModel

$usuariomodel->setEmail($_SESSION["usuario"]);
$vet = $usuariomodel->carregarDados();
if($vet["linhas"] > 0){
    while($resultado = $vet["sql"]->fetch(PDO::FETCH_ASSOC)){
        $usuariomodel->setId($resultado['id']);
        $post->setUsuarioId($usuariomodel->getId());
    }
}

// seta as variáveis da classe post
$post->setTitulo($_POST["titulo"]);
$post->setTags($_POST["tags"]);
$post->setDescricao($_POST["descricao"]);
$post->setDataPost(date("Y-m-d H:i:s"));

// insere o post no banco
$vet = $post->inserirPost();
echo $vet["msg"];
?>