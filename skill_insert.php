<?php
    include_once 'database.php';
    
    $title = $_POST['title'];
    $description = $_POST['description'];    
    
    $query = sprintf("INSERT INTO skills(title, description)
              VALUES('%s', '%s')", 
            mysqli_real_escape_string($link, $title),
            mysqli_real_escape_string($link, $description)); 
    
    //vnos podatkov v bazo
    mysqli_query($link, $query);    
    //preusmeritev
    header("Location: skill_add.php");
?>