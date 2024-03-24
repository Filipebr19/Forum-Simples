<?php

require_once __DIR__ . "/vendor/autoload.php";
use Class\User;
use Db\MysqlDb;
use Includes\Config\Config;

session_start();

if(!isset($_SESSION['id']) || $_SESSION['id'] === null) {
    header('Location: pages/cadrastro.php');
    exit;
};

$connect = new Config;
$db = new MysqlDb($connect->connection());
$user = $db->readId($_SESSION['id'], $_SESSION['table']);

include_once 'partials/header.php';
?>
    <h3>Informações da Conta</h3>
    <p>Nome: <?=$user->getName()?></p>
    <p>Email: <?=$user->getEmail()?></p>

    <h3>Funcionalidades</h3>
    <p><a href="">Fazer um Post</a></p>
    <p><a href="">Historico de Posts</a></p>

    <h3>Configurações da conta</h3>
    <p><a href="pages/alterar.php?id=<?=$user->getId()?>&table=<?=$user->getTyper()?>">Alterar Conta</a></p>
    <p><a href="pages/deletar.php?id=<?=$user->getId()?>&table=<?=$user->getTyper()?>" onclick="return confirm('Tem certeza que quer excluir?')">Deletar Conta</a></p>
    <p><a href="pages/sair.php">Sair</a></p>

    <h2>Postagens</h2>

<?php 
include_once 'partials/footer.php';