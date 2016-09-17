<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of email
 *
 * @author Ishan Ayesha
 */
class email {
    
    
    public function sendMail($to,$subject,$message) {

        //send email
        
        $this->load->library('email');
       
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com'; //change this
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'seppro2016@gmail.com'; //change this
        $config['smtp_pass'] = '2016seppro'; //change this
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; 

        $this->email->initialize($config);
       
        $this->email->set_newline("\r\n");
        $this->email->from('seppro2016@gmail.com'); // change it to yours
        $this->email->to($to);// change it to yours
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send())
        {
            //cho 'Email sent.';
            
        }
        else
        {
            show_error($this->email->print_debugger());
        }

    }
    
}
