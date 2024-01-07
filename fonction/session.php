<?php

function verification (): bool {
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    return !empty($_SESSION['name']);
}

function acces(): void {
    if(!verification()){
        header('location:../index.php');
        exit();
    }
}

?>