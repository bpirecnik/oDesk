<?php
    include_once 'header.php';
    include_once 'database.php';    
    //sprejmem podatek za katero državo gre
    $id = (int) $_GET['id'];
    $user_id = $_SESSION['user_id'];    
    $query = "SELECT * 
              FROM projects 
              WHERE (id=$id) AND (user_id = $user_id)";
    
    //pošljem ukaz v bazo in sprejmem podatke
    $result = mysqli_query($link, $query);
    //zaščita, preveri če je dobil kaj iz baze
    if (mysqli_num_rows($result) != 1) {
        $_SESSION['error'] = 'Ne ga srat stari!';
        header("Location: projects.php");
        die();
    }
    //rezultat pretvorim v array
    $project = mysqli_fetch_array($result);
?>

<h1>Dodajanje projektov</h1>
<form action="project_update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    Ime: <input type="text" name="title" required="required" value="<?php echo $project['title']; ?>"/><br />
    Datum začetka: <input type="text" id="startdate" name="start_date" required="required" value="<?php echo $project['start_date']; ?>" /><br />
    Datum konca: <input type="text" id="enddate" name="end_date" value="<?php echo $project['end_date']; ?>" /><br />
    Opis: <textarea name="description" cols="15" rows="5" placeholder="Vnesi pobrobni opis projekta"><?php echo $project['description']; ?></textarea><br />
    <input type="submit" value="Vnesi" /> 
    <input type="reset" value="Prekliči" />
</form>


<?php
    include_once 'footer.php';
?>