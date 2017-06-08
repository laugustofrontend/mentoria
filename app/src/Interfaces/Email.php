<?php
    namespace App\Interfaces;

    interface Email
    {
        public function __construct();

        public function addAddress(string $address, string $name = null);

        public function addSubject(string $subject);

        public function addBody(string $body);

        public function send();
    }