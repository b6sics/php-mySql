<?php
    session_start() ;
    session_unset($_SESSION['felhasznalo']) ;
    session_destroy();
    header('location: index.php');
?>
