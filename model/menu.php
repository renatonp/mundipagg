<?php
class Menu {
    // declaração dos atributos da classe
    private $index                      = null;
    private $cadastrar_usuario          = null;
    private $login                      = null;
    private $opcoes                     = null;


    // getters e setters
    public function getOpcoes(){
        return $this->opcoes;
    }

    public function getindex(){
        return $this->index;
    }
    
    public function getCadastrarUsuario(){
    return $this->cadastrar_usuario;
    }
    
    public function getLogin(){
        return $this->login;
    }


    /*******************************************************************************/
    public function setOPcoes($opcoes){
        $this->opcoes = $opcoes;
    }

    public function setIndex($index){
        $this->index = $index;
    }
    
    public function setCadastrarUsuario($cadastrar_usuario){
        return $this->cadastrar_usuario = $cadastrar_usuario;
    }
    
    public function setLogin($login){
        return $this->login = $login;
    }
}