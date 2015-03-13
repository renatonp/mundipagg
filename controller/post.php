<?php
// carrega o conteúdo das classes de apoio
require_once '../model/post.php';
require_once '../model/dao.php';

// herda os atibutos e métodos a classe DaoModel
class PostController extends DaoModel {
    
    // insere os dados no banco e define a mensagem que aparece ao usuário
    public function inserirPost($obj){
        $query="INSERT INTO posts (titulo,descricao,data_post,tags, usuario_id) VALUES ('".$obj->getTitulo()."','".$obj->getDescricao()."','".$obj->getDataPost()."','".$obj->getTags()."', '".$obj->getUsuarioId()."')";
        $vet = $this->execute($query);
        $vet["msg"] = "Dados inseridos com sucesso!";
        return $vet;
    }
    
    // insere os dados no banco e define a mensagem que aparece ao usuário
    public function carregarPosts($obj){
        $query="SELECT p.titulo,p.descricao,p.data_post,p.tags, u.id, u.nome, u.email, u.foto "
                . "FROM posts p "
                . "INNER JOIN usuarios u ON p.usuario_id = u.id";
        return $this->execute($query);
    }
}
