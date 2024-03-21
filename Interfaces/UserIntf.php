<?php 
namespace Interfaces;

use Interfaces\PostInterface\PostInterface;

// Classe abstrata que representa um usuário génerico
abstract class UserIntf {
    // Atributos
    public int $id;
    private string $name;
    private string $email;
    private string $senha;

    // Tipo de usuário para indentificar na tabela do Db. Ex: admin ou users
    public string $typer;

    public function __construct(string $name, string $email, string $senha) {
        $this->setName($name);
        $this->setEmail($email);
        $this->setSenha($senha);
    }

    // Define o nome do usuário
    protected function setName(string $name): void {
        $this->name = $name;
    }
    // Retorna o nome do usuário
    public function getName(): string {
        return $this->name;
    }

    // Define o email do usuário
    protected function setEmail(string $email): void {
        $this->email = $email;
    }
    // Retorna o email do usuário
    public function getEmail(): string {
        return $this->email;
    }

    // Define a senha do usuário
    protected function setSenha(string $senha): void {
        $this->senha = $senha;
    }
    // Retorna senha do usuário
    public function getSenha(): string {
        return $this->senha;
    }

    // Define o id do usuário
    public function setId(int $id): void {
        $this->id = $id;
    }
    // Retorna o id do usuário
    public function getId(): int {
        return $this->id;
    }

    // Retorna o typer do usuário
    public function getTyper(): string {
        return $this->typer;
    }

    // Métodos que serão implementados
    // abstract public function comment();
    // abstract public function post(PostInterface $post);
};