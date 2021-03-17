<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (isset($_SESSION['usr_id']) && !empty($_SESSION['usr_id'])) {
    if ($_SESSION['usr_cat_id'] == 1) {
        //super admin
        header('Location: bkp/dashboard.php');
    } else if ($_SESSION['usr_cat_id'] == 2) {
        //admin
        header('Location: bkp/dashboard-admin.php');
    } else if ($_SESSION['usr_cat_id'] == 4) {
        //user category
        header('Location: dashboard-runner.php');
    }
} else {
    header('Location: index.php');
}
?>
