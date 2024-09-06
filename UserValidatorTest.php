<?php

require_once 'UserValidator.php';

function runTests() {
    $emailValidator = new EmailValidator();
    $passwordValidator = new PasswordValidator();
    $userValidator = new UserValidator($emailValidator, $passwordValidator);

    $emailTests = [
        'valid@example.com' => true,
        'invalid@com' => false,
        'noatsign.com' => false,
        'missingdomain@.com' => false,
        'missingdot@examplecom' => false,
        'valid.email@domain.com' => true
    ];

    $passwordTests = [
        'Short1!' => false,
        'nouppercase1!' => false,
        'NOLOWERCASE1!' => false,
        'NoNumber!' => false,
        'NoSpecialChar1' => false,
        'ValidPass1!' => true,
        'AnotherGood1#' => true
    ];

    echo "\nTesting UserValidator:\n";
    foreach ($emailTests as $email => $expected) {
        $result = $userValidator->validateEmail($email);
        echo "Email: $email - " . ($result === $expected ? "Passed" : "Failed") . "\n";
    }

    foreach ($passwordTests as $password => $expected) {
        $result = $userValidator->validatePassword($password);
        echo "Password: $password - " . ($result === $expected ? "Passed" : "Failed") . "\n";
    }
}

?>