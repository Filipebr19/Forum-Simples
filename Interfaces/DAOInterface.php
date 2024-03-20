<?php
namespace Interfaces;
require_once __DIR__ . "/../vendor/autoload.php";

use Interfaces\UserIntf;

interface DAOInterface {
    public function addUser(UserIntf $user, string $table);
    public function readId(int $id, string $table);
    public function readEmail(string $email, string $table);
    public function updateUser(UserIntf $user, string $table);
    public function deleteUser(int $id, string $table);
}