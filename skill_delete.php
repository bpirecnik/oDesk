<?php
    include_once 'database.php';
    //prisilno pretvorim dobljeno številko v int
    $id = (int) $_GET['id'];
    
    $query = "DELETE FROM skills WHERE id=".$id;
    //pošljem ukaz v bazo
    mysqli_query($link, $query);
    
    //preusmerim nazaj na seznam
    header("Location: skills.php");
?>