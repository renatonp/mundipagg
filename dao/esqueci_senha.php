<?php
// carrega o conteúdo das classes de apoio
require_once '../model/senha.php';
$senha = new SenhaModel(); // define o objeto da clase SenhaModel
$senha->setEmailOrigem("rnpenna@gmail.com"); // seta o valor do email de origem
$senha->setEmailDestino($_POST["email"]); // seta o valor do email de destino
$vet = $senha->enviarSenha(); // pega a senha d usuário

// se o usuário ão for cadastrado no site, dá o alerta
// senão, pega a senha deste usuário
if($vet["linhas"] == 0){
    $vet["msg"]="E-mail n&atilde;o cadastrado!";
}
else{
    while($resultado = $vet["sql"]->fetch(PDO::FETCH_ASSOC))
    {
        $senha->setSenha($resultado["senha"]);
    }
    
    // define o assnto e a mensagem do email
    $senha->setAssunto("Envio de e-mail");
    $senha->setMensagem("Sua senha no blog &eacute; ".$senha->getSenha());

    // se conseguiu mandar o e-mail avisa ao usuário
    // senão, informa que houve um erro no envio
    if($senha->mandarEmail()){
        $vet["msg"]="A senha foi enviada para o seu e-mail";
    }
    else{
        $vet["msg"]="Ocorreu um erro no envio do e-mail";
    }
}
echo $vet["msg"];
?>