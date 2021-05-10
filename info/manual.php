<?php



/** MANUAL DAS CLASSES ----------------------------------------------------

ClassConn             => conn


ClassUrl              => urlFriendly


                         layoutOpenHtml
ClassLayout           => layoutCloseHtml



                         sqlAll 
                         sqlInsert
                         sqlSelect
                         sqlLogin
 ClassSql            =>  sqlLogout
                         sqlVerifyUser
                         sqlConnectedUser
                         sqlGetPage
                         sqlPages
                         sqlRender
                         
                   
                   
                   
                         redirectReturn
ClassRedirect        =>  redirectAll
                   
                   
ClassFunctionsString =>  criaResumo 
                         removeCaracteres
                         
                         
ClassEmail           =>  emailMessage                           
                   
                
            
                
                
----------------------------------CLASSE CONN ----------------------------------------
 $class_conn = new \DirClass\conn\ClassConn;
 $class_conn->conn();
-----------------------------------CLASSE URL---------------------------------------
$class_url = new \DirClass\url\ClassUrl;

require ($class_url->urlFriendly("url", // valor do GET
                        "home", // pagina principal
                        "404",  // pagina erro 404
                        
                        // array com os caminhos das pagina/e arquivos
                        $path = [
                        "app/public/pages/all-pages",
                        "app/public/pages/my-account",
                        "app/public/pages/my-adm",
                        "app/public/request",
                        
                        ]
                        ));
-----------------------------------CLASSE LAYOUT------------------------------------

$class_layout   = new \DirClass\layout\ClassLayout;
$class_layout->layoutOpenHtml(
               $title       = "Título do site",
               $description = "Descricao do site",
               $keys        = "palavras chaves",
               $fonts       = "fontes",
               $base_site   = "http://localhost/site-texte/",
               $idioma      = "en",
               $path_css = [
                    'app/public/source/styls/style-gl'
                                ]
                );
                
$class_layout->layoutCloseHtml(
                    $path_js  = [
        'app/public/source/scripts/jquery-carousel-lite/jcarousellite',
        'app/public/source/scripts/mask/jquery.mask.min',
        'app/public/source/scripts/mask/masks',
        'app/public/source/scripts/pre-view-imgs/view-img',
        'app/public/source/scripts/print-content/print',
        'app/public/source/scripts/share/share',
        'app/public/source/scripts/states-and-cities/states-and-cities',
        'app/public/source/scripts/functions/functions',
        'app/public/source/scripts/functions/jquery-ajax',
        'app/public/source/scripts/functions/jquery-affects',
        'app/public/source/scripts/ckeditor/build/ckeditor',
        'app/public/source/scripts/ckeditor/config'
                                ]);
                                
------------------------------- CLASSE SQL ---------------------------------------
$class_sql = new \DirClass\sql\ClassSql;
$class_sql->sqlAll("SELECT * FROM tabela");

$class_sql->$class_sql->sqlSelect(
                      "*",       // campos da tabela padrão/*
                      "artigos", // nome da tabela
                      "id_art",  // campo order by
                      "DESC",    // ordernção padrão/ASC ASC/ou DESC
                      "LIMIT 0,5"// limit dos registros padrão/ deixar vazio 
                      );
                      
                      
                      
$class_sql->sqlInsert(
        'foto',                         // nome do arquivo 
        'pessoas',                      // tabela
        "nome, email, senha, foto",     // campos do banco 
        "'$nome','$email','$senhaNew'", // campos do form
        
        
        
        // pasta/diretorio das imagens
        $folder_image  = "app/public/pages/my-account/users-images/",
        
        
        
        
        // tios de arquivos permitidos
        $types         = array ('image/jpg','image/png','image/jpeg','image/gif'),
        $max_size      = 1920 * 1080, // tamanho maximo do arquivo
        
        
        // menssagens
        $mesages = [
        'Campo vazio!',
        'Arquivo muito grande!',
        'Arquivo invalido!',
        'Cadastro realizado com sucesso...',
        'Falha do cadastro!',3]
                              );
 
 
 

$class_sql->sqlLogin("pessoas", // nome da tabela
                     "nome", // nome de usuario
                     "senha", // senha de usuario 
                     $mesages_login=[
                     'Login realizado com sucesso...', // mensage de login vadid
                     'Falha no login!',  // mensage de login invadid
                     3  // tempo de redirecionamento
                     ]
                     );



$class_sql->sqlLogout("nome", // nome de usuario
                      "senha", // senha de usuario
                        
                        // mensagens
                      $mesages_logout =[
                      'Saindo...', // menssage de confirmacao
                        4           // tempo do redirecionamento
                     ]);
                     
$sql = $class_sql->sqlConnectedUser('pessoas','nome'); // nome da tabela e usuario
 
 
$class_sql->sqlGetPage(
                    'artigos', // nome ta tabela 
                    'id_art',  // id da tabela
                     "b"      // valor da url get
                          );
            
            
$class_sql->sqlVerifyUser("usuario", // nome de usuario 
                          'senha',   // senha e usuario 
                          'home' // pagina destino
                         );
                          
                          
                          
                          
<?php
// metodo do htaccess que tira erro


$sql = $class_sql->sqlPages(
                       'b',       // Valor do GET (padrao htaccess b)
                       'artigos', // nome da tabela
                       'titulo', // campo de busca
                       'id_art', // id da tabela
                       $order = "ASC", // orden do dos registros ASC/ ou DESC
                       12);    // quantidades de registros por paginas 

$count = $sql->rowCount();
if($count>0){
while($linha = $sql->fetch(\PDO::FETCH_ASSOC)){
    
    echo $linha['titulo']."<br>";
}
?>





<div class="nav">
    <div class="btns">
<?php
        $class_sql->sqlRender(
               SITE['URL'], // url do site/pagina/ no arquivo config
               4,          //numero de links (padrao 4, dois em cada lada)
               'artigos',  // nome da tabela
               // array de links
               $bts = array('&laquo;',
               'Primeiro',
               'Último',
               '&raquo;')
                );
?>
    </div>
</div>


 <?php
}else{
echo "Nada encontrado!";
}
?> 





-----------------------------   CLASSE DE REDIRECT ------------------------------
$class_redirect = new \DirClass\redirect\ClassRedirect;
$class_redirect->redirectReturn('mensagem',4);
$class_redirect->redirectAll('mensagem',4, 'home.php');
--------------------------------- CLASSE FUNCAO STRUNG --------------------   $class_functions_string = new \SourceClass\strings\ClassFunctionsString;
$class_functions_string->criaResumo($string,400);
$class_functions_string->removeCaracteres('abc_d');

------------------------------ CLASSE EMAIL ---------------------------------
$class_email = new ClassEmail;

$class_email->emailMessage(
             "email",      // nome do email 
             "assunto",    // assunto da mensagem
             'mensagem',   // mensagem
             
             // redirecionamentos
             $ms = [
             "Mensagem enviada com sucesso...",
             "Falha no envio da menssagem!",
             4 ]
                         );
                   
                        
                        
                        
*/