<?php
session_start(); // inicia o controle de sessão
// carrega o conteúdo das classes de apoio
require_once '../model/login.php';
require_once '../model/dao.php';

// herda os atibutos e métodos a classe DaoModel
class LoginController extends DaoModel {
    
    //verifica se o usuário em questão existe no site
    public function login($obj){
        $query="SELECT id FROM usuarios WHERE email = '".$obj->getEmail()."' AND senha = '".$obj->getSenha()."'";
        return $vet = $this->execute($query);
    }
    // desabilita as sessões e vai para a página inicial
    public function logout(){
        session_unset();
        header("Location: ../index.php");
    }
}