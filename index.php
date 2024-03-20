<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['id'] === null) {
    header('Location: pages/cadrastro.php');
    exit;
};


include_once 'partials/header.php';
?>


<?php 
include_once 'partials/footer.php';