<?php
require_once '../controller/dao.php';
class DaoModel {
    
    // declaração dos atributos da classe
    private $id         = null;
    private $conexao    = null;
    private $host       = null;
    private $user       = null;
    private $senha      = null;
    private $base       = null;
    
    // getters e setters
    public function getId(){
        return $this->id;
    }

    public function getConexao(){
        return $this->conexao;
    }
    
    public function getHost(){
        return $this->host;
    }
    
    public function getUser(){
        return $this->user;
    }
    
    public function getSenha(){
        return $this->senha;
    }
    
    public function getBase(){
        return $this->base;
    }
    
    /*******************************************************************************/
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setConexao($conexao){
        $this->conexao = $conexao;
    }
    
    public function setHost($host){
        $this->host = $host;
    }
    
    public function setUser($user){
        $this->user = $user;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
    }
    
    public function setBase($base){
        $this->base = $base;
    }
    
    // método para a execução da query
    public function execute($query){
        $dao = new DaoController();
        return $dao->execute($this, $query);
    }
}