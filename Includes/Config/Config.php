<?php 
namespace Includes\Config;

use PDO;

// Classe responsável pela conexão com o banco de dados
class Config {
    // Atributos
    const DB_NAME = 'Forum';
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';

    // Método que faz a conexão com o banco de dados através da classe PDO
    static function connection() {
        return new PDO('mysql:dbhost='.self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, self::DB_PASS);
    }
};