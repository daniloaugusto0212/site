<?php
    if(isset($_GET['logout'])){
        Painel::logout();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Painel de controle</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo INCLUDE_PATH; ?>estilo/css/all.css" rel="stylesheet"> <!--load all styles -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH_PAINEL ?>css/style.css">
</head>
<body>
<div class="menu">
    <div class="menu-wraper">
        <div class="box-usuario">
        <?php
            if($_SESSION['img'] == ''){              
        ?>
            <div class="avatar-usuario">
                <i class="fa fa-user"></i>
            </div><!--avatar-usuario-->
        <?php }else{ ?>
            <div class="imagem-usuario">
            <img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img'];?>">
        <?php } ?>
        </div><!--imagem-usuario-->
            <div class="nome-usuario">
                <p><?php echo $_SESSION['nome']; ?></p>
                <p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
            </div><!--nome-usuario-->        
        </div><!--box-usuario-->
    <div class="items-menu">
        <h2>Cadastro</h2>
        <a <?php selecionadoMenu('cadastrar-depoimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>cadastrar-depoimento">Cadastrar Depoimento</a>
        <a <?php selecionadoMenu('cadastrar-servico'); ?> href="">Cadastrar Serviço</a>
        <a <?php selecionadoMenu('cadastrar-slides'); ?> href="">Cadastrar Slides</a>
        <h2>Gestão</h2>
        <a <?php selecionadoMenu('listar-depoimentos'); ?> href="">Listar Depoimentos</a>
        <a <?php selecionadoMenu('listar-servicos'); ?> href="">Listar Serviços</a>
        <a <?php selecionadoMenu('listar-slides'); ?> href="">Listar Slides</a>
        <h2>Administração do Painel</h2>
        <a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL?>editar-usuario">Editar Usuário</a>
        <a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL?>adicionar-usuario">Adicionar Usuário</a>
        <h2>Configuração Geral</h2>
        <a <?php selecionadoMenu('editar-site'); ?> href="">Editar Site</a>
    </div><!--items-menu-->
    </div><!--menu-wraper-->
</div><!--menu-->

<header>
    <div class="center">
        <div class="menu-btn">
            <i class="fa fa-bars"></i>
        </div><!--menu-btn-->
       
        <div class="logout">
            <a href="<?php echo INCLUDE_PATH_PAINEL ?>"><i class="fas fa-home"></i><span>Página Inicial </span>  </a>
            
            <a href="<?php echo INCLUDE_PATH_PAINEL ?>?logout"><span>Sair </span><i class="fas fa-sign-out-alt"></i></a>
        </div><!--logout-->
        <div class="clear"></div><!--clear-->
    </div><!--center-->
</header>
<div class="content">

    <?php Painel::carregarPagina(); ?>

    
</div><!--content-->
<script src="<?php echo INCLUDE_PATH ?>js/jquery.js"></script>   
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>


