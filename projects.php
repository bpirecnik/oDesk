<?php
include_once 'header.php';
include_once 'database.php';
if(isset($_SESSION['user_id'])){
    $user = $_SESSION['user_id'];
}
?>

<link href="css/projects.css" rel="stylesheet" type="text/css"/>

<h1>Pregled projektov</h1>
    <span><a href='projects.php?tab=1'>Vsi projekti</a></span>
    <span><a href='projects.php?id=<?php echo $user; ?>&tab=1'>Moji projekti</a></span>
    <?php 
        if(isset($_GET['id'])){
            $query = "SELECT p.*, u.first_name, u.last_name, u.id AS uID, c.title AS category FROM projects p INNER JOIN categories c ON c.id=p.category_id INNER JOIN projects_users pu ON p.id = pu.project_id INNER JOIN users u ON u.id = pu.user_id WHERE p.id=pu.project_id AND pu.role_id = 1 AND p.stage=1 AND u.id=$user ORDER BY p.start_date DESC";
        }else{
            $query = "SELECT p.*, u.first_name, u.last_name, u.id AS uID, c.title AS category FROM projects p INNER JOIN categories c ON c.id=p.category_id INNER JOIN projects_users pu ON p.id = pu.project_id INNER JOIN users u ON u.id = pu.user_id WHERE p.id=pu.project_id AND pu.role_id = 1 AND p.stage=1 AND u.id!=$user ORDER BY p.start_date DESC";
        }
        $result = mysqli_query($link, $query);
		
        //izpisal bom vse projekte
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
                    echo '<tr>';
                    if(isset($_GET['id'])){
                        echo '<td colspan=2><span id="button"><a href="project_info.php?id='.$row['id'].'&cre='.$row['uID'].'&tab=1">Ogled projekta</a></span>';
                    }else{
                        echo '<td colspan=2><span id="button"><a href="project_info.php?id='.$row['id'].'&cre='.$row['uID'].'&tab=1">Ogled projekta</a></span>';
                    }
                    echo '</tr>';
                echo '</table>';
                if(isset($_SESSION['admin']) == 1){
                    echo "<span><a href='project_delete.php'>Izbris</a></span>";
                }
            echo "</div><br>";
        }
    ?>
</table>

<?php
include_once 'footer.php';
?>