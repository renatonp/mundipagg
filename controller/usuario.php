<?php
require_once '../model/usuario.php';
require_once '../model/dao.php';

class UsuarioController extends DaoModel {
    // método que verifica se  usuário já foi cadastrado no blog
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
        // formulando e executando a query inserindo dados no banco
        $query="INSERT INTO usuarios(nome,email,senha,data_cadastro) VALUES ('".$obj->getNome()."','".$obj->getEmail()."','".$obj->getSenha()."','".$obj->getData()."')";
        $vet = $this->execute($query);
        $vet["msg"]="Usu&aacute;rio cadastrado com sucesso!";
        return $vet;
    }
    
    public function carregarDados($obj){
        // formulando e executando a query caregando os dados do banco
        $query="SELECT id, nome, email, foto FROM usuarios WHERE email = '".$obj->getEmail()."'";
        return $vet = $this->execute($query);
    }
    
    public function alterarDados($obj){
        // formulando e executando a query atualizando os dados no banco
        $query="UPDATE usuarios SET nome = '".$obj->getNome()."', email = '".$obj->getEmail()."' ".($obj->getSenha()!=""?", senha = '".$obj->getSenha()."' ":"").($obj->getFoto()!=""?", foto = '".$obj->getFoto()."' ":"")." WHERE email = '".$_SESSION["usuario"]."'";
        $vet = $this->execute($query);
        $vet["msg"]="Dados alterados com sucesso!";
        return $vet;
    }
}