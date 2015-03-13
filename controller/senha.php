<?php
require_once '../model/senha.php';
require_once '../model/dao.php';
class SenhaController extends DaoModel {
    
    public function enviarSenha($obj){
        $query="SELECT senha FROM usuarios WHERE email = '".$obj->getEmailDestino()."'";
        return $vet = $this->execute($query);
    }
    
    public function definirHeader($obj){
        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: ".$obj->getEmailOrigem()."\r\n"; // remetente
        $headers .= "Return-Path: ".$obj->getEmailDestino()."\r\n"; // return-path        
        return $headers;
    }
    
    public function mandarEmail($obj){
//        return mail($obj->getEmailDestino(), $obj->getAssunto(), $obj->getMensagem(),  $this->definirHeader($obj));
        return true;
    }
}
