<?php
require_once '../model/usuario.php';
require_once '../model/dao.php';
class UsuarioController extends DaoModel {
    
    public function verificarUsuarioCadastrado($obj,$email){
        $msg="";
        $query="SELECT id FROM usuarios WHERE email = '".$email."'";
        $vet = $this->execute($query);
        
        if($vet["linhas"] > 0){
            $vet["msg"]="Usu&aacute;rio j&aacute; cadastrado!";
        }
        return $vet;
    }
    
    // método de cadastro de usuário
    public function cadastrarUsuario($obj,$dados_usuario){
        // formulando e executando a query
        $query="INSERT INTO usuarios(nome,email,senha,data_cadastro) VALUES ('".$dados_usuario["nome"]."','".$dados_usuario['email']."','".$dados_usuario['senha']."','".date("Y-m-d H:i:s")."')";
        $vet = $this->execute($query);
        $vet["msg"]="Usu&aacute;rio cadastrado com sucesso!";
        return $vet;
    }
}
