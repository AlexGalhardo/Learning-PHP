<?php
session_start();

unset($_SESSION['banco']);
header("Location: index.php");
exit;