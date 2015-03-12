<?php
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST"){
    require_once '../model/login.php';
    $login = new LoginModel();
    $login->setEmail($_POST['email']);
    $login->setSenha($_POST['senha']);
    $vet = $login->login();
        if($vet["linhas"] == 0){
            $vet["msg"]="Usu&aacute;rio n&atilde;o cadastrado!";
        }
        else{
            $_SESSION["usuario"] = $login->getEmail();
            header("Location: principal.php");
        }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <style type="text/css">
            nav{
                position: absolute;
                left: 40%;
            }
            #cadastro{
                position: absolute;
                left: 40%;
                top:50px;
            }
        </style>
    </head>    
    <body>
        <?php require_once '../plugin/menu.php'; ?>
        <div id="cadastro" align="center">
            <form name="formulario" id="formulario" action="login.php" method="post">
                E-mail: <input type="text" name="email" id="email"><br />
                Senha: <input type="password" name="senha" id="senha"><br /><br />
                <input type="submit" />
            </form>
            <a href="esqueci_senha.php"><font face="verdana" size="2">esqueci minha senha</a><br /><br />
            <?=(isset($vet["msg"])?$vet["msg"]:"")?>
        </div>
    </body>
</html>