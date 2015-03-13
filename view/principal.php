<?php
session_start();
if(isset($_SESSION["usuario"])){
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
    <?php
    require_once '../plugin/menu.php';
    ?>
</html>
<?php
}
else{
    echo"N&atilde;o foi feito ligin no site! <a href='../index.php'>voltar</a>";
}
?>