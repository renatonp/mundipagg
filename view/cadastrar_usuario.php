<html>
    <head>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#botao_enviar").click(function(event) {
                    event.preventDefault();
                    if($("#nome").val() != "" && $("#email").val() != "" && $("#senha").val() != ""){
                        $.ajax({
                            url: $(this).parent("form").attr("action"),
                            data:'nome='+$("#nome").val() + '&email='+$("#email").val() + '&senha='+$("#senha").val(),
                            type: 'POST',
                            context: jQuery('#msg'),
                            success: function(data){
                                this.append(data);
                                $('#msg').html(data);
                                $("#nome").val("");
                                $("#email").val("");
                                $("#senha").val("");
                            }
                        });
                    }
                    else{
                        alert("Todos os campos devem ser preenchidos!")
                    }
                });
            });
        </script>
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
            <form action="../dao/cadastrar_usuario.php" method="post">
                Nome: <input type="text" name="nome" id="nome"><br />
                E-mail: <input type="text" name="email" id="email"><br />
                Senha: <input type="password" name="senha" id="senha"><br /><br />
                <input type="submit" id="botao_enviar" />
            </form>
            <div id="msg"></div>
        </div>
    </body>
</html>