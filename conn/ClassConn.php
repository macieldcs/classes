<?php

/**
* @class: ClassConn
* @author: Macieldcs | macieldcs@gmail.com
* @version: 1.0
* data de criaão 21/04/2021
*/




namespace DirClass\conn;


class ClassConn
{
    
    
    
    
    
    /** @ver string - $conn_init */
    private static $conn_init;
    
    /** @ver string - $charset_utf8  */
    private static $charset_utf8;
    
    
    
    
    
    
    /** metodo de conexao */
    public static function conn()
    {
        
      try{
          
       self::$conn_init= new \PDO("".DATABASE['DRIVER'].":host=".DATABASE['HOST']."; 
       dbname=".DATABASE['DBNAME']."", "".DATABASE['USER']."", "".DATABASE['PASSWORD']."");
         
       self::$conn_init->exec(DATABASE['CHARSET']);
       
          
      } catch (\PDOException $e) {
          
        echo "Foi gerado uma erro de:" . $e->getMessage();
          
         self::$conn_init->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
          
      }
        return self::$conn_init;
        
    }
}
