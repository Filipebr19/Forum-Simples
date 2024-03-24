<?php 
namespace Includes\Validations;

// Classe responsável pela validação dos campos preenchidos pelo usuário
class Validations {
    // Método que valida o nome do usuário
    static function VALID_NAME(string $nome): string {
        return ucwords(filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS));
    }

    // Método que valida o email do usuário
    static function VALID_EMAIL(string $email): string {
        return strtolower(filter_var($email, FILTER_VALIDATE_EMAIL));
    }

    // Método que valida e faz a encriptação da senha do usuário
    static function VALID_PASS(string $senha): string {
        return password_hash(filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS), PASSWORD_DEFAULT);
    }

    // Método que valida senha sem a encriptação
    static function VALID_PASS_NO_ENCRIP($senha): string {
        return filter_var($senha, FILTER_SANITIZE_SPECIAL_CHARS);
    }
};