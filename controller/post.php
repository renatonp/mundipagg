<?php
// carrega o conteúdo das classes de apoio
require_once '../model/post.php';
require_once '../model/dao.php';

// herda os atibutos e métodos a classe DaoModel
class PostController extends DaoModel {
    
    // insere os dados no banco e define a mensagem que aparece ao usuário
    public function inserirPost($obj){
        $query="INSERT INTO posts (titulo,descricao,data_post,tags) VALUES ('".$obj->getTitulo()."','".$obj->getDescricao()."','".$obj->getDataPost()."','".$obj->getTags()."')";
        $vet = $this->execute($query);
        $vet["msg"] = "Dados inseridos com sucesso!";
        return $vet;
    }
    
    public function carregarPosts($obj){
        $query="SELECT * FROM posts WHERE usuario_id = ".$obj->getUsuarioId();
        return $this->execute($query);
    }
}
