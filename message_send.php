<?php
    include_once 'database.php';
    include_once 'session.php';
    
    $title = $_POST['title'];   
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];
    $recieve_id = $_GET['sender'];
    $query = sprintf("INSERT INTO messages (userfrom_id, userto_id, seen, content, title, date)
              VALUES($user_id, $recieve_id, 0, '%s', '%s', CURRENT_TIMESTAMP)", 			
            mysqli_real_escape_string($link, $description),
            mysqli_real_escape_string($link, $title));

    mysqli_query($link, $query);
    header("Location: messages.php?tab=6");
?>