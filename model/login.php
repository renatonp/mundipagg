<?php
require_once '../controller/login.php';  // carrega os dados da classe LoginController
class LoginModel {
    
    // declaração dos atributos da classe
    private $email = null;
    private $senha = null;
    
    // getters e setters
    public function getEmail(){
        return $this->email;
    }
    
    public function getSenha(){
        return $this->senha;
    }
    
/*******************************************************************************/
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
    }
    
    public function login(){
        $login = new LoginController();
        return $login->login($this);
    }
    
    public function logout(){
        $login = new LoginController();
        $login->logout();
    }
}