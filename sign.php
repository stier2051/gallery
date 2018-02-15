<?php

include 'dataManager.php';

session_start();
$login = trim($_POST['username']);
$pass = trim($_POST['password']);

if (!$_POST) {
    exit();
}
if (empty($login) || empty($pass)) {
    die("Пожалуйста введите логин и пароль!");
} else {
    $user = new dataManager;
    $total_users = $user->getRow("SELECT * FROM user_list WHERE user_name = '$login' AND pass = '$pass'");
    foreach ($total_users as $user_row) {
        $db_user = $user_row['user_name'];
        $db_pass = $user_row['pass'];
        $db_status = $user_row['status'];
        
    }
    
    if ($login == $db_user && $pass == $db_pass) {
        $_SESSION['user_name'] = $db_user;
        $_SESSION['status'] = $db_status;
        header("Location: index.php");
    } else {
        echo "нет такого пользователя";
    }
     
}