<?php 
namespace Config;

use PDO;

class Config {
    const DB_NAME = 'forum';
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS =  '';

    public function connect(): PDO {
        return new PDO("mysql:host=".self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, self::DB_PASS);
    }    
};