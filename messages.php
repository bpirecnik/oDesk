<?php
    include_once 'header.php';
    include_once 'database.php';
    
    if(isset($_SESSION['user_id'])){
        $user = $_SESSION['user_id'];
    }
?>
<div>
    <span><a href='messages.php?tab=6'>Prejeta sporočila</a></span>
    <span><a href='messages.php?id=<?php echo $user; ?>&tab=6'>Poslana sporočila</a></span>
    
    <table border="2px black solid">
        <tr>
            <td>
                <?php
                if(isset($_GET['id'])){
                    echo "<span>Prejemnik</span>";
                }else{
                    echo "<span>Pošiljatelj</span>";
                }
                ?>
            </td>
            <td>
                <span>Datum</span>
            </td>
            <td>
                <span>Naslov</span>
            </td>
            <td>
                <span>Vsebina</span>
            </td>
            <td>
                <span>Stanje</span>
            </td>
        </tr>
        <?php
            
            if(isset($_GET['id'])){
                $sql = "SELECT m.*, u.first_name, u.last_name, u.id AS sender FROM messages m INNER JOIN users u ON u.id = m.userfrom_id WHERE m.userfrom_id = $user";
            }else{
                $sql = "SELECT m.*, u.first_name, u.last_name, u.id AS sender FROM messages m INNER JOIN users u ON u.id = m.userfrom_id WHERE m.userto_id = $user";
            }
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
                        if($row['seen']==1){
                            echo "Pregledano";
                        }else{
                            echo "Nepregledano";
                        }
                    echo "</td>";
                        if(!isset($_GET['id'])){
                            echo "<td>";
                            echo "<a href='messages_info.php?id=".$row['id']."&sender=".$row['sender']."&tab=6'>Odgovori</a>";
                            echo "</td>";
                        }
                  echo "</tr>";  
            }
        ?>
    </table>
</div>
<?php
include_once 'footer.php';
?>
