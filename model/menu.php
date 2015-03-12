<?php
class Menu {
    // declaração dos atributos da classe
    private $index                      = null;
    private $cadastrar_usuario          = null;
    private $login                      = null;
    private $principal                  = null;
    private $perfil                     = null;
    private $post                       = null;
    private $logout                     = null;
    private $opcoes                     = null;


    // getters e setters
    public function getindex(){
        return $this->index;
    }
    
    public function getCadastrarUsuario(){
    return $this->cadastrar_usuario;
    }
    
    public function getLogin(){
        return $this->login;
    }
    
    public function getPrincipal(){
        return $this->principal;
    }
    
    public function getPerfil(){
        return $this->perfil;
    }
    
    public function getPost(){
        return $this->post;
    }
    
    public function getLogout(){
        return $this->logout;
    }

    public function getOpcoes(){
        return $this->opcoes;
    }

    /*******************************************************************************/
    public function setIndex($index){
        $this->index = $index;
    }
    
    public function setCadastrarUsuario($cadastrar_usuario){
        $this->cadastrar_usuario = $cadastrar_usuario;
    }
    
    public function setLogin($login){
        $this->login = $login;
    }
    
    public function setPrincipal($principal){
        $this->principal = $principal;
    }
    
    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }
    
    public function setPost($post){
        $this->post = $post;
    }
    
    public function setLogout($logout){
        $this->logout = $logout;
    }

    public function setOPcoes($opcoes){
        $this->opcoes = $opcoes;
    }
}