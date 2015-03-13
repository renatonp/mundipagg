<?php
require_once '../model/post.php'; // carrega o conteúdo das classes de apoio
$post = new PostModel(); // define o objeto da clase PostModel

// seta as variáveis da classe post
$post->setTitulo($_POST["titulo"]);
$post->setTags($_POST["tags"]);
$post->setDescricao($_POST["descricao"]);
$post->setDataPost(date("Y-m-d H:i:s"));

// insere o post no banco
$vet = $post->inserirPost();
echo $vet["msg"];
?>