<?php
    include_once 'database.php';
    include_once 'session.php';
    
    $title = $_POST['title'];
	$price = (int) $_POST['price'];    
	$start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
	$description = $_POST['description'];
//  $user_id = $_SESSION['user_id'];

	
    
    $query = sprintf("INSERT INTO projects(title, price, start_date, end_date, 
                                            description, stage)
              VALUES('%s','%s','%s', '%s', '%s', 1)", 
            mysqli_real_escape_string($link, $title),
            mysqli_real_escape_string($link, $price),
			mysqli_real_escape_string($link, $start_date),
            mysqli_real_escape_string($link, $end_date),			
			mysqli_real_escape_string($link, $description));

    
    //vnos podatkov v bazo
    mysqli_query($link, $query);    
    //preusmeritev
    header("Location: project_add.php");
?>