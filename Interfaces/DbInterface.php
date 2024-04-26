<?php
namespace Interfaces;

interface DbInterface {
    public function createUser(UserInterface $user);
    public function createPost(PostInterface $post);
    public function readId(int $id);
    public function readEmail(string $email);
    public function readPostById(int $idPost);
    public function updateUser(UserInterface $user);
    public function deleteUser(int $id);
};