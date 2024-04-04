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

    if (empty($name) || empty($email) || empty($senha)) {
        array_push($erros, "Todos os campos devem ser preenchidos");
    } else {
        $name = Validations::VALID_NAME($name);
        $email = Validations::VALID_EMAIL($email);
        $senha = Validations::VALID_PASS($senha);

        if(!$email) {
            array_push($erros, "O email não foi digitado corretamente!");
        } else {
            if(!$db->readEmail($email, 'users')) {
                $user = new User($name, $email, $senha);
    
                $db->addUser($user, $user->getTyper());
                $_SESSION['id'] = $user->getId();
                $_SESSION['table'] = $user->getTyper();
    
                header('Location: ../index.php');
                exit;
            } else {
                array_push($erros, "Este email: $email já existe! Faça o login.");
            };
        };
    }
}

?>

<h1 class="mt-5">Cadrastro</h1>

<div class="container p-5 center">
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome:</label>
            <input type="text" name="name" class="form-control form-control-sm custom-input" id="exampleInputEmail1">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email:</label>
            <input type="email" class="form-control form-control-sm custom-input" id="exampleInputEmail1"  name="email">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Senha:</label>
            <input type="password" class="form-control form-control-sm custom-input" id="exampleInputPassword1" name="senha" >
        </div>

        <input type="submit" value="Cadastrar" class="btn btn-primary mb-3">
    </form>

    <a href="login.php">Faça o login</a>

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
include_once '../partials/footer.php';
?>