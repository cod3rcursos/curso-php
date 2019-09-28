<?php
session_start();
requireValidSession();

$user = $_SESSION['user'];
$records = WorkingHours::loadFromUserAndDate($user->id, date('Y-m-d'));

try {
    $currentTime = strftime('%H:%M:%S', time());

    if($_POST['forcedTime']) {
        $currentTime = $_POST['forcedTime'];
    }

    $records->innout($currentTime);
    addSuccessMsg('Ponto inserido com sucesso!');
} catch(AppException $e) {
    addErrorMsg($e->getMessage());
}

header('Location: day_records.php');