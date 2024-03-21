<?php
namespace Interfaces;
require_once __DIR__ . "/../vendor/autoload.php";

use Interfaces\UserIntf;

// Interface para usar o conceito DAO
interface DAOInterface {
    // Método para adicionar o usuário no banco de dados
    public function addUser(UserIntf $user, string $table);

    // Método para ler id do usuário
    public function readId(int $id, string $table);

    // Método para ler o email do usuário
    public function readEmail(string $email, string $table);

    // Método para atualizar os dados do usuário
    public function updateUser(UserIntf $user, string $table);

    // Método para deletar usuário
    public function deleteUser(int $id, string $table);
}