<?php


// DIRETORIOS ABSOLUTOS
$dir_www = $_SERVER['PHP_SELF']; // pasta\diretorio parao do site 
$dir_www = 'falandodabiblia/';  //falandodabiblia/
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$dir_www}");
if(substr($_SERVER['DOCUMENT_ROOT'], -1) == "/"){
define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$dir_www}");  
}else{ define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$dir_www}");}







/** DADOS DO BANCO */
define("DATABASE",
      [
          "DRIVER"     => "mysql",
         // 'PORTA'    => '8080',
          "CHARSET"    => "SET NAMES utf8",
          'COLLATION'  => 'utf8mb4_unicode_ci',
          "HOST"       => "127.0.0.1", // localhost
          "USER"       => "root",
          "PASSWORD"   => "",
          "DBNAME"     => "u468415527_db",
          //"HOST"     => "localhost", // localhost
          //"USER"     => "u468415527_macieldcs",
          //"PASSWORD" => "Macieldcs1204...",
          //"DBNAME"   => "u468415527_db",
          
      ]);





      // MAIS DADOS PARA O SITE
// DADOS DO CABEÇACHOS
define("SITE", [
     
    "TITULO"        => "Falando da Bíblia",
    "KEYS"          => "Deus, Bíblia sagrada, Jesus, falando da Bíblia",
    "DESCRIPTION"   => "Falando da Bíblia, site de estudos e artigos evangélicos...",
    "FONT"          => "Anton&family=Rubik:wght@300&",
    "IDIOMA"        => "pt-br",
    "PAGE1"         => "Home - Artigos mais recentes",
    "PAGE2"         => "Sobre nós",
    "PAGE3"         => "Artigos",
    "PAGE4"         => "Dawnloads",
    "PAGE5"         => "Mensagens",
    "PAGE5"         => "Fale conosco",
    "MINHA_CONTA"   => "Minha conta",
    "URL_PAGINATION_ID"  => DIRPAGE . "todos-artigos/",
    "URL_PAGINATION_ID_ADM"  => DIRPAGE . "all-articles/",
    "BASE_URL"      => DIRPAGE,
    "CSS"           => "app/public/source/styls/style-gl",
    ///"CSS2"          => "app/public/source/styls/patten"
 ]);


// DADOS DO CABEÇACHOS DOS ARQUIVOS DE MY-ADM
define("HEADER_ADM", [
    
    "TITULO"        => "Falando da Bíblia - Minha área de administrador",
    "KEYS"          => "Deus, Bíblia sagrada, Jesus, falando da Bíblia",
    "DESCRIPTION"   => "Área do administrador do site Falando da Bíblia...",
    "FONTS"          => "Anton&family=Nunito:wght@200&family=Pacifico&",
    "PAGE1"         => "Área do administrador",
    "PAGE2"         => "Adicionar artigos",
    "PAGE3"         => "Todos os artigos",
    "PAGE4"         => "",
    "PAGE5"         => "",
    "URL"           => DIRPAGE,
    "BASE_URL"      => DIRPAGE,
    "CSS"           => "app/public/source/styls/style-adm",
 ]);