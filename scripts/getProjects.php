<?php
    if (isset($_SESSION['user_id'])){
            include_once 'database.php';
            
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT p.title AS projectTitle, p.price, p.start_date, p.end_date, p.description, s.title AS skillTitle
                    FROM projects p INNER JOIN projects_users pu ON p.id = pu.project_id
                    INNER JOIN users u on u.id=pu.user_id INNER JOIN skills s ON s.id=pu.skill_id
                    WHERE (pu.user_id = $user_id) AND (p.stage = 3)";
            $cnt = 0;
            $class;
            
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($result)){
                $cnt++;
                $class = "row"."$cnt";

                $name= $row['projectTitle'];
                $desc = $row['description'];
                $datestart = $row['start_date'];
                $dateend = $row['end_date'];
                $price = $row['price'];
                $skill = $row['skillTitle'];

                echo "<tr class='$class'>";
                echo "<td class='cell1'>$name</td>", "<td class='cell2'>$desc</td>";
                echo "<td class='cell3'>$datestart</td>";
                echo "<td class='cell4'>$dateend</td>";
                echo "<td class='cell5'>$price</td>";
                echo "<td class='cell6'>$skill</td>";
                echo "</tr>";
            }
        }
?>

