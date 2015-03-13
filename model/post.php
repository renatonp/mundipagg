<?php
require_once '../controller/post.php'; // carrega os dados da classe PostController

class PostModel {
    
    // declaração dos atributos da classe
    private $titulo     = null;
    private $descricao  = null;
    private $data_post  = null;
    private $tags       = null;
    
    //getters e setters
    public function getTitulo(){
        return $this->titulo;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }
    
    public function getDataPost(){
        return $this->data_post;
    }
    
    public function getTags(){
        return $this->tags;
    }

    /**************************************************************************/
    
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    
    public function setDataPost($data_post){
        $this->data_post = $data_post;
    }
    
    public function setTags($tags){
        $this->tags = $tags;
    }
    
    // chamada aos métodos principais
    public function inserirPost(){
        $post = new PostController();
        return $post->inserirPost($this);
    }
    
    public function carregarPosts(){
        $post = new PostController();
        return $post->carregarPosts($this);
    }
}
