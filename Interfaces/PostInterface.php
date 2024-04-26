<?php
namespace Interfaces;

abstract class PostInterface {
    protected int $id;
    protected string $title;
    protected string $body;
    protected int $id_autor;
    protected string $date_create;
    protected int $curtidas;

    public function __construct(string $title, string $body, int $id_autor) {
        $this->setTitle($title);
        $this->setBody($body);
        $this->setIdAutor($id_autor);
        $this->setDate();
    }

    abstract public function setId(int $id): void;
    abstract public function getId(): int;

    abstract protected function setTitle(string $title): void;
    abstract public function getTitle(): string;

    abstract protected function setBody(string $body): void;
    abstract public function getBody(): string;

    abstract protected function setIdAutor(int $id_autor): void;
    abstract public function getIdAutor(): int;

    abstract protected function setDate(): void;
    abstract public function getDate(): string;

    abstract public function setCurtidas(int $curtidas): void;
    abstract public function getCurtidas(): int;
};