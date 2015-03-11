<?php
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST"){
    require_once '../model/senha.php';
    $senha = new SenhaModel();
    $senha->setEmailOrigem("rnpenna@gmail.com");
    $senha->setEmailDestino($_POST["email"]);
    $vet = $senha->enviarSenha();
        if($vet["linhas"] == 0){
            $vet["msg"]="E-mail n&atilde;o cadastrado!";
        }
        else{
            while($resultado = $vet["sql"]->fetch(PDO::FETCH_ASSOC))
            {
                $senha->setSenha($resultado["senha"]);
            }
            
            $senha->setAssunto("Envio de e-mail");
            $senha->setMensagem("Sua senha no blog &eacute; ".$senha->getSenha());

            if($senha->mandarEmail()){
                $vet["msg"]="A senha foi enviada para o seu e-mail";
            }
            else{
                $vet["msg"]="Ocorreu um erro no envio do e-mail";
            }
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
                left: 37%;
                top:50px;
                font: verdana;
                font-size: 14px;
            }
        </style>
    </head>    
    <body>
        <?php require_once '../modulos/menu.php'; ?>
        <div id="cadastro" align="center">
            Informe seu e-mail abaixo para enviarmos sua senha:<br /><br />
            <form name="formulario" id="formulario" action="esqueci_senha.php" method="post">
                E-mail: <input type="text" name="email" id="email"><br /><br />
                <input type="submit" />
            </form>
            <?=(isset($vet["msg"])?$vet["msg"]:"")?>
        </div>
    </body>
</html>