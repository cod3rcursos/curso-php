<?php
session_start();
session_destroy();
unset($_COOKIE['usuario']);
setcookie('usuario', '');
header('Location: login.php');