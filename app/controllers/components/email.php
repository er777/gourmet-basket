<?php

class EmailComponent 
{ 
    
  /** 
   * Send email using SMTP Auth by default. 
   */
    var $smtpUserName = 'fortesting@juanphp.com';  // SMTP username
    var $smtpPassword = 'fortesting'; // SMTP password
    var $smtpHostNames= "smtp.1and1.com";  // specify main and backup serve

    var $text_body = null;
    var $html_body = null;

    var $from = 'fortesting@juanphp.com';
    var $fromName = "JUANPHP";
    var $to = "jd@juanphp.com";
    var $toName = null;
    var $cc = null;
    var $ccName = null;
    var $bcc = null;
    var $bccName = null;

    var $subject = null;
    var $template = '/members/default';
    var $attachments = null; 

    var $controller; 

    function startup( &$controller ) {
      require "mail.php";
      $this->controller = &$controller; 
    } 

    function bodyText() { 
    /** This is the body in plain text for non-HTML mail clients 
     */ 
      ob_start(); 
      $temp_layout = $this->controller->layout; 
      $this->controller->layout = '';  // Turn off the layout wrapping 
      $this->controller->render($this->template . '_text');  
      $mail = ob_get_clean(); 
      $this->controller->layout = $temp_layout; // Turn on layout wrapping again 
      return $mail; 
    } 

    function bodyHTML() { 
    /** This is HTML body text for HTML-enabled mail clients 
     */ 
      ob_start(); 
      $temp_layout = $this->controller->layout; 
      $this->controller->layout = 'email';  //  HTML wrapper for my html email in /app/views/layouts 
      $this->controller->render($this->template . '_html');  
      $mail_content = ob_get_clean();
      $this->controller->layout = $temp_layout; // Turn on layout wrapping again 
      return $mail_content;
    } 

    function attach($filename, $asfile = '') { 
      if (empty($this->attachments)) { 
        $this->attachments = array(); 
        $this->attachments[0]['filename'] = $filename; 
        $this->attachments[0]['asfile'] = $asfile; 
      } else { 
        $count = count($this->attachments); 
        $this->attachments[$count+1]['filename'] = $filename; 
        $this->attachments[$count+1]['asfile'] = $asfile; 
      } 
    } 


    function send() 
    {


        $from = $this->fromName . '<' . $this->from . '>';

        $to = $this->toName . '<' . $this->to . '>';

        $replyTo = $this->replyTo;

        if ($this->cc != NULL) {
             $cc = $this->ccName . '<' . $this->cc . '>';
             $to = $to . ',' . $cc;
        }

        if ($this->bcc != NULL) {
             $bcc = $this->bccName . '<' . $this->bcc . '>';
             $to = $to . ',' . $bcc;
        }

        $subject = $this->subject;
        $body = $this->template;
        //$body = $this->bodyHTML();
            //$mail->AltBody = $this->bodyText();

        $headers = array ('From' => $from,
            'to' => $to,
            'reply-to' => $replyTo,
            'Subject' => $subject,
            'Content-type' => 'text/html; charset=iso-8859-1');

        $smtp = Mail::factory('smtp',
            array ('host' => $this->smtpHostNames,
                'auth' => true,
                'username' => $this->smtpUserName,
                'password' => $this->smtpPassword));

        $mail = $smtp->send($to, $headers, $body);

        if (PEAR::isError($mail)) {
            return false;
        } else {
            //echo("<p>Message successfully sent!</p>");
            return true;
        }
/*
         if (!empty($this->attachments)) {
         foreach ($this->attachments as $attachment) {
            if (empty($attachment['asfile'])) {
               $mail->AddAttachment($attachment['filename']);
            } else {
               $mail->AddAttachment($attachment['filename'], $attachment['asfile']);
            }
         }
*/

    }
} 
?>