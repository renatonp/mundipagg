<?php
session_start();
if(isset($_SESSION["usuario"])){
    require_once '../model/post.php';
    require_once '../model/usuario.php';
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
            #tabela{
                position: absolute;
                top:100px
            }
        </style>
    </head>    
    <body>
        <?php require_once '../plugin/menu.php'; ?>
    </body>
    <?php
    $post = new PostModel();
    $usuario = new UsuarioModel();
    $usuario->setEmail($_SESSION['usuario']);
    $pasta_usuario = explode('@', $usuario->getEmail());
    $vet_usuario = $usuario->carregarDados();
    $vet = $post->carregarPosts();
    
    if($vet_usuario['linhas'] > 0){
        while($resultado = $vet_usuario["sql"]->fetch(PDO::FETCH_ASSOC)){
            $usuario->setFoto($resultado["foto"]);
            $usuario->setId($resultado["id"]);
        }
    }
    ?>
    <table align="center" cellpadding="0" cellspacing="0" border="1" id="tabela" width="100%">
        <tr>
            <td align="center">
                <img src="<?="../fotos/".$pasta_usuario[0]."/".$usuario->getFoto()?>" wifth="150" height="150">
            </td>
        </tr>
        <tr>
            <td align="center">
                <?php
                if($vet['linhas'] > 0){
                    while($resultado = $vet["sql"]->fetch(PDO::FETCH_ASSOC)){
                        $post->setTitulo($resultado["titulo"]);
                        $post->setDescricao($resultado["descricao"]);
                        $post->setTags($resultado["tags"]);
                        $post->setDataPost($resultado["data_post"]);
                        $post->setUsuarioId($usuario->getId());
                ?>
                <table>
                    <tr height="35">
                        <td align="left" width="50%">
                            <?=$post->getDataPost()?>
                        </td>
                        <td align="right" width="50%">
                            Tags: <?=$post->getTags()?>
                        </td>
                    </tr>
                    <tr height="35">
                        <td align="center" colspan="2">
                            <P><strong><?=$post->getTitulo()?></strong></P>
                        </td>
                    </tr>
                    <tr height="35">
                        <td align="center" colspan="2">
                            <P><?=$post->getDescricao()?></P>
                        </td>
                    </tr>
                </table>
                <hr width="100%">
                <?php
                    }
                }
                ?>
            </td>
        </tr>
    </table>
</html>
<?php
}
else{
    echo"N&atilde;o foi feito ligin no site! <a href='../index.php'>voltar</a>";
}
?>