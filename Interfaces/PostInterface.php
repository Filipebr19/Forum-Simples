<?php
namespace Interfaces\PostInterface;

use Interfaces\CommentsInterface\CommentsInterface;

abstract class PostInterface {
    public int $postId;
    private int $userId;
    private string $title;
    private string $body;
    private string $date;
    private array $comments = [];

    public function __construct(int $userId, string $title, string $body) {
        $this->setUserId($userId);
        $this->setTitle($title);
        $this->setBody($body);
        $this->date = date('Y-m-d H:i:s');
    }

    public function setPostId(int $postId): void {
        $this->postId = $postId;
    }
    public function getPostId(): int {
        return $this->postId;
    }

    protected function setUserId(int $userId): void {
        $this->userId = $userId;
    }
    public function getUserId(): int {
        return $this->userId;
    }

    protected function setTitle(string $title): void {
        $this->title = $title;
    }
    public function getTitle(): string {
        return $this->title;
    }

    protected function setBody(string $body): void {
        $this->body = $body;
    }
    public function getBody(): string {
        return $this->body;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function addComments(CommentsInterface $comment): void {
        array_push($this->comments, $comment);
    }
    public function getComments(): array {
        return $this->comments;
    }
};