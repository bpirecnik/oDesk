<?php
    include_once 'database.php';
    include_once 'session.php';
    //prisilno pretvorim dobljeno številko v int
    $id = (int) $_GET['id'];
    //zaščita
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM projects WHERE id = $id";
    $result = mysqli_query($link, $query);
    $project = mysqli_fetch_array($result);
    if ($project['user_id'] != $user_id) {
        $_SESSION['error'] = 'Chuck Norris te bo ubil :P';
        header("Location: projects.php");
        die();
    }
    //zašita 2
    $query = "DELETE FROM projects 
              WHERE (user_id=$user_id) AND (id=$id)";
    //pošljem ukaz v bazo
    mysqli_query($link, $query);
    
    //preusmerim nazaj na seznam
    header("Location: projects.php");
?>