<?php
namespace Interfaces\PostInterface;


abstract class PostInterface {
    public int $postId;
    public int $userId;
    private string $title;
    private string $body;
    public array $comments;

    public function __construct(int $userId, string $title, string $body) {
        $this->userId = $userId;
        $this->setTitle($title);
    }

    protected function setTitle(string $title): void {
        $this->title = $title;
    }
    public function getTitle(): string {
        return $this->title;
    }
};