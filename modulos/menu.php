<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/mundipagg/model/menu.php';
$menu = new Menu();
if($_SERVER["REQUEST_URI"]=="/mundipagg/" || $_SERVER["REQUEST_URI"]=="/mundipagg/index.php"){
    $menu->setCadastrarUsuario("/mundipagg/view/cadastrar_usuario.php");
    $menu->setLogin("/mundipagg/view/login.php");
    $menu->setOPcoes("<li><a href='".$menu->getCadastrarUsuario()."'>Cadastrar</a></li>;<li><a href='".$menu->getLogin()."'>Login</a></li>");
}
elseif($_SERVER["REQUEST_URI"]=="/mundipagg/view/cadastrar_usuario.php"){
    $menu->setIndex("/mundipagg/index.php");
    $menu->setLogin("/mundipagg/view/login.php");
    $menu->setOPcoes("<li><a href='".$menu->getindex()."'>HOME</a></li>;<li><a href='".$menu->getLogin()."'>Login</a></li>");
}
elseif($_SERVER["REQUEST_URI"]=="/mundipagg/view/login.php"){
    $menu->setIndex("/mundipagg/index.php");
    $menu->setCadastrarUsuario("/mundipagg/view/cadastrar_usuario.php");
    $menu->setOPcoes("<li><a href='".$menu->getindex()."'>HOME</a></li>;<li><a href='".$menu->getCadastrarUsuario()."'>Cadastrar</a></li>");
    
}
$opcoes = explode(';', $menu->getOpcoes());
?>
 <nav>
    <ul class="nav nav-pills">
        <?php
            foreach($opcoes as $opcao){
                echo $opcao;
            }
            ?>
    </ul>
</nav>