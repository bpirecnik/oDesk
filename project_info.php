<?php
include_once 'header.php';
include_once 'database.php';
?>

<link href="css/projects.css" rel="stylesheet" type="text/css"/>

<?php
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }
    $id = $_GET['id'];
    $creator = $_GET['cre'];
    
    $test = "SELECT COUNT(id) AS number FROM projects_users WHERE (user_id = $user_id) AND project_id = $id AND role_id=2;";
    $result = mysqli_query($link, $test);

    while ($row = mysqli_fetch_array($result)) {
        $count = $row['number'];
    }
    
    $query = "SELECT p.*, u.first_name, u.last_name, u.id AS uID, c.title AS category FROM projects p INNER JOIN categories c ON c.id=p.category_id INNER JOIN projects_users pu ON p.id = pu.project_id INNER JOIN users u ON u.id = pu.user_id WHERE pu.project_id=$id AND p.stage=1 AND u.id!=$user_id ORDER BY p.start_date DESC LIMIT 1";
    $result = mysqli_query($link, $query);
		
    while ($row = mysqli_fetch_array($result)) {
        echo "<div id='project'>";
            echo "<table id='project_table' border='black 2px dotted'";
                echo "<tr>";
                    echo "<td><span id='title'>".$row['title']."</span></td>";
                    echo "<td><span id='time_added'>Dodano ".$row['start_date']."</span></td>";
                echo "</tr>";
                echo "<tr>";
                    echo '<td><span id="creator"><a href="profiles.php?id='.$row['uID'].'">'.$row['first_name'].' '.$row['last_name'].'</a></span>';
                    echo'<br><span id="price">'.$row['price'].' €</span><br><span id="category">'.$row['category'].'</span></td>';
                    echo '<td><span id="end">'.$row['end_date'].'</span></td>';
                echo "</tr>";
                echo "<tr>";
                    echo '<td colspan=2><span id="desc">'.$row['description'].'</span></td>';
                echo "</tr>";
                echo '<tr><td colspan=2>';
                    if($count==0){
                        echo '<span><a href="project_signup.php?id='.$row['id'].'&cre='.$creator.'">Prijava</a></span><br>';
                    }else{
                        echo '<span>Na projekt ste ze prijavljeni</span><br>';
                    }
                echo '</td></tr>';
            echo '</table>';
        echo "</div><br>";
    }
?>

<?php
include_once 'footer.php';
?>