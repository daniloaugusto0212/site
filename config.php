<?php

    session_start();
    date_default_timezone_set('America/Sao_Paulo');
   $autoload = function($class){
        if($class == 'Email'){
          include_once('classes/phpmailer/PHPMailerAutoload.php');  
        }
        include('classes/'.$class.'.php');
        
   };

   spl_autoload_register($autoload);

    //Localhost 
    define('INCLUDE_PATH','http://localhost/Projeto_01/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    //Conectar com o banco de dados
    define('HOST','localhost');
    define('USER','root');
    define('PASSWORD','');
    define('DATABASE','projeto_01');

    


    //Servidor 000webostapp
   /* define('INCLUDE_PATH','http://daniloaugustocv.000webhostapp.com/Projeto_01/');

    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
    //Conectar com o banco de dados
    define('HOST','localhost');
    define('USER','id11864505_admin');
    define('PASSWORD','681015');
    define('DATABASE','id11864505_adminusuarios');*/

    define('BASE_DIR_PAINEL',__DIR__.'/painel');

    //Contantes para painel de controle
    define ('NOME_EMPRESA','Dansol');


    //Funções do painel

    function pegaCargo($cargo){
      $arr = [
        '0' => 'Normal',
        '1' => 'Sub Administrador',
        '2' => 'Administrador'];

        return $arr[$cargo];

    }

    function selecionadoMenu($par){
      $url = explode('/',@$_GET['url'])[0];
      if ($url == $par) {
        echo 'class="menu-active"';
      }
    }

    function verificaPermissaoMenu($permissao){
      if ($_SESSION['cargo'] >= $permissao) {
        return;
      }else{
        echo 'style="display:none;"';
      }
    }

    function verificaPermissaoPagina($permissao){
      if ($_SESSION['cargo'] >= $permissao) {
        return;
      }else{
        include('painel/pages/permissao_negada.php');
        die();
    }
  }
?>