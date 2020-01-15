<?php

namespace App\Helper;


class Mailer
{
    private function generatePassword()
    {
        $alphabet = "0123456789abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = []; 
        $alphaLength = strlen($alphabet) -1;
        for ($i = 0; $i < 12; $i++) {
            $n = random_int(0, $alphaLength);
            if(!in_array($alphabet[$n], $pass)){
                $pass[] = $alphabet[$n];
            }else{
                $i--;
            }
            
        }
        return implode($pass);
    }

    public function sendSignupMail()
    {
        $contents = [];
        $val = new Validator();
        $contents['mail'] = $val->checkMail('sp-email');
        $contents['username'] = $val->checkText('sp-username');
        $contents['password'] = $this->generatePassword();
        $_POST = array();
        if(!in_array('!ERROR!', $contents)){

            $mail_body = [
                'email' => $contents['mail'],
                'subject' => 'Willkommen im Buchklub!',
                'message' => 'Danke für die Registrierung im Buchklub! \n Ihr Benutzername ist : '.$contents['username'].'\n Ihr generiertes Passwort ist : '.$contents['password'],
                'headers' => 'from: noreply@bookclub.to'
            ];
            mb_language('German');
            mb_send_mail($mail_body['email'], $mail_body['subject'], $mail_body['message'], $mail_body['headers']);
            return $contents;
        }else{

            $contents['error'] = 'Möööp';
            return $contents;
        }
    }

    public function sendAdminMail()
    {
        $contents = [];
        $val = new Validator();
        $contents['mail'] = $val->checkMail('ct-email');
        $contents['name'] = $val->checkText('ct-name');
        $contents['sname'] = $val->checkText('ct-sname');
        $contents['number'] = $val->checkOpt('ct-tel');
        $contents['msg'] = $val->checkText('ct-message');
        $_POST = array();
        if(!in_array('!ERROR!',$contents)){

            $mail_body = [
                'email' => 'admin@bookclub.to',
                'subject' => 'Kontaktanfrage (Webseite) from: '.$contents['name'].$contents['sname'],
                'message' => 'Nachricht von :<br>'.$contents['name'].' '.$contents['sname'].' Tel.: '.$contents['number'].' Mail: '.$contents['mail'].'<br>'.$contents['msg'],
                'headers' => 'From:'.$contents['mail']
            ];
            mb_language('German');
            mb_send_mail($mail_body['email'], $mail_body['subject'], $mail_body['message'], $mail_body['headers']);
            return $contents;
        }else{
            
            $contents['error'] = 'Möööp';
            return $contents;
        }
    }

    public function sendNewpass($mail)
    {
        $pw = $this->generatePassword();
        if($mail !== '!ERROR!'){

            $mail_body = [
                'email' => $mail,
                'subject' => 'Ihr neues Passwort!',
                'message' => 'Ihr neues Passwort ist: '. $pw . ' /n Sie können es nach dem ersten Login ändern.',
                'headers' => 'from: noreply@bookclub.to'
            ];
            mb_language('German');
            mb_send_mail($mail_body['email'], $mail_body['subject'], $mail_body['message'], $mail_body['headers']);
            return $pw;
        }
    }
}