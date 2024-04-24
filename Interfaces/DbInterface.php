<?php
namespace Interfaces;

interface DbInterface {
    public function createUser(UserInterface $user);
    public function readId(int $id);
    public function readEmail(string $email);
    public function updateUser(UserInterface $user);
    public function deleteUser(int $id);
};