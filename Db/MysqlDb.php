<?php
namespace Db;
require_once __DIR__ . "/../vendor/autoload.php";

use Class\User;
use Interfaces\DAOInterface;
use Interfaces\UserIntf;
use PDO;

class MysqlDb implements DAOInterface {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function addUser(UserIntf $user, $table) {
        $sql = $this->pdo->prepare("INSERT INTO $table VALUES (default, :nome, :email, :senha)");
        $sql->bindValue(':nome', $user->getName());
        $sql->bindValue(':email', $user->getEmail());
        $sql->bindValue(':senha', $user->getSenha());
        $sql->execute();

        $id = $this->pdo->lastInsertId(); 
        $user->setId($id);

        return $user;
    }
    public function readId(int $id, string $table) {
        
    }
    public function readEmail(string $email, string $table) {
        $sql = $this->pdo->prepare("SELECT * FROM $table WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $arr = $sql->fetch();

            $user = new User($arr['nome'], $arr['email'], $arr['senha']);

            return $user;
        } else {
            return false;
        };
    }
    public function updateUser(UserIntf $user, string $table) {
        
    }
    public function deleteUser(int $id, $table) {
        
    }
};