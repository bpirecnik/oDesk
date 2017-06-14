<?php
    session_start();
    
    //če je prijavljen, vse ok
    //če ni, ga preusmerim na prijavo
    //izključim strani, potrebne za prvi obisk
    
	if (!isset($_SESSION['user_id']) &&
            ($_SERVER['REQUEST_URI'] != '/Projekt_oDesk/login.php') &&
            ($_SERVER['REQUEST_URI'] != '/Projekt_oDesk/user_add.php') &&
            ($_SERVER['REQUEST_URI'] != '/Projekt_oDesk/login_check.php') &&
            ($_SERVER['REQUEST_URI'] != '/Projekt_oDesk/index.php')) {
        header("Location: login.php");
    }
?>