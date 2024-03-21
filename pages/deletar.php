<?php 

require_once __DIR__ . "/../vendor/autoload.php";

use Db\MysqlDb;
use Includes\Config\Config;

$connect = new Config;
$db = new MysqlDb($connect->connection());

$db->deleteUser($_GET['id'], $_GET['table']);
header('Location: cadrastro.php');
exit;