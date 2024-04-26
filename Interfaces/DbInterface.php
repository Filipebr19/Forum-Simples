<?php
namespace Interfaces;

interface DbInterface {
    public function createUser(UserInterface $user);
    public function createPost(PostInterface $post);
    public function createComment(CommentInterface $comment);

    public function readUserId(int $id);
    public function readEmail(string $email);
    public function readPostById(int $idPost);
    public function readCommentById(int $idComment);

    public function updateUser(UserInterface $user);
    public function updatePost(PostInterface $post);
    public function updateComment(CommentInterface $comment);

    public function deleteUser(int $id);
    public function deletePost(int $idPost);
    public function deleteComment(int $idComment);
};