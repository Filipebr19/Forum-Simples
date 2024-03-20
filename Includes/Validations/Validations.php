<?php 
namespace Includes\Validations;

class Validations {
    static function VALID_NAME(string $nome): string {
        return ucwords(filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS));
    }

    static function VALID_EMAIL(string $email): string {
        return strtolower(filter_var($email, FILTER_SANITIZE_EMAIL));
    }

    static function VALID_PASS(string $senha): string {
        return password_hash(filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS), PASSWORD_DEFAULT);
    }
};