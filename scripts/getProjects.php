<?php
    if (isset($_SESSION['user_id'])){
            include_once 'database.php';
            
            $user_id = $_SESSION['user_id'];
            
            $sql = "SELECT * FROM projects p INNER JOIN projects_users pu ON p.id = pu.project_id INNER JOIN users u on u.id=pu.user_id WHERE (pu.user_id = $user_id)";
            
            $cnt = 0;
            $class;
            
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($result)){
			$cnt++;
			$class = "row"."$cnt";
			
			$name= $row['title'];
			$description = $row['description'];
			$datestart = $row['start_date'];
			$dateend = $row['start_date'];
			$price = $row['start_date'];
			
			echo "<tr id='$class'>";
			echo "<td class='cell1'>$name</td>", "<td class='cell2'>$description</td>", "<td class='cell3'>$datestart</td>", "<td class='cell4'>$dateend</td>", "<td class='cell5'>$price</td>";
			echo "</tr>";
		}
        }
?>