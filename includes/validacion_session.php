<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../../index.php');
    }
?>