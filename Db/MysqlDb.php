<?php
namespace Db;
require_once __DIR__ . "/../vendor/autoload.php";

use Class\User;
use Interfaces\DAOInterface;
use Interfaces\UserIntf;
use PDO;

// Classe responsável pela interação com o banco de dados MySQL.
class MysqlDb implements DAOInterface {
    // Conexão com o Banco de dado com o PDO
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Método que adiciona um usuário ao banco de dados
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

    // Método que ler o id do usuário 
    public function readId(int $id, string $table) {
        $sql = $this->pdo->prepare("SELECT * FROM $table WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $arr = $sql->fetch();

            $user = new User($arr['nome'], $arr['email'], $arr['senha']);
            $user->setId($arr['id']);

            return $user;
        } else {
            return false;
        };
    }

    // Método que ler o email do usuário
    public function readEmail(string $email, string $table) {
        $sql = $this->pdo->prepare("SELECT * FROM $table WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $arr = $sql->fetch();

            $user = new User($arr['nome'], $arr['email'], $arr['senha']);
            $user->setId($arr['id']);

            return $user;
        } else {
            return false;
        };
    }

    // Método que atualiza os dados do usuário no banco de dados
    public function updateUser(UserIntf $user, string $table) {
        $sql = $this->pdo->prepare("UPDATE $table SET nome = :nome, email = :email, senha = :senha WHERE id = :id");
        $sql->bindValue(':id', $user->getId());
        $sql->bindValue(':nome', $user->getName());
        $sql->bindValue(':email', $user->getEmail());
        $sql->bindValue(':senha', $user->getSenha());
        $sql->execute();
    }

    // Método que deleta usuário do bando de dados
    public function deleteUser(int $id, $table) {
        $sql = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
};