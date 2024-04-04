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

<h1 class="mt-5">Alterando conta</h1>

<div class="container p-5 center">
    <form action="<?=$_SERVER['PHP_SELF']."?id=".$user->getId()."&table=".$user->getTyper()?>" method="post">
        <input type="hidden" name="id" value="<?=$user->getId()?>">

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" name="name" id="name" class="form-control form-control-sm custom-input" value="<?=$user->getName()?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="text" name="email" id="email" class="form-control form-control-sm custom-input" value="<?=$user->getEmail()?>">
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="text" name="senha" id="senha" class="form-control form-control-sm custom-input">
        </div>

        <input type="submit" value="Alterar" class="btn btn-primary mb-3">
    </form>

    <div class="form-text">
        <?php
            if (!empty($erros)) {
                foreach ($erros as $erro) {
                    echo "<p>" . $erro . "</p>";
                }
                array_pop($erros);
            };
        ?>
    </div>
</div>

<?php
include_once "../partials/footer.php";