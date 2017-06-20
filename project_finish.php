<?php
    include_once 'header.php';
    include_once 'database.php';
    
    if(isset($_GET['project'])){
        $id = $_GET['project'];
    }
    echo $user_id;
    echo $id;
    $update = "UPDATE projects SET stage = 3 WHERE id = $id";
    mysqli_query($link, $update);
    header("Location: projects.php?tab=1")
?>