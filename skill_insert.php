<?php
    include_once 'database.php';
    
    $title = $_POST['title'];
    $description = $_POST['description'];
	$category_id = (int) $_POST['category_id'];
    
    $query = sprintf("INSERT INTO skills(category_id, title, description)
              VALUES(".$category_id.", '%s', '%s')", 
			mysqli_real_escape_string($link, $title),
            mysqli_real_escape_string($link, $description)); 
    
    //vnos podatkov v bazo
    mysqli_query($link, $query);    
    //preusmeritev
    header("Location: skill_add.php");
?>