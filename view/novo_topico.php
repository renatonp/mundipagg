<html>
    <head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#botao_enviar").click(function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: $(this).parent("form").attr("action"),
                        data:'titulo='+$("#titulo").val() + '&tags='+$("#tags").val() + '&descricao='+$("#descricao").val(),
                        type: 'POST',
                        context: jQuery('#msg'),
                        success: function(data){
                            this.append(data);
                            $('#msg').html(data);
                        },
                    });
                });
            });
        </script>        
        <style type="text/css">
            #cadastro{
                position: absolute;
                left: 30%;
                top:75px;
            }
            #menu{
                position: absolute;
                left: 670px;
            }
        </style>
    </head>
            
    <body>
        <div id="menu">
            <?php require_once '../plugin/menu.php'; ?>
        </div>
        <div id="cadastro" align="center">
            <form action="../dao/novo_topico.php" method="post">
                T&iacute;tulo: <input type="text" name="titulo" id="titulo" value="Digite o t&iacute;tulo do post aqui" onfocus="this.value=''"><br />
                Tags<input type="text" name="tags" id="tags" value="Digite as tags para o seu post aqui" onfocus="this.value=''"><br />
                Escreva as tags separadas por v&iacute;rgula<br /><br />
                Conte&uacute;do:<br /><textarea name="descricao" id="descricao" rows="25" cols="90" onfocus="this.value=''">Escreva aqui a sua publica&ccedil;&atilde;o</textarea><br /><br />
                <input type="submit" id="botao_enviar" />
            </form>
            <div id="msg"></div>
        </div>
    </body>
</html>