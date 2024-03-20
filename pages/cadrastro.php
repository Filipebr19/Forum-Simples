<?php
session_start();
require_once __DIR__ . "/../vendor/autoload.php";
include_once __DIR__ . '/../partials/header.php';

use Class\User;
use Db\MysqlDb;
use Includes\Config\Config;
use Includes\Validations\Validations;

$connect = new Config;
$db = new MysqlDb($connect->connection());


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $erros = [];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($name) && empty($email) && empty($senha)) {
        array_push($erros, "Todos os campos devem ser preenchidos");
    } else {
        $name = Validations::VALID_NAME($name);
        $email = Validations::VALID_EMAIL($email);
        $senha = Validations::VALID_PASS($senha);

        

        if(!$db->readEmail($email, 'users')) {
            $user = new User($name, $email, $senha);

            $db->addUser($user, $user->getTyper());
            $_SESSION['id'] = $user->getId();

            header('Location: ../index.php');
            exit;
        };
    }
}

?>

<form action="" method="post">
    <label for="name">Nome</label>
    <input type="text" name="name" id="name">

    <label for="email">Email:</label>
    <input type="text" name="email" id="email">

    <label for="senha">Senha:</label>
    <input type="text" name="senha" id="senha">

    <input type="submit" value="Cadastrar">
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
include_once '../partials/footer.php';
?>