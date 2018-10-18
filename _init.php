<?php
session_start();

include_once('_CONFIG.PHP');
include_once('classes/_DB.php');
include_once('classes/_MODEL.php');
include_once('classes/Login.php');

if (!Login::estaLogado() &&
        !Login::permiteAcessoSemLogin(basename($_SERVER['PHP_SELF'],'.php'))){
            header('Location:login.php');
    
}




