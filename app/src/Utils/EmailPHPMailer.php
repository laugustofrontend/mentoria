<?php
	namespace App\Utils;

	class EmailPHPMailer implements \App\Interfaces\Email
	{
		private $sender;

		public function __construct ($sender)
		{
			$this->sender = $sender;
		}

		public function addAddress (string $address, string $name = null)
		{
			$this->sender->addAddress($address, $name);
		}

		public function addSubject (string $subject)
		{
			$this->sender->Subject = $subject;
		}

		public function addBody (string $body)
		{
			$this->sender->Body .= $body;
		}

		public function send ()
		{
			if ($this->sender->send()) {
				return true;
			} else {
				throw new \Exception($this->sender->ErrorInfo);
			}
		}
	}