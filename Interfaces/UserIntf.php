<?php 
namespace Interfaces;

use Interfaces\PostInterface\PostInterface;

abstract class UserIntf {
    public int $id;
    private string $name;
    private string $email;
    private string $senha;
    public string $typer;

    public function __construct(string $name, string $email, string $senha) {
        $this->setName($name);
        $this->setEmail($email);
        $this->setSenha($senha);
    }

    protected function setName(string $name): void {
        $this->name = $name;
    }
    public function getName(): string {
        return $this->name;
    }

    protected function setEmail(string $email): void {
        $this->email = $email;
    }
    public function getEmail(): string {
        return $this->email;
    }

    protected function setSenha(string $senha): void {
        $this->senha = $senha;
    }
    public function getSenha(): string {
        return $this->senha;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }
    public function getId(): int {
        return $this->id;
    }

    public function getTyper(): string {
        return $this->typer;
    }
    // abstract public function comment();
    // abstract public function post(PostInterface $post);
};