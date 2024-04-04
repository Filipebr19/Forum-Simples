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

    <div class="row mt-3 w-100">
        <div class="col-10">
            <h2 class="text-center">Postagens Novas</h2>

            <div class="container-sm mw-50 p-2 mt-4 mb-4 text-center border border-primary rounded" style="--bs-border-opacity: .5; width: 70%;">
                <h4 class="">Titulo da postagem</h4>
                <p>Autor da postagem</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium modi sapiente totam fugiat eos ab dicta repellat aliquid doloribus sint ipsam, numqua <a href="">Ler mais...</a></p>

                <div>
                    <a href="">curtir</a>
                    <a href="">Comentarios</a>
                </div>
            </div>

        </div>

        <div class="col-2">
            <h5>Informações da Conta</h5>
            <p>Usuário: <?=$user->getName()?></p>
            <p>Email: <?=$user->getEmail()?></p>

            <h5>Funcionalidades</h5>
            <p><a href="">Fazer um Post</a></p>
            <p><a href="">Historico de Posts</a></p>

            <h5>Configurações da conta</h5>
            <p><a href="pages/alterar.php?id=<?=$user->getId()?>&table=<?=$user->getTyper()?>">Alterar Conta</a></p>
            <p><a href="pages/deletar.php?id=<?=$user->getId()?>&table=<?=$user->getTyper()?>" onclick="return confirm('Tem certeza que quer excluir?')">Deletar Conta</a></p>
            <p><a href="pages/sair.php">Sair</a></p>
        </div>
    </div>

<?php 
include_once 'partials/footer.php';