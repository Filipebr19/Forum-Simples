<?php
namespace Interfaces;

abstract class UserInterface {
    protected int $id;
    protected string $name;
    protected string $email;
    protected string $senha;
    protected string $date_register;

    public function __construct(string $name, string $email, string $senha) {
        $this->setName($name);
        $this->setEmail($email);
        $this->setSenha($senha);
        $this->setDate();
    }

    abstract public function setId(int $id): void;
    abstract public function getId(): int;

    abstract protected function setName(string $name): void;
    abstract public function getName(): string;

    abstract protected function setEmail(string $email): void;
    abstract public function getEmail(): string;

    abstract protected function setSenha(string $senha): void;

    abstract protected function setDate(): void;
    abstract public function getDate(): string;
};