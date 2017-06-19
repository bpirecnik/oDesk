<?php
    include_once 'database.php';
    include_once 'session.php';
    
    if(isset($_GET['id']) && isset($_GET['cre'])){
        $projectid = $_GET['id'];
        $creator = $_GET['cre'];
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            //vnos podatkov v bazo
            $sql = "INSERT INTO projects_users(role_id, user_id, project_id) VALUES (2, $user_id, $projectid)";
            mysqli_query($link, $sql);
            
            $sql = "INSERT INTO messages (userfrom_id, userto_id, seen, content, title, date) VALUES ($user_id, $creator, '0', 'Hi i just signed up to your project named: ', 'Signed up to project', CURRENT_TIMESTAMP);";
            mysqli_query($link, $sql);
        }
        header("Location: project_info.php?id=$projectid&cre=$creator");
    }
?>