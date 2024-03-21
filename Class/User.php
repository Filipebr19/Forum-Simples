<?php
namespace Class;

use Interfaces\UserIntf;

require_once __DIR__ . "/../vendor/autoload.php";

// Classe que representa um usuário específico
class User extends UserIntf {
    // Atributo
    public string $typer = 'users';
}