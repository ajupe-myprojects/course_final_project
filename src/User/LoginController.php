<?php

namespace App\User;

use App\Core\AbstractController;
use App\Helper\FormHelper;
use App\Helper\Mailer;
use App\Helper\Validator;

class LoginController extends AbstractController
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function loginUser()
    {
        $val = new Validator();
        $email = $val->checkMail('lg-email');
        $password = $val->checkText('lg-password');
        $message = [];
        if($email !== '!ERROR!'){
            $user = $this->userRepository->getByEmail($email);
        }
        if(!empty($user)){
            if(password_verify($password, $user->password)){
                $_SESSION['login'] = $user;
                session_regenerate_id(true);
                $message['msg'] = 'Willkommen Benutzer ' . $user->username;
                $message['state'] = 'clear';
                $this->render('page_main_login_error', ['message' => $message]);
            }else{
                $message['msg'] = 'Your passwort is wrong!';
                $message['state'] = 'wrong';
                $this->render('page_main_login_error', ['message' => $message]);
            }
        }else{
            $message['msg'] = 'This Account / Email doesnt exist!';
            $message['state'] = 'wrong';
            $this->render('page_main_login_error', ['message' => $message]);
        }
    }

    public function logout()
    {
        unset($_SESSION['login']);
        header('Location: start');
    }

    //non user login related

    public function contactMail()
    {
        $message = [];
        $mail = new Mailer();
        $msgs = $mail->sendAdminMail();
        if(!isset($msgs['error'])){
            $message['msg'] = 'Ihre Kontaktanfrage wurde erfolgreich versendet!';
            $message['content'] = 'Ihre übermittelten Daten: <br>Vorname : '.$msgs['name'].'<br>Nachname : '.$msgs['sname'].'<br>Email : '.$msgs['mail'];
            $message['state'] = 'cont-success';
            $this->render('page_main_login_error', ['message' => $message]);
        }else{
            $message['msg'] = 'Bei der Übermittlung ihrer Anfrage sind Fehler aufgetreten!<br>Bitte versuchen sie es erneut!';
            $message['state'] = 'cont-err';
            $this->render('page_main_login_error', ['message' => $message]);
        }

    }
}