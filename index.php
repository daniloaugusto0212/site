<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Projeto 01</title>
    <link href="<?php echo INCLUDE_PATH; ?>estilo/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,700&display=swap" rel="stylesheet">
    <link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="palavras-chave,do,meu,site">
    <meta name="description" content="Descrição do meu site">
    <link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon"/>    
    <meta charset="UTF-8">   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
</head>
<body>         
<base base="<?php echo INCLUDE_PATH; ?>" />
    <?php
        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        switch ($url) {
            case 'depoimentos':
                echo '<target target="depoimentos"  />';
                break;

            case 'servicos':
                echo '<target target="servicos"  />';
                break;            
        }

    ?>
    <div class="sucesso">Formulário enviado com sucesso!</div><!--sucesso-->
    <div class="overlay-loading">
        <img src="<?php echo INCLUDE_PATH ?>images/ajax-loader.gif" />
        </div> <!--overlay-loading-->              
    <header>
        <div class="center">            
            <div class="logo left"><a href="/" ><img src="images/logo_sitedan.png" width="150px%" alt=""></a></div><!--logo-->
            <nav class="desktop right">
                <ul>
                <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
                </ul>        
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile"><i class="fas fa-arrow-alt-circle-down"></i></div>
                <ul>
                <li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Depoimentos</a></li>
                <li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
                <li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>                
                </ul>        
            </nav>
        <div class='clear'></div>
        </div><!--center-->

    </header>

    <div class="container-principal">
    <?php
        if (file_exists('pages/'.$url.'.php')) {
            include('pages/'.$url.'.php');
        }else{
            if ($url != 'depoimentos' && $url != 'servicos') {
                //Podemos fazer o que quiser, pois a página não existe
                $pagina404 = true;
                include('pages/404.php');
            }else{
                include('pages/home.php');
            }    
        }           
   ?>
   </div><!--container-principal-->          

    <footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"';?>>
        <div class="center">
            <p>Todo os direitos reservados</p>
        </div><!--center-->
    </footer >
    <script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzasyDHPNqxozOzQSZ-djvWGOBUsHkBUoT_qH4'></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
    <?php
        if ($url == 'home' || $url == '') {
            
    ?>
    <script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
        <?php } ?>
    <?php
        if($url == 'contato'){
    ?>
    <?php }?>
    <script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>
    <script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
    
</body>
</html>



