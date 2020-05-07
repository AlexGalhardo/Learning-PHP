<?php
session_start();
unset($_SESSION['mmnlogin']);
header("Location: login.php");
exit;