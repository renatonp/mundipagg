<?php
session_start();
require_once '../model/login.php';
require_once '../model/dao.php';
class LoginController extends DaoModel {
    
    public function login($obj){
        $query="SELECT id FROM usuarios WHERE email = '".$obj->getEmail()."' AND senha = '".$obj->getSenha()."'";
        return $vet = $this->execute($query);
    }
    public function logout(){
        session_unset();
        header("Location: ../index.php");
    }
}