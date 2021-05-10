<?php

/**
* @class: ClassLayout
* @author: Macieldcs | macieldcs@gmail.com
* @version: 1.0
* data de criaão 21/04/2021
*/





namespace DirClass\layout;




class ClassLayout
{
    
    // @var string | abre a extrutura HTML
    private $html_open = null;
    
    // @var string | fecha a extrutura HTML
    private $html_close = null;
    
    
    
    
    
    /** metodo abre extrutura ahtml 
    * @param string | 
    * @param string | 
    * @param string | 
    * @param string | */
    public function layoutOpenHtml($title       = "Título do site",
                                   $description = "Descricao do site",
                                   $keys        = "palavras chaves",
                                   $fonts       = "fontes",
                                   $base_site   = "http://localhost/site-texte/",
                                   $idioma      = "en",
                                  $path_css = [
                                  'app/public/source/styls/style-gl',
                                   "app/public/source/styls/patten",
                                   "app/public/source/styls/style-adm"
                                    ])
    {
        
        
  $this->html_open  = '<!DOCTYPE html>' . "\r\n";
  $this->html_open .= '<html lang="' . $idioma . '">' . "\r\n";
  $this->html_open .= '<head>' . "\r\n";
  $this->html_open .= '<meta charset="UTF-8">' . "\r\n";
  $this->html_open .= '<title>'. $title .'</title>' . "\r\n";
  $this->html_open .= '<meta http-equiv="Content-type" content="text/html; charset=utf-8" />' . "\r\n";
  $this->html_open .= '<base href="'.$base_site.'">' . "\r\n";
  $this->html_open .= '<meta name="description" content="'.$description.'" />' . "\r\n";
  $this->html_open .= '<meta name="keywords" content="'. $keys .'"/>' . "\r\n";
  $this->html_open .= '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\r\n";
  $this->html_open .= '<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">' . "\r\n";
  $this->html_open .= '<link href="https://fonts.googleapis.com/css2?family='.$fonts .'&display=swap" rel="stylesheet">' . "\r\n";
  $this->html_open .= '<meta name="viewport" content="width=device-width, initial-scale=1">' . "\r\n";
        
        // diretorio css
foreach($path_css as $folders_css){
$this->html_open .= '<link href="'.$folders_css.'.css" rel="stylesheet">' . "\r\n"; 
}
        
        
  $this->html_open .= '</head>' . "\r\n";
  $this->html_open .= '<body>' . "\r\n";
        
        echo $this->html_open;
    }
    
    
    
    
    /** metodo fecha extrutura ahtml
    * @param string |
    */
    public function layoutCloseHtml(
    
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
                                ])
    {
        
        
$this->html_close  = '</body>' . "\r\n";
$this->html_close .= '</html>' . "\r\n";
        
$this->html_close .= '<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>' . "\r\n";
$this->html_close .= '<script src="apps/public/src/js/jquery-ui/jquery-ui.js"></script>' . "\r\n";
$this->html_close .= '<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">' . "\r\n";


        
// diretorios JS
foreach($path_js as $folders_js){      
$this->html_close .= '<script src="'.$folders_js.'.js"></script>' . "\r\n";
}

        
    echo  $this->html_close;
    }
    
    
    
    
    
  
    
    
    
    
    
  
    
}


/**


*/
/***/
/***/