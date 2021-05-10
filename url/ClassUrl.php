<?php

/**
* @class: ClassUrl
* @author: Macieldcs | macieldcs@gmail.com
* @version: 1.0
* data de criação 21/04/2021
*/




namespace DirClass\url;




class ClassUrl
{
    
    
    // @var string | pega o valor do GET
    private $get_url    = null;
    
    // @var string | pega o valor do GET
    private $explode_url = null;
    
    
    
    
    
    /**
    * @param string | valor do GET*/
    public function urlFriendly($url,
                                $page_home = "home",
                                $page_404  = "404",
                                $path = []
                               )
    {
        
        
        // pega  o valor da url que é igual ao htaccess 
        $this->get_url = (isset($_GET[$url]) ? $_GET[$url] : "home");
                    
                    // explode a var de url e a tranforma em uma array
                    $this->explode_url = explode("/", $this->get_url);
        
        
        // erro de pagina 404
        $erro_404 = FALSE;
        if(isset($this->get_url)) {
        foreach($path as $folders) {
            
            if(!$erro_404 && file_exists($folders . DIRECTORY_SEPARATOR . $this->explode_url[0] . ".php")) {
                
                $erro_404=TRUE;
                
                return $folders . DIRECTORY_SEPARATOR . $this->explode_url[0] . ".php";
            }
            
        }
                    
        } if(!$erro_404) {
            
            return $path[0]  . DIRECTORY_SEPARATOR  . $page_404 .".php";
            
        }
        
        
        
       
    }
    
}
