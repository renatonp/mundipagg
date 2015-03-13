<?php
require_once '../controller/senha.php';
class SenhaModel {
    
    // declaração dos atributos da classe
    private $emaildestino   = null;
    private $emailorigem    = null;
    private $senha          = null;
    private $assunto        = null;
    private $mensagem       = null;

    // getters e setters
    public function getEmailDestino(){
        return $this->emaildestino;
    }
    
    public function getEmailOrigem(){
        $this->emailorigem;
    }

        public function getSenha(){
        return $this->senha;
    }
    
    public function getAssunto(){
        return $this->assunto;
    }
    
    public function getMensagem(){
        return $this->mensagem;
    }

    /*******************************************************************************/
    
    public function setEmailDestino($email){
        $this->emaildestino = $email;
    }
    
    public function setEmailOrigem($email){
        $this->emailorigem = $email;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
    }
    
    public function setAssunto($assunto){
        $this->assunto = $assunto;
    }
    
    public function setMensagem($mensagem){
        $this->mensagem = $mensagem;
    }

    public function enviarSenha(){
        $senha = new SenhaController();
        return $senha->enviarSenha($this);
    }
    
    public function definirHeader(){
        $senha = new SenhaController();
        return $senha->definirHeader($this);
    }

    public function mandarEmail(){
        $senha = new SenhaController();
        return $senha->mandarEmail($this);
    }
}