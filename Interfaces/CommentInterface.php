<?php
namespace Interfaces;


abstract class CommentInterface {
    protected int $id;
    protected int $id_post;
    protected int $id_autor;
    protected string $body;
    protected string $date_create;
    protected int $curtidas;
    protected int $id_comment_pai;

    public function __construct(int $id_post, int $id_autor, string $body, int $id_comment_pai = null) {
        $this->setIdPost($id_post);
        $this->setIdAutor($id_autor);
        $this->setBody($body);
        $this->setDate();
        $this->setIdCommentPai($id_comment_pai);
    }

    abstract public function setId(int $id): void;
    abstract public function getId(): int;

    abstract protected function setIdPost(int $id_post): void;
    abstract public function getIdPost(): int;

    abstract protected function setIdAutor(int $id_autor): void;
    abstract public function getIdAutor(): int;

    abstract protected function setBody(string $body): void;
    abstract public function getBody(): string;

    abstract protected function setDate(): void;
    abstract public function getDate(): string;

    abstract public function setCurtidas(int $curtidas): void;
    abstract public function getCurtidas(): int;

    abstract protected function setIdCommentPai(int $id_comment_pai): void;
    abstract public function getIdCommentPai(): int;
};