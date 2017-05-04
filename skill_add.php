<?php
    include_once 'header.php';
?>

<h1>Dodajanje veščin</h1>
<form action="skill_insert.php" method="POST">
    Ime: <input type="text" name="title"  /><br />
    Opis: <textarea name="description" cols="15" rows="5" placeholder="Vnesi pobrobni opis veščine"></textarea><br />
    <input type="submit" value="Vnesi" /> 
    <input type="reset" value="Prekliči" />
</form>


<?php
    include_once 'footer.php';
?>