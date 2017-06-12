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

<table id="tableProjects">
    <?php require('scripts/getProjects.php'); ?>
</table>

<table>
    <tr>
        <td colspan="2">
            <table id="project_table">
            <tr>
                <td>
                    <br><br>
                    <span id="title"></span>
                    <br>
                    <span id="price"></span>
                </td>
                <td class="right">
                <div id="navigation">
                        <button type="button"onClick="previousTask('arrowLeftUser')"> &#8678;</button>
                        <span id="currProject" onMouseUp="isClicked('user')">0</span>
                        <span id="cProject">/0</span>
                        <button type="button" onClick="nextTask('arrowRightUser')"> &#8680;</button>
                    </div>
                    <br><br>
                    <span id="start">
                        Started:
                    </span>
                    <br>
                    <span id="end">
                        Ended:
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <span id="">
                        Worked as: C++ programmer
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
                    <span id="creator">
                        Employer: Jon Snow
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
                <span id="num_projects">Projekti: 17</span><br>
                <span id="avg_score">Povrečna ocena: 4.2</span><br>
                <span id="num_coments">Število komentarjev: 16</span>
            </div>
        </td>
    </tr>

    <tr>
        <td>
            <h2>Veščine</h2>
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

        <td>
            <h2>Dokumenti</h2>
            <form action="document_insert.php" method="POST" enctype="multipart/form-data">
                Naslov: <input type="text" name="title" /><br />
                Opis: <textarea name="description" cols="15" rows="5"></textarea><br />
                Datoteka: <input type="file" name="fileToUpload" /><br />
                <input type="submit" name="submit" value="Naloži" />
            </form>
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