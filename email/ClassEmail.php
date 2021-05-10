<?php

/**
* @class: ClassSql
* @author: Macieldcs | macieldcs@gmail.com
* @version: 1.0
* data de criaão 21/04/2021
*/






namespace DirClass\email;

class ClassEmail
{
    
    
    
    
    
    
    private $field_to;
    private $field_subject;
    private $field_message;
    
    
    
    
    
    public function emailMessage($to, 
                                 $subject, 
                                 $message,
                                 $ms = [])
    {
        
        
        
        
        
        $this->field_to        = filter_input(INPUT_POST, $to, FILTER_DEFAULT);
        $this->field_subject   = filter_input(INPUT_POST, $subject , FILTER_DEFAULT);
        $this->field_message   = filter_input(INPUT_POST, $message, FILTER_DEFAULT);
            
        $headers  = 'MIMI-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=ISO-8859-1'  . "\r\n";
        $headers .= 'From: <macieldcs@falandodabiblia.com>'  . "\r\n";
        $headers .= 'Cc: macieldcs@falandodabiblia.com'  . "\r\n";
        $headers .= 'Reply-To: macieldcs@falandodabiblia.com'  . "\r\n";
        
        
  $send = mail($this->field_to, $this->field_subject, $this->field_message, $headers);
        
        if($send){
            
        $class_redirect = new \DirClass\redirect\ClassRedirect;
        $class_redirect->redirectReturn($ms[0], $ms[2]); 
           
            
            
        } else {
            
        $class_redirect = new \DirClass\redirect\ClassRedirect;
        $class_redirect->redirectReturn($ms[1], $ms[2]);    
            
        }
       
    }
}

/*
$class_email = new ClassEmail;

$class_email->emailMessage("email",   // nome do email 
             "assunto", // assunto da mensagem
             'mensagem', // mensagem
             
             // redirecionamentos
             $ms = [
             "Mensagem enviada com sucesso...",
             "Falha no envio da menssagem!",
             4
             ]);
*/