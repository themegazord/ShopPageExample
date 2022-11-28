<?php

class Email {
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function isValid() {
        if(!$this->validateEmail()) {
            return false;
        }
        return true;
    }

    public function sanitizeEmail() {
        return filter_var($this->email, FILTER_SANITIZE_EMAIL);
    }

    public function validateEmail() {
        return filter_var($this->sanitizeEmail(), FILTER_VALIDATE_EMAIL);
    }
}