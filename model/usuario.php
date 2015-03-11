<?php
require_once '../controller/usuario.php';
class UsuarioModel {
    
    // declaração dos atributos da classe
    private $nome = null;
    private $email = null;
    private $senha = null;
    private $foto = null;
    private $data = null;
    
    // getters e setters
    public function getNome(){
        return $this->nome;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getSenha(){
        return $this->senha;
    }
    
    public function getFoto(){
        $this->foto;
    }
    
    public function getData(){
        $this->data;
    }
    
/*******************************************************************************/
    
    public function setNome($nome){
        $this->nome=$nome;
    }
    
    public function setEmail($email){
        $this->email=$email;
    }
    
    public function setSenha($senha){
        $this->senha=$senha;
    }
    
    public function setFoto($foto){
        $this->foto=$foto;
    }
    
    public function setData($data){
        $this->data=$data;
    }
    
/*******************************************************************************/
    
    public function verificarUsuarioCadastrado(){
        $usuario = new UsuarioController();
        return $usuario->verificarUsuarioCadastrado($this);
    }

    // chamada dos métodos de manipulação com o banco de dados
    public function cadastrarUsuario(){
        $usuario = new UsuarioController();
        return $usuario->cadastrarUsuario($this);
    }
}