<?php
    include_once 'header.php';
    include_once 'database.php';
    
    //sprejmem podatek za katero državo gre
    $id = (int) $_GET['id'];
    
    $query = "SELECT * FROM countries WHERE id=".$id;
    
    //pošljem ukaz v bazo in sprejmem podatke
    $result = mysqli_query($link, $query);
    
    //rezultat pretvorim v array
    $country = mysqli_fetch_array($result);
?>

<link href="css/forms.css" rel="stylesheet" type="text/css"/>

<h1 class="align_center">Dodajanje države</h1>
<form action="country_update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <table class="login_table">
		<tr>
			<td class="input_desc">Ime:</td>
			<td class="input_table"><input class="input_login" type="text" name="title" value="<?php echo $country['title']; ?>" /></td>
		</tr>
		<tr>
			<td class="input_desc">Kratica:</td>
			<td class="input_table"><input class="input_login" type="text" name="short" value="<?php echo $country['short']; ?>"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input class="login_button" type="submit" value="Vnesi" /></td>
		</tr>
	</table>
</form>


<?php
    include_once 'footer.php';
?>