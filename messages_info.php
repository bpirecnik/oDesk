<?php
    include_once 'header.php';
    include_once 'database.php';
    
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    
    $update = "UPDATE messages SET seen = 1 WHERE id = $id";
    mysqli_query($link, $update);
?>
<div>
    <table border="2px black solid">
        <tr>
            <td>
                <span>From</span>
            </td>
            <td>
                <span>Date</span>
            </td>
            <td>
                <span>Title</span>
            </td>
            <td>
                <span>Content</span>
            </td>
        </tr>
        <?php
            $sql = "SELECT m.*, u.first_name, u.last_name, u.id AS sender FROM messages m INNER JOIN users u ON u.id = m.userfrom_id WHERE m.userto_id = $user_id AND m.id = $id";
            $result = mysqli_query($link, $sql);
            while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>"; 
                    echo "<td>";
                        echo $row['first_name']." ". $row['last_name'];
                    echo "</td>";
                    
                    echo "<td>";
                        echo $row['date'];
                    echo "</td>";
                    
                    echo "<td>";
                        echo $row['title'];
                    echo "</td>";
                    
                    echo "<td>";
                        echo $row['content'];
                    echo "</td>";
                    echo "<td>";
                        echo "<a href='messages_new.php?sender=".$row['sender']."&tab=6'>Odgovori</a>";
                    echo "</td>";
                  echo "</tr>";  
            }
        ?>
    </table>
</div>
<?php
include_once 'footer.php';
?>