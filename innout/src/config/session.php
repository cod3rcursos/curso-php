<?php

function requireValidSession($requiresAdmin = false)
{
    $user = isset($user) ? $_SESSION['user'] : null;
    if (!isset($user)) {
        header('Location: login.php');
        exit();
    } elseif ($requiresAdmin && !$user->is_admin) {
        addErrorMsg('Acesso negado!');
        header('Location: day_records.php');
        exit();
    }
}
