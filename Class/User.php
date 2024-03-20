<?php
namespace Class;

use Interfaces\UserIntf;

require_once __DIR__ . "/../vendor/autoload.php";

class User extends UserIntf {
    public string $typer = 'users';
}