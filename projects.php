<?php
include_once 'header.php';
include_once 'database.php';
?>

<link href="css/projects.css" rel="stylesheet" type="text/css"/>

<h1>Pregled projektov</h1>

<table border="1" cellspacing="0" cellpadding="0" id="izpis_projekti">
    <tr>
        <th>Št.</th>
        <th>Ime</th>
        <th>Okvirna cena</th>
        <th>Datum začetka</th>
		<th>Datum konca</th>
		<th>Opis</th>
		<th>Stopnja</th>
		<th>Prijava na projekt</th>
		<?php if(isset($_SESSION['admin']) == 1){ ?>
		<th>Izbris projekta</th>
		<?php } ?>
    </tr>
    <?php 
        $query = "SELECT * FROM projects";
        $result = mysqli_query($link, $query);
		
        //izpisal bom vse projekte
        $st = 1;
        while ($row = mysqli_fetch_array($result)) {
            
            echo "<tr>";
            echo "<td>$st</td>";
            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['price']."</td>";
			echo "<td>".$row['start_date']."</td>";
			echo "<td>".$row['end_date']."</td>";
			echo "<td>".$row['description']."</td>";
			echo "<td>".$row['stage']."</td>";
			echo "<td><a href=''>Prijava</a></td>";
			if(isset($_SESSION['admin']) == 1){
			echo "<td><a href='project_delete.php'>Izbris</a></td>";
			}
            echo "</tr>";
			$st++;
        }
    ?>
</table>

<?php
include_once 'footer.php';
?>