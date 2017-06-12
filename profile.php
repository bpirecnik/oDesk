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
                    <span id="title">
                        <?php
                            $hash = hash('md5', $user['first_name']." ".$user['last_name']);
                            $query = sprintf("SELECT * FROM projects p INNER JOIN projects_users pu ON p.id = pu.project_id WHERE (pu.user_id = (SELECT id FROM users u WHERE u.hashcode LIKE '%s'))", $hash);
                            $result = mysqli_query($link, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                    echo $row['title'];
                            }
                        ?>
                    </span>
                    <br>
                    <span id="price">
                        1200 €
                    </span>
                </td>
                <td class="right">
                    <span id="start">
                        Started: 06-11-2017
                        <br>
                        Ended: 01-17-2018
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <span id="end">
                        Worked as: C++ programmer
                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <span id="desc">
                        Creating web page with already established layout.Creating web page with already established layout.Creating web page with already established layout.Creating web page with already established layout.Creating web page with already established layout.Creating web page with already established layout.Creating web page with already established layout.Creating web page with already established layout.
                    </span>
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
                <span id="num_projects">Projekti: 17</span>
                <span id="avg_score">Povrečna ocena: 4.2</span>
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