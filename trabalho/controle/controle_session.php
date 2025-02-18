<?php

session_start();

if ($_SESSION['controle_login'] == false || $_SESSION['login_ok'] == false) {
    header('Location: login.php?erro=sem_acesso');
}
?>