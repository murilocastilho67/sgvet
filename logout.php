<?php
session_start();
#sair do sistema
unset($_SESSION['login']);
header('Location: login.php')
?>