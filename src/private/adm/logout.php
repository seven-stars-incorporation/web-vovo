<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['idUser']);
    unset($_SESSION['isAdm']);
    session_commit();
    session_unset();    
    session_destroy();
    header("Location: ../../index.php");
?>