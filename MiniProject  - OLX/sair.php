<?php
// pego a váriavel $_SESSION
session_start();
unset($_SESSION['cLogin']);
header("Location: ./");
?>

