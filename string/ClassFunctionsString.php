<?php

/**
* @class: ClassFunctionsString
* @author: Macieldcs | macieldcs@gmail.com
* @version: 1.0
* data de criaão 21/04/2021
*/






namespace DirClass\string;





class ClassFunctionsString{
    
    
     public function criaResumo($string,$caracteres) {
        $string = strip_tags($string);
        if (strlen($string) > $caracteres) {
            while (substr($string,$caracteres,1) <> ' ' && ($caracteres < strlen($string))){
                $caracteres++;
            };
        };
        return substr($string,0,$caracteres) . '...';
    }
    
    
    
    
    
    
    
     public function removeCaracteres($valor)
     {
         $caracteres1 = [
             'á','â','ã','à','Á','Â','Ã','À',
             'é','ê','è','É','Ê','È',
             'í','ì','Í','Ì',
             'ó','ô','õ','ò','Ó','Ô','Õ','Ò',
             'ú','ù','Ú','Ù',
             'ç','Ç','-','_',' ','.',
             ',',':',';','!','/','|',
         ];
         
         $caracteres2 = [
             'a','a','a','a','A','A','A','A',
             'e','e','e','E','E','E',
             'i','i','I','I',
             'o','o','o','o','O','O','O','O',
             'u','u','U','U',
             'c','C','','','','',
             '','','','','','',
         ];
         
         /* esta funcao subtitui os valore do primeiro 
         array pelos valores do segundo array */
         $caracteresNerws = str_replace($caracteres1, 
                                        $caracteres2, 
                                        $valor);
         return $caracteresNerws;
     }

}


