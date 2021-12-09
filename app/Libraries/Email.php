<?php

namespace App\Libraries;

class Email
{
    public function sendMail($to,$cc,$subject,$body)
    {
        $email = \Config\Services::email();

        $email->setFrom('nox.aeterna.solution@gmail.com', 'Admin');
        $email->setTo($to);
        if ($cc != "") {
            $email->setCC($cc);
        }

        $email->setSubject($subject);
        $email->setMessage($body);

        return $email->send();
    }
}

?>