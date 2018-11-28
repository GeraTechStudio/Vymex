<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VymexMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $mail;
    protected $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail, $type)
    {
        $this->type = $type;
        switch ($this->type) {
            case 1:
                $this->id = $mail->id;
                $this->remember_token = md5($mail->email);
                $this->email = $mail->email;
                break;
            case 2:
                $this->login = $mail['user']->login;
                $this->password = $mail['password'];
                $this->email = $mail['user']->email;
                $this->first_name = $mail['user']->first_name;
                $this->middle_name = $mail['user']->middle_name;
                break;
        }
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch ($this->type) {
            case 1:
                return $this->markdown('email.registration.FirstAuth')->subject('Подтверждение регистрации на Vymex.com')->with([
                    'id' => $this->id,
                    'remember_token' => $this->remember_token,
                    'email' => $this->email
                ]);
                break;
            case 2:
                return $this->markdown('email.registration.FinalAuth')->subject('Вы на верном пути!')->with([
                    'name' => $this->first_name,
                    'middle_name' => $this->middle_name,
                    'login' => $this->login,
                    'password' => $this->password,
                    'email' => $this->email
                ]);
                break;
        }
        
    }
}
