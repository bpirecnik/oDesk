<?php
    include_once 'database.php';
    include_once 'session.php';
    
    $title = $_POST['title'];
    $category = (int) $_POST['category'];    
    $price = (int) $_POST['price'];    
    $end_date = $_POST['end_date'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

	
    
    $query = sprintf("INSERT INTO projects(title, category_id, price, start_date, end_date, 
                                            description, stage)
              VALUES('%s','%s','%s',CURRENT_TIMESTAMP, '%s', '%s', 1)", 
            mysqli_real_escape_string($link, $title),
            mysqli_real_escape_string($link, $category),
            mysqli_real_escape_string($link, $price),
            mysqli_real_escape_string($link, $end_date),			
            mysqli_real_escape_string($link, $description));

    //vnos podatkov v bazo
    mysqli_query($link, $query);
    $sql = "INSERT INTO projects_users(role_id, user_id, project_id) VALUES (1, $user_id, (SELECT id FROM projects WHERE (title LIKE '$title') AND (price = $price) AND (description LIKE '$description') AND (stage = 1)))";
    mysqli_query($link, $sql);
    //preusmeritev
    header("Location: projects.php")
?>