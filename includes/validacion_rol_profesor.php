<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../../index.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: inicio2.php');
        }
    }


?>