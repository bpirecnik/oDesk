<?php
    include_once 'database.php';
    include_once 'session.php';
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $user_id = $_SESSION['user_id'];
    $id = (int) $_POST['id'];
    
    $query = sprintf("UPDATE projects SET title = '%s',
                                          description = '%s',
                                          start_date = '%s',
                                          end_date  = '%s'
                      WHERE (id = $id) AND (user_id = $user_id)", 
            mysqli_real_escape_string($link, $title),
            mysqli_real_escape_string($link, $description),
            mysqli_real_escape_string($link, $start_date),
            mysqli_real_escape_string($link, $end_date)); 
    
    //vnos podatkov v bazo
    mysqli_query($link, $query);    
    //preusmeritev
    header("Location: projects.php");
?>