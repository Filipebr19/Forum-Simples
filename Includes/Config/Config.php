<?php 
namespace Includes\Config;

use PDO;

class Config {
    const DB_NAME = 'Forum';
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';

    static function connection() {
        return new PDO('mysql:dbhost='.self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, self::DB_PASS);
    }
};