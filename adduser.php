<?php
    include_once 'header.php';
    include_once 'database.php';
    
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
    }
    
    if(isset($_GET['project'])){
        $id = $_GET['project'];
    }
    echo $user_id;
    echo $id;
    $update = "UPDATE projects_users SET role_id = 3 WHERE user_id = $user_id AND project_id = $id";
    mysqli_query($link, $update);
    header("Location: projects.php?tab=1")
?>