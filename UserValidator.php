<?php

interface ValidatorInterface {
    public function validate(string $input): bool;
}

class EmailValidator implements ValidatorInterface {
    public function validate(string $email): bool {
        $emailRegex = '/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        return preg_match($emailRegex, $email) === 1;
    }
}

class PasswordValidator implements ValidatorInterface {
    public function validate(string $password): bool {
        // Można by zastosować match zamiast if, choć jest to nadmiarowe
        if (strlen($password) < 8) {
            return false;
        }
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }
        if (!preg_match('/[0-9]/', $password)) {
            return false;
        }
        if (!preg_match('/[\W_]/', $password)) {
            return false;
        }
        return true;
    }
}

class UserValidator {
    private ValidatorInterface $emailValidator;
    private ValidatorInterface $passwordValidator;

    public function __construct(ValidatorInterface $emailValidator, ValidatorInterface $passwordValidator) {
        $this->emailValidator = $emailValidator;
        $this->passwordValidator = $passwordValidator;
    }

    public function validateEmail(string $email): bool {
        return $this->emailValidator->validate($email);
    }

    public function validatePassword(string $password): bool {
        return $this->passwordValidator->validate($password);
    }
}

?>