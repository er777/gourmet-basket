<?php
//include_once "Smarty.class.php";
include_once "class.phpmailer.php"; 
//$smarty = new Smarty();
function DelFirstSlash($str){
    $str = strval($str);
    if($str[0]=="/")
        return substr($str,1);
    else
        return $str;
}

function DelLastSlash($str){
    $str = strval($str);
    if($str[strlen($str)-1]=="/")
        return substr($str,0,-1);
    else
        return $str;
}
function TrimSlash($str){
    return DelFirstSlash(DelLastSlash(strval($str)));
}
function send_mail($email_to, $email_from, $subject, $content){
    global $lang, $config, $dbconn, $charset_mail;

    $err = "";    
    $PHPmailer = new PHPMailer();
    $PHPmailer->SMTPDebug = 2;
    $PHPmailer->IsSMTP();
    
    $PHPmailer->Host = 'dochterman.me';
    $PHPmailer->Port = 465;
    $PHPmailer->SMTPAuth = true;
    $PHPmailer->Username = "sales";
    $PHPmailer->Password = "";
    
    $PHPmailer->CharSet = $charset_mail;
    $PHPmailer->From = $email_from;
    $PHPmailer->FromName = "sales";
    $PHPmailer->AddAddress($email_to, "");
    $PHPmailer->IsHTML(true);                               // send as HTML
        
    $PHPmailer->Subject  =  $subject;
    $PHPmailer->Body     =  $content;

    if($content != ""){
        if(!$PHPmailer->Send()){
            $err = $lang["err"]["mail_error"]." (".$PHPmailer->ErrorInfo.")";
        }
    }
    sleep (1);
    $PHPmailer->ClearAddresses();
    $PHPmailer->ClearAttachments();

    return $err;
}
?>