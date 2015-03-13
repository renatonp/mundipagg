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
elseif($_SERVER["REQUEST_URI"]=="/mundipagg/view/principal.php"){
    $menu->setPerfil("/mundipagg/view/editar_perfil.php");
    $menu->setPost("/mundipagg/view/novo_topico.php");
    $menu->setLogout("/mundipagg/view/logout.php");
    $menu->setOPcoes("<li><a href='".$menu->getPerfil()."'>Editar Perfil</a></li>;<li><a href='".$menu->getPost()."'>Novo T&oacute;pico</a></li>;<li><a href='".$menu->getLogout()."'>Sair</a></li>;");
}
elseif($_SERVER["REQUEST_URI"]=="/mundipagg/view/editar_perfil.php"){
    $menu->setPrincipal("/mundipagg/view/principal.php");
    $menu->setPost("/mundipagg/view/novo_topico.php");
    $menu->setLogout("/mundipagg/view/logout.php");
    $menu->setOPcoes("<li><a href='".$menu->getPrincipal()."'>Inicio</a></li>;<li><a href='".$menu->getPost()."'>Novo T&oacute;pico</a></li>;<li><a href='".$menu->getLogout()."'>Sair</a></li>;");
}
elseif($_SERVER["REQUEST_URI"]=="/mundipagg/view/esqueci_senha.php"){
    $menu->setLogin("/mundipagg/view/login.php");
    $menu->setOPcoes("<li><a href='".$menu->getLogin()."'>Login</a></li>");
}
elseif($_SERVER["REQUEST_URI"]=="/mundipagg/view/novo_topico.php"){
    $menu->setPrincipal("/mundipagg/view/principal.php");
    $menu->setLogout("/mundipagg/view/logout.php");
    $menu->setOPcoes("<li><a href='".$menu->getPrincipal()."'>Inicio</a></li>;<li><a href='".$menu->getLogout()."'>Sair</a></li>;");
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