<?php
    include_once 'header.php';
    include_once 'database.php';
    
    //sprejmem podatek za katero državo gre
    $id = (int) $_GET['id'];
    
    $query = "SELECT * FROM skills WHERE id=".$id;
    
    //pošljem ukaz v bazo in sprejmem podatke
    $result = mysqli_query($link, $query);
    
    //rezultat pretvorim v array
    $skill = mysqli_fetch_array($result);
?>

<h1>Urejanje veščine</h1>
<form action="skill_update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    Ime: <input type="text" name="title" value="<?php echo $skill['title']; ?>" /><br />
    Opis: <textarea name="description" cols="15" rows="5" placeholder="Vnesi pobrobni opis veščine"><?php echo $skill['description']; ?></textarea><br />
    <input type="submit" value="Vnesi" />
</form>


<?php
    include_once 'footer.php';
?>