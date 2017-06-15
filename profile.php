<?php
    include_once 'header.php';
    include_once 'database.php';
    
    //shrani si id trenutno prijavljenega uporabnika
    $user_id = $_SESSION['user_id'];
    
    $query = "SELECT * FROM users WHERE id =$user_id";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_array($result);
?>

<link href="css/profile_style.css" rel="stylesheet" type="text/css" />

<table id="tableProjects" style="display: none;">
    <?php require('scripts/getProjects.php'); ?>
</table>

    
    
<table>
    <tr>
        <td colspan="2">
            <table id="project_table" tabindex="0">
                <tr>
                    <td>
                        <br><br>
                        <span id="title">No projects to show!</span>
                        <br>
                        <span id="price"></span>
                    </td>
                    <td class="right">
                    <div id="navigation">
                            <button type="button"onClick="previousTask('arrowLeftUser')"> &#8678;</button>
                            <span id="currProject">0</span>
                            <span id="cProject">/0</span>
                            <button type="button" onClick="nextTask('arrowRightUser')"> &#8680;</button>
                        </div>
                        <br><br>
                        <span id="start">

                        </span>
                        <br>
                        <span id="end">

                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <span id="skill">

                        </span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <span id="desc"></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="right">
                        <br>
                        <span id="empl">

                        </span>
                    </td>
                </tr>
            </table>
        </td>

        <td rowspan="2" id="profile">
            <div id="avatar_image">
                <?php
                    if (!empty($user['avatar'])) {
                        echo '<img src="'.$user['avatar'].'" alt="Avatar" height="100px" />';
                    }
                    else {
                        echo '<img src="slike/no.jpg" alt="Ni slike" height="100px" />';
                    }
                ?>
            </div>
            <div id="profile_info">
                <span id="name"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></span>
                <br>
                <span>
                    <?php 
                        $query = sprintf("SELECT title FROM countries WHERE id = %s", $user['country_id']);
                        $result = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_array($result)) {
                                echo $row['title'];
                        }
                    ?>
                </span>
            </div>

            <div id="desc_profile"> 
                <br>
                <span><?php echo $user['description'];?></span>
            </div>

            <div>
                <?php 
                    $sql = "SELECT COUNT(p.id) AS st_projektov FROM projects p INNER JOIN projects_users pu ON p.id = pu.project_id WHERE (pu.user_id = $user_id)";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                            echo '<span id="num_projects">Število projektov: '.$row['st_projektov'].'</span>';
                    }
                ?>
                <br>
                <span id="avg_score">Povrečna ocena: 4.2</span><br>
                <span id="num_coments">Število komentarjev: 16</span>
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <div id="vescine">
                <h2>Veščine</h2>
                <?php 
                        $query = "SELECT s.title FROM skills s INNER JOIN skills_users su ON s.id = su.skill_id WHERE su.user_id=$user_id AND s.id = su.skill_id";
                        $result = mysqli_query($link, $query);
                        while($row = mysqli_fetch_array($result)) {
                            echo '<span>'.$row['title'].'</span>';
                        }
                ?>
            </div>
            <div class="center">
                <form action="skills_profile_update.php" method="POST">    
                    <?php 
                        //zapomnim si trenute veščine, ki jih ima
                        $query = "SELECT * FROM skills_users WHERE user_id=$user_id";
                        $result = mysqli_query($link, $query);
                        //naredim prazno tabelo
                        $skills = array();
                        while($row = mysqli_fetch_array($result)) {
                            //napolnim tabelo z veščinami, ki jih obvladam :)
                            $skills[] = $row['skill_id'];
                        }    
                        $query = "SELECT * FROM skills";
                        $result = mysqli_query($link, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            if (in_array($row['id'], $skills)) {
                                echo '<input type="checkbox" 
                                        name=skills[] value="'.$row['id'].'" checked="checked" />'.$row['title'];
                            }
                            else {
                                echo '<input type="checkbox" 
                                        name=skills[] value="'.$row['id'].'" />'.$row['title'];
                            }
                            echo '<br />';
                        }

                    ?>
                    <input type="submit" value="Posodobi" />
                </form>
            </div>
        </td>
    </tr>
</table>
<?php
include_once 'footer.php';
?>

<script language="JavaScript" type="text/javascript"  src="js/showProjects.js"></script>

<script>
    window.onload = firstShow(); //notice no parenthesis
</script>