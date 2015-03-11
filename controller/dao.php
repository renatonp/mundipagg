<?php
require_once '../model/dao.php';
class DaoController {
    public function execute($obj, $query){
        
        // deinindo os valores dos atributos da classe DaoModel
        $obj->setHost("localhost");
        $obj->setBase("mundipagg");
        $obj->setUser("root");
        $obj->setSenha("");
        
        // atribuindo os valores a variáveis
        $host       =$obj->getHost();
        $db         =$obj->getBase();
        $username   =$obj->getUser();
        $passwd     =$obj->getSenha();
        $retorno=array();
        $retorno["linhas"]=0;
        $retorno["msg"]="";
        $retorno["sql"]=null;

        // conectando ao banco usando a classe PDO
        try{
            $pdo = new PDO("mysql:host=$host;dbname=$db", $username, $passwd);
        }
        catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }
        
        // preparando e executando a query
        $sql = $pdo->prepare($query);
        $retorno["sql"] = $sql;
        $sql->execute();
        $retorno["linhas"] = $sql->rowCount();
        
        return $retorno;
    }
}