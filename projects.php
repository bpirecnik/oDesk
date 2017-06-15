<?php
include_once 'header.php';
include_once 'database.php';
?>

<link href="css/projects.css" rel="stylesheet" type="text/css"/>

<h1>Pregled projektov</h1>

<table border="1" cellspacing="0" cellpadding="0" id="izpis_projekti">
    <tr>
            <th>Ime</th>
            <th>Okvirna cena</th>
            <th>Datum začetka</th>
            <th>Datum konca</th>
            <th>Opis</th>
            <th>Uporabnik</th>
            <th>Prijava na projekt</th>
            <?php if(isset($_SESSION['admin']) == 1){ ?>
            <th>Izbris projekta</th>
            <?php } ?>
    </tr>
    
    <?php 
        $query = "SELECT p.*, u.first_name, u.last_name, u.id AS uID FROM projects p INNER JOIN projects_users pu ON p.id = pu.project_id INNER JOIN users u ON u.id = pu.user_id WHERE p.id=pu.project_id AND pu.role_id = 1";
        $result = mysqli_query($link, $query);
		
        //izpisal bom vse projekte
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['price']." €</td>";
            echo "<td>".$row['start_date']."</td>";
            echo "<td>".$row['end_date']."</td>";
            echo "<td>".$row['description']."</td>";
            echo '<td><a href="profiles.php?id='.$row['uID'].'">'.$row['first_name'].' '.$row['last_name'].'</a></td>';
            echo '<td><a href="project_info.php?id='.$row['id'].'">Prijava</a></td>';
            if(isset($_SESSION['admin']) == 1){
                echo "<td><a href='project_delete.php'>Izbris</a></td>";
            }
            echo "</tr>";
        }
    ?>
</table>

<?php
include_once 'footer.php';
?>