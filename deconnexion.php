<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: co_inscript.php");
?>