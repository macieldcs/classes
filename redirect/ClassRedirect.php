<?php

/**
* @class: ClassRedirect
* @author: Macieldcs | macieldcs@gmail.com
* @version: 1.0
* data de criaão 21/04/2021
*/





namespace DirClass\redirect;


class ClassRedirect
{
    
    
    
    
    
    /**
    * METODO DE REDIRECIONAMENTO 1
    * @param string | mensagem de redirecionamento
    * @param int    | tempo de mensagem de redirecionamento
    * @param string | destino url
    */
    public function redirectReturn($ms1   = "ok", 
                              $temp1 = 3,  
                              $url1  = "javascript:history.go(-1)") 
    {
        
        
        if ( isset( $_SERVER['HTTP_REFERER'] ) ) {
           $url1 = $_SERVER['HTTP_REFERER'];
        }
        echo $ms1 . '<meta http-equiv="refresh" content="'.$temp1.', url='.$url1.'"/>';
        }
    
    
    
    
    /**
    * METODO DE REDIRECIONAMENTO 2
    * @param string | mensagem de redirecionamento
    * @param int    | tempo de mensagem de redirecionamento
    * @param string | destino url
    */
    public function redirectAll($ms2, $temp2, $url2) // opcional
    {
      echo $ms2 . '<meta http-equiv="refresh" content="'.$temp2.', url='.$url2.'"/>';
    }
    
   
    
    
    
}

