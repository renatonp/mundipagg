<?php
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
echo $vet["msg"];
?>