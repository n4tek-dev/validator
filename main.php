<?php

require_once 'UserValidator.php';
require 'UserValidatorTest.php';

// Uruchomienie testów
runTests();

// Przykład użycia
$emailValidator = new EmailValidator();
$passwordValidator = new PasswordValidator();
$validator = new UserValidator($emailValidator, $passwordValidator);

$email = "test@example.com";
$password = "StrongPass1!";

echo "\nExample Usage:\n";

if ($validator->validateEmail($email)) {
    echo "Email is valid.\n";
} else {
    echo "Email is invalid.\n";
}

if ($validator->validatePassword($password)) {
    echo "Password is valid.\n";
} else {
    echo "Password is invalid.\n";
}

?>