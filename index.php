<?php

session_start();
if( isset($_SESSION['login'])){
    header(header: 'Location: inicio.php');
}else{
    header(header: 'Location: login.php');
}


?>