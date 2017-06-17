<?php
include_once 'header.php';
include_once 'database.php';
?>

<link href="css/projects.css" rel="stylesheet" type="text/css"/>

<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM projects WHERE id = $id";
    $result = mysqli_query($link, $query);

    //izpisal bom vse projekte
    while ($row = mysqli_fetch_array($result)) {
        echo "<span>".$row['title']."</span><br>";
        echo "<span>".$row['price']." €</span><br>";
        echo "<span>".$row['start_date']."</span><br>";
        echo "<span>".$row['end_date']."</span><br>";
        echo "<span>".$row['description']."</span><br>";
        echo '<span><a href="project_info.php?id='.$row['id'].'">Prijava</a></span><br>';
        if(isset($_SESSION['admin']) == 1){
            echo "<span><a href='project_delete.php'>Izbris</a></span><br>";
        }
    }
?>

<?php
include_once 'footer.php';
?>