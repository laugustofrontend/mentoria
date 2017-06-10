<?php
    namespace App\Utils;

    use \App\Interfaces\Email as Email;

class EmailPHPMailer implements Email
{
    private $sender;

    public function __construct($sender)
    {
        $this->sender = $sender;
    }

    public function addAddress(string $address, string $name = null)
    {
        $this->sender->addAddress($address, $name);
    }

    public function addFromEmail(string $from, string $name = null)
    {
        $this->sender->setFrom($from, $name);
    }

    public function addSubject(string $subject)
    {
        $this->sender->Subject = $subject;
    }

    public function addBody(string $body)
    {
        $this->sender->Body .= $body;
    }

    public function send()
    {
        if ($this->sender->send()) {
            return true;
        } else {
            throw new \Exception($this->sender->ErrorInfo);
        }
    }
}
