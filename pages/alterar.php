<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Class\User;
use Db\MysqlDb;
use Includes\Config\Config;
use Includes\Validations\Validations;

$connect = new Config;
$db = new MysqlDb($connect->connection());
$user = $db->readId($_GET['id'], $_GET['table']);

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $erros = [];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if(empty($name) || empty($email) || empty($senha)) {
        array_push($erros, "Todos os campos devem ser preenchidos");
    } else {
        $name = Validations::VALID_NAME($name);
        $email = Validations::VALID_EMAIL($email);
        $senha = Validations::VALID_PASS($senha);

        if(!$email) {
            array_push($erros, "O email não foi digitado corretamente!");
        } else {
            $userUpdate = new User($name, $email, $senha);
            $userUpdate->setId($user->getId());

            $db->updateUser($userUpdate, $user->getTyper());

            header("Location: ../index.php");
            exit;
        };
    };
};

include_once "../partials/header.php";
?>

<form action="<?=$_SERVER['PHP_SELF']."?id=".$user->getId()."&table=".$user->getTyper()?>" method="post">
    <input type="hidden" name="id" value="<?=$user->getId()?>">

    <label for="name">Nome</label>
    <input type="text" name="name" id="name" value="<?=$user->getName()?>">

    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="<?=$user->getEmail()?>">

    <label for="senha">Senha:</label>
    <input type="text" name="senha" id="senha">

    <input type="submit" value="Alterar">
</form>

<div class="erros">
    <?php
        if (!empty($erros)) {
            foreach ($erros as $erro) {
                echo "<p>" . $erro . "</p>";
            }
            array_pop($erros);
        };
    ?>
</div>

<?php
include_once "../partials/footer.php";