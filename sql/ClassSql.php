<?php

/**
* @class: ClassSql
* @author: Macieldcs | macieldcs@gmail.com
* @version: 1.0
* data de criaão 21/04/2021
*/






namespace DirClass\sql;




class ClassSql extends \DirClass\conn\ClassConn
{
    
    
    
    // @var string  |  inicia a connexao
    private $conn = NULL;
    
    // @var string  |  inicia uma consulta
    private $sql1 = NULL;
    
    // @var string  | inicia uma filta uma consulta especifica 
    private $sql2 = NULL;
    
    
    
    
    // @var array
    private $file_name;
    
    // @var array | nome do arquivo
    private $file_name_size;
    
    // @var array | tipo de arquivo
    private $file_name_type;
    
    // @var int   | tamanho maximo do arquivo
    private $file_size_max;
    
    // @var array | tipos de imagem
    private $file_array_types;
    
    // @var string | diretorios das imagens
    
    private $dir_image;
    
    // @var string | novo arquivo
    private $new_file;
    
    
    
    
    // @var string  |  define a consulta
    private $sql3;
    
    // @var string  |  nome de usuario
    private $name_user;
    
    // @var string  |  senha  de usuario
    private $password;
    
    
    
    // metodo usuario connectado
    // @var string  | inicia uma consulta 
    private $sql_init_session = NULL;
    
    // @var string  | nome de usuario connectado
    private $field_user_session = NULL;
    
    
    /// @var string | inicia consulta
    public $getInit = null;
    
   
    // metodo paginacao de resultados
    // @var int | pagina 
    private $pag;
    
    ///  @var int |  numero total de registros por paginas 
    private $total_pg;
    
    // @var int | total de links 
    private $max_links;
    
    // @var null | inicia o linite 
    private $init;
    
    // @var null | inicia a conexão herdada 
    private $sql;
    
    // @var string |  campo search
    private $search_filed;
    
    
    
    
    
    /** METODO DE CONSULTA GERAL 
    * @param $string | string -> consulta */
    public function sqlAll($string)
    {
       // $this->conn = $this->conn();
        $this->sql1 = parent::conn()->query($string);
        return $this->sql1; 
    }
    
    
    
    
    /** METODO DE CONSULTA  COM FILTRO COM LIMITADA
    * @param  string | campos da consulta 
    * @param  string | tabela da consulta 
    * @param  string | campo ordernar tabela 
    * @param  string |  ordernar tabela DES/ASC 
    * @param  string | limitar consulta */
    
    public function sqlSelect($fields = "*",
                              $table1,
                              $field,
                              $order = "DESC",
                              $limit = ""
                             )
    {
        
        $this->sql2 = $this->sqlAll(
        "SELECT {$fields} FROM {$table1} ORDER BY {$field} {$order} {$limit}");
        return $this->sql2; 
    }
    
    
    
    
    
