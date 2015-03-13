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
        </style>
    </head>    
    
    <body>
        <?php
            require_once '../model/post.php';
            require_once '../model/usuario.php';

            $usuario = new UsuarioModel();
            $post = new PostModel();
            $vet = $post->carregarPosts();
            if($vet["linhas"] > 0){
                while($resultado = $vet["sql"]->fetch(PDO::FETCH_ASSOC)){
                    $post->setTitulo($resultado["titulo"]);
                    $post->setDescricao($resultado["descricao"]);
                    $post->setTags($resultado["tags"]);
                    $post->setDataPost($resultado["data_post"]);

                    $usuario->setNome($resultado["nome"]);
                    $usuario->setEmail($resultado["email"]);
                    $usuario->setFoto($resultado["foto"]);
        ?>
        <table id="tabela" width="100%" align="center">
            <tr  height="50">
                <td>
                    <?php
                        require_once '../plugin/menu.php';
                    ?>
                </td>
            </tr>
            <tr height="50">
                <td colspan="2" align="center">
                    <img src="../fotos/<?=$usuario->getFoto()?>" width="150" height="150">
                </td>
            </tr>
            <tr height="50">
                <td align="center">
                    <?=$usuario->getNome()?>
                </td>
                <td align="center">
                    <?=$post->getDataPost()?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <?=$post->getTitulo()?><br /><br />
                    <?=$post->getDescricao()?>
                </td>
            </tr>
        </table>
        <?php
                }
            }
        ?>
    </body>
</html>