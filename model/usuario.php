<?php
require_once '../controller/usuario.php';
class UsuarioModel {
    
    // declaração dos atributos da classe
    private $id     = null;
    private $nome   = null;
    private $email  = null;
    private $senha  = null;
    private $foto   = null;
    private $caminho_foto;
    private $data_cadastro = null;
    
    // getters e setters
    public function getId(){
        return $this->id;
    }

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
        return $this->foto;
    }
    
    public function getCaminhoFoto(){
        return $this->caminho_foto;
    }

        public function getData(){
        return $this->data_cadastro;
    }
    
/*******************************************************************************/
    public function setId($id){
        $this->id = $id;
    }

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
    
    public function setCaminhoFoto($caminho_foto){
        $this->caminho_foto = $caminho_foto;
    }

        public function setData($data){
        $this->data_cadastro=$data;
    }
    
/*******************************************************************************/
    
    // chamada aos métodos principais
    public function verificarUsuarioCadastrado(){
        $usuario = new UsuarioController();
        return $usuario->verificarUsuarioCadastrado($this);
    }

    // chamada dos métodos de manipulação com o banco de dados
    public function cadastrarUsuario(){
        $usuario = new UsuarioController();
        return $usuario->cadastrarUsuario($this);
    }
    
    public function carregarDados(){
        $usuario = new UsuarioController();
        return $usuario->carregarDados($this);
    }
    
    public function alterarDados(){
        $usuario = new UsuarioController();
        return $usuario->alterarDados($this);
    }
}