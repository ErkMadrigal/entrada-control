<?php
    include './config.php';
    session_start();
    session_destroy();
    header('location:'.$raiz.'index.php');
?>