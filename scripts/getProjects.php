<?php
    if (isset($_SESSION['user_id'])){
            include_once 'database.php';
            
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM projects";
            $cnt = 0;
            $name;
            
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($result)){
                
            }
        }
?>