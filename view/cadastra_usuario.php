<?php
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST"){
    $usuario_email = explode("@", strtolower($_POST["email"]));
    require_once '../model/usuario.php';
    $usuario = new UsuarioModel();
    $vet = $usuario->verificarUsuarioCadastrado($_POST['email']);
    if($vet["linhas"] == 0){
        $vet = $usuario->cadastrarUsuario($_POST);
        $pathname = $_SERVER["DOCUMENT_ROOT"]."/mundipagg/fotos/".$usuario_email[0];
        if(!is_dir($pathname)){
            mkdir($pathname,0777);
        }
    }
}
?>
<html>
    <head>
        <title>Cadastro de Usu&aacute;rio</title>
    </head>
    
    <body>
        <div id="cadastro" align="center">
            <form name="formulario" id="formulario" action="cadastra_usuario.php" method="post" ectype="multipart/form-data">
                Nome: <input type="text" name="nome" id="nome"><br />
                E-mail: <input type="text" name="email" id="email"><br />
                Senha: <input type="password" name="senha" id="senha"><br /><br />
                <input type="submit" />
            </form>
            <?=(isset($vet["msg"])?$vet["msg"]:"")?>
        </div>
    </body>
</html>