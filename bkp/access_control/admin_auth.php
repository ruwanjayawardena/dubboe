<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_SESSION['usr_id']) && !empty($_SESSION['usr_id'])) {
    if ($_SESSION['usr_cat_id'] == 1) {
        //super admin
        header('Location: dashboard.php');
    }  else if ($_SESSION['usr_cat_id'] >= 3) {
        //other category
        header('Location: ../index.php');
    }
} else {
    header('Location: ../index.php');
}
?>

