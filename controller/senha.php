<?php
// carrega o conteúdo das classes de apoio
require_once '../model/senha.php';
require_once '../model/dao.php';

// herda os atibutos e métodos a classe DaoModel
class SenhaController extends DaoModel {
// pega a senha do usuário
    public function enviarSenha($obj){
        $query="SELECT senha FROM usuarios WHERE email = '".$obj->getEmailDestino()."'";
        return $vet = $this->execute($query);
    }
// define o cabeçalho do e-mail
    public function definirHeader($obj){
        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: ".$obj->getEmailOrigem()."\r\n"; // remetente
        $headers .= "Return-Path: ".$obj->getEmailDestino()."\r\n"; // return-path        
        return $headers;
    }
//manda o e-mail com a senha ao usuário    
    public function mandarEmail($obj){
//        return mail($obj->getEmailDestino(), $obj->getAssunto(), $obj->getMensagem(),  $this->definirHeader($obj));
        return true;
    }
}