    /** METODO DE INSERRIR REGISTRO COM IMAGEM 
    * @param  string | nome do aquivo 
    * @param  string | nome da tabela
    * @param  string | campos da da tabela
    * @param  string | campos do formulario
    * @param  string | caminho/pasta destino dos arquivos enviados
    * @param  array  | campos da consulta 
    * @param  int    | campos da consulta */
     public function sqlInsert(
        $file, 
        $table2, 
        $fields1, 
        $fields2,
        $folder_image = "apps/public/pages/my-account/users-images/",
        $types        = array ('image/jpg','image/png','image/jpeg','image/gif'),
        $max_size     = 2073600,
        $mesages = [
            'Campo vazio!',
            'Arquivo muito grande!',
            'Arquivo invalido!',
            'Cadastro realizado com sucess...',
            'Falha do cadastro!',4
        ]
                              )
    {
        
        $this->file_name          = $_FILES[$file]['name'];
        $this->file_name_size     = $_FILES[$file]['size'];
        $this->file_name_type     = $_FILES[$file]['type'];
        $this->file_array_types   = $types;
        $this->file_size_max      = $max_size;
        $this->dir_image          = $folder_image;
        
       
        
        // muda nome do arquivo
        $ext1     = explode('.', $this->file_name);
        $ext2     = end($ext1);
        $this->new_file = "file_" . rand() . "." . $ext2;
        
         
    if(empty($this->file_name)){
                
    $class_redirect = new \DirClass\redirect\ClassRedirect;
    $class_redirect->redirectReturn($mesages[0],
                                   $mesages[5]);     
             
         }else
         
        if($this->file_name_size >  $this->file_size_max){
            
           $class_redirect = new \DirClass\redirect\ClassRedirect;
          $class_redirect->redirectReturn($mesages[1],
                                   $mesages[5]);
            
        }else 
        if( array_search( $this->file_name_type, $this->file_array_types ) 
           === false){
        
           $class_redirect = new \DirClass\redirect\ClassRedirect;
    $class_redirect->redirectReturn($mesages[2],
                                   $mesages[5]);
            
        }else{
            
        $upload_validate=move_uploaded_file($_FILES[$file]['tmp_name'], 
        $this->dir_image . $this->new_file);
        
        
        $this->sql3 = $this->sqlAll("INSERT INTO {$table2} 
        ({$fields1}) VALUES 
        ({$fields2},'$this->new_file')");
    
         
        
        
        
       
        
        
        if($upload_validate && $this->sql3){
            
    
    $class_redirect = new \DirClass\redirect\ClassRedirect;
    $class_redirect->redirectReturn($mesages[3],
                                   $mesages[5]);        
            
        }else{
           
       
     $class_redirect = new \DirClass\redirect\ClassRedirect;
     $class_redirect->redirectReturn($mesages[4],
                                   $mesages[5]);             
   
            
        }
        }
         
        
       
    }
    
    
    
    
    
    /**
    * @param string | nome da tabela
    * @param string | nome de usuario
    * @param string | senha de usuario
    * @param array | mensagens */
    public function sqlLogin($table3,
                             $name_usuario,
                             $senha,
                             $mesages_login=[
                             'Login realizado com sucesso...',
                             'Falha no login!',
                                 3]
                            )
    {
        
        
        // dados do formularios
        $this->name_user= filter_input(INPUT_POST, 
                                       $name_usuario , FILTER_DEFAULT);
        $this->password = sha1($_POST[$senha]);
        
        // faz uma consulta a tabela indicda no primeiro param
        $this->sql3 = $this->sqlAll("SELECT * FROM {$table3} WHERE 
        {$name_usuario} = '$this->name_user' AND {$senha} = '$this->password'");
        
        // conta os registros da tabela 
        $count_sql2 = $this->sql3->rowCount();
        
        
        
        if($count_sql2 > 0 ) {
            
           // abre uma sessao
            @session_start();
            @session_unset($_SESSION[$name_usuario]);
            @session_destroy();
            @session_start();
            $_SESSION[$name_usuario] = $this->name_user;
            $_SESSION[$senha]        = $this->password;
       
       // redireciona, retornando 
       $class_redirect = new \DirClass\redirect\ClassRedirect;
       $class_redirect->redirectReturn($mesages_login[0],
                                      $mesages_login[2]);
       
            // se nao existir um usuario no bando
            // e uma sessao aberta
            // fecha a sessao anterior
        } else if($count_sql2 > 0 && 
                  isset($_SESSION[$name_usuario]) && 
                  isset($_SESSION[$senha])){
         
            @session_start();
            @session_unset($_SESSION[$name_usuario]);
            @session_destroy();
            
            
            // redireciona, retornando     
      $class_redirect = new \DirClass\redirect\ClassRedirect;
      $class_redirect->redirectReturn('',
                                  0);
           
        } else {
            
            // se nao existir um usuario no bando 
            // retorna para anterior
            // redireciona, retornando     
      $class_redirect = new \DirClass\redirect\ClassRedirect;
      $class_redirect->redirectReturn( $mesages_login[1],
                                      $mesages_login[2]);
        }
    }
    
    
    
    
    /**
    * @param string | nome de usuario
    * @param string | senha de usuario
    * @param array | mensagens */
    public function sqlLogout($name_usuario_logout,
                              $name_senha_logout,
                              $mesages_logout=[
                                  'Saindo...',
                                  4
                              ])
    {
        
        // se existir uma sessao de usuario e senha aberta
        // continuar o bloco
        @session_start();
        if(isset( $_SESSION[$name_usuario_logout] ) 
        && isset( $_SESSION[$name_senha_logout] ) ){
            
            // abre novamente, limpa e fecha 
            // a sessao
            
            @session_unset($_SESSION[$name_usuario_logout]);
            @session_destroy();
            @session_start(); 
            
            // redireciona para pagina anterior
            $class_redirect = new \DirClass\redirect\ClassRedirect;
            $class_redirect->redirectReturn($mesages_logout[0],
                                           $mesages_logout[1]);
        }
    }
    
    
    
    
     /**
    * @param string  | nome da tabela
    * @param string  | nome de usuario connectado */
    public function sqlConnectedUser($table_session, $user_connected)
    {
        
        // nome de usuario connectado
        $this->field_user_session = $_SESSION[$user_connected];
        // faz a consulta
        $this->sql_init_session = $this->sqlAll("
        SELECT * FROM {$table_session} WHERE 
        {$user_connected} = '$this->field_user_session'");
        
        // retorna a consulta
        return $this->sql_init_session;
    }
    
    
    
    
    
     /**
    * METODO DE GET CONSULTA
    * @param string | nome da tabela
    * @param string | nome de usuario
    * @param int   | url do htaccess que substitui o id de usuario */
    public function sqlGetPage($table_get, // nome da tabela 
                               $id_get,   // id da tabela
                               $getUrl   // valor da url usando URL amigavel
                              ) 
    {
        $get = addslashes($_GET[$getUrl]);
        $this->getInit =
        $this->sqlAll("SELECT * FROM {$table_get} WHERE
        {$id_get} = {$get}");
        return $this->getInit;
    }
    
    
    
    
    
     
    /**
    * METODO PAGINAS
    * @param string | valor da url
    * @param int    | numero de registros por paginas
    * @param string | tabela
    * @param int    | d da tabela
    * @param string | ordenar os resultados , campo opcional */
    public function sqlPages($url,
                             $table,
                             $title,
                             $id,
                             $order = "ASC",
                             $num_pg)
    {
        
    
        $this->pag = filter_input(INPUT_GET, $url , FILTER_VALIDATE_INT);
        
        $this->pag = (isset($this->pag)) ? (int)$this->pag : 1;
        
        
        
        $this->total_pg = $num_pg;
        $this->init = ($this->total_pg * $this->pag)-$this->total_pg;
        $this->search_filed = 
        filter_input(INPUT_POST, $title , FILTER_DEFAULT);
       // Faz a consulta limitada
        $sql_pages = $this->sqlAll(
        "SELECT * FROM {$table} WHERE  
        {$title} LIKE 
        '%".$this->search_filed."%' 
        ORDER BY {$id} {$order} 
        LIMIT $this->init, $this->total_pg");
        return $sql_pages;
        /** @return | retorna  a consulta */
        //return $sql_pages;
        
    }
    
    
    
    
    
    
    /**
    * @param int    | Maximo de linkas
    * @param string | Nome da tabela
    * @param array  | um array com elementos dos links */
    public function sqlRender($url,
                              $num_links = 4, 
                              $table,
                              $bts = array('&laquo;',
                                           'Primeiro',
                                           'Último',
                                           '&raquo;')
                              )
                                {
      
        // Totol de links
        $this->max_links = $num_links;
        
        // Faz a consulta completa
        $sql_links = $this->sqlAll("SELECT * FROM {$table}");
        // conta os registros
        $count_rg = $sql_links->rowCount();
        // arredonda os registros para cima
        $total_ceil = ceil($count_rg/$this->total_pg);
        
       
       
        echo '<a href="'. $url .'1">'.$bts[0].' '.$bts[1].'</a>';
         
        for ($x = $this->pag-$this->max_links;
             $x <= $this->pag-1; 
             $x++) {
            
            if ($x <= 0) {
              
            }else{
                
                
                echo '<a href="'. $url .''.$x.'">'.$x.'</a>'; 
            }
            
        }
        echo '<span>'.$this->pag.'</span>';
        
        
        for ($i=$this->pag+1;
            $i <= $this->pag + $this->max_links;
            $i++) {
            
            if ($i > $total_ceil) {
                
               
            }else{
                 echo '<a href="'. $url .''.$i.'">'.$i.'</a>'; 
            }
        }
        echo '<a href="'. $url .''.$total_ceil.'">'.$bts[2].' '.$bts[3].'</a>';
        
        
       
        
        
    }
    
    
    
    
     /**
    * @param string | nome de usuario
    * @param string | senha  de usuario
    * @param string  | pagina destino */
    public function sqlVerifyUser($user_vefify, $password_vefify, $page)
    {
        if( !isset($_SESSION[$user_vefify]) || 
          !isset($_SESSION[$password_vefify])) {
            
            header("location: {$page}");
            exit();
            
        }
    }
    
    
    
    
    
    
    /// public function sqlEmail()
    /// {}
    
    
    
    
    
   
    
    
    
    
    
   
  

    
    
}
