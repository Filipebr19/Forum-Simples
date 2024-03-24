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

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erros = [];

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (empty($email) || empty($senha)) {
        array_push($erros, "Todos os campos devem ser preenchidos");
    } else {
        $email = Validations::VALID_EMAIL($email);
        $senha =  Validations::VALID_PASS_NO_ENCRIP($senha);

        if(!$email) {
            array_push($erros, "O email não foi digitado corretamente!");   
        } else if(!$db->readEmail($email, 'users')){
            array_push($erros, "Usuário não foi encontrado.");
        } else {
            $user = $db->readEmail($email, 'users');

            if(password_verify($senha, $user->getSenha())) {
                $_SESSION['id'] = $user->getId();
                $_SESSION['table'] = $user->getTyper();
    
                header('Location: ../index.php');
                exit;
            } else {
                array_push($erros, "Senha está incorreta.");
            };
        };
    };
};

?>

<form action="" method="post">
    <label for="email">Email:</label>
    <input type="text" name="email" id="email">

    <label for="senha">Senha:</label>
    <input type="text" name="senha" id="senha">

    <input type="submit" value="Acessar">
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
include_once __DIR__ . '/../partials/footer.php';