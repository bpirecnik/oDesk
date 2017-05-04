<?php
    session_start();
    
    //če je prijavljen, vse ok
    //če ni, ga preusmerim na prijavo
    //izključim strani, potrebne za prvi obisk
    if (!isset($_SESSION['user_id']) &&
            ($_SERVER['REQUEST_URI'] != '/odesk/login.php') &&
            ($_SERVER['REQUEST_URI'] != '/odesk/user_add.php') &&
            ($_SERVER['REQUEST_URI'] != '/odesk/login_check.php') &&
            ($_SERVER['REQUEST_URI'] != '/odesk/index.php')) {
        header("Location: login.php");
    }
?>