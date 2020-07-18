<?php

namespace App\Helpers;

class VerificationEmail
{
    protected $email;
    protected $message;

    function __construct()
    {
        $this->email = \Config\Services::email();
    }


    protected function message()
    {
        $this->message = "Please Verify your account at <a href='" . anchor('login') . "'></a>";
    }


    public function mail($receiver, $code)
    {
        $emailContent = '<!DOCTYPE html>
            <html lang="en">
            <head> </head>
            <body>
                <p>
                Your account created successfully. Please
                <a href="http://localhost:8080/verification/' . $code . '" target="blank">verify</a> your account to
                login!!!
                </p>
            </body>
            </html>';
        $this->email->setFrom('an.rajin@gmail.com', 'Doccure Admin');
        $this->email->setTo($receiver);
        $this->email->setSubject('Account Verification');
        $this->email->setMessage($emailContent);

        $this->email->send();
        $this->email->printDebugger(['headers']);
    }
}
