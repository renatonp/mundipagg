<?php
require_once '../model/usuario.php';
require_once '../model/dao.php';
class UsuarioController extends DaoModel {
    
    public function verificarUsuarioCadastrado($obj){
        $query="SELECT id FROM usuarios WHERE email = '".$obj->getEmail()."'";
        $vet = $this->execute($query);
        
        if($vet["linhas"] > 0){
            $vet["msg"]="Usu&aacute;rio j&aacute; cadastrado!";
        }
        return $vet;
    }
    
    // método de cadastro de usuário
    public function cadastrarUsuario($obj){
        // formulando e executando a query
        $query="INSERT INTO usuarios(nome,email,senha,data_cadastro) VALUES ('".$obj->getNome()."','".$obj->getEmail()."','".$obj->getSenha()."','".$obj->getData()."')";
        $vet = $this->execute($query);
        $vet["msg"]="Usu&aacute;rio cadastrado com sucesso!";
        return $vet;
    }
}