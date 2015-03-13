<html>
    <head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#botao_enviar").click(function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: $(this).parent("form").attr("action"),
                        data:'email='+$("#email").val(),
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
            nav{
                position: absolute;
                left: 45%;
            }
            #cadastro{
                position: absolute;
                left: 37%;
                top:50px;
            }
        </style>
    </head>    
    <body>
        <?php require_once '../plugin/menu.php'; ?>
        <div id="cadastro" align="center">
            Informe seu e-mail abaixo para enviarmos sua senha:<br /><br />
            <form action="../dao/esqueci_senha.php" method="post">
                E-mail: <input type="text" name="email" id="email"><br /><br />
                <input type="submit" id="botao_enviar" value="Enviar Senha" />
            </form>
            <div id="msg"></div>
        </div>
    </body>
</html>