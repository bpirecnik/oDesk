<?php
    include_once 'database.php';
	include_once 'header.php';
?>

<link href="css/forms.css" rel="stylesheet" type="text/css"/>

<h1 class="align_center">Dodajanje veščin</h1>
<form action="skill_insert.php" method="POST">
    <table class="login_table">
		<tr>
			<td class="input_desc">Ime:</td>
			<td class="input_table"><input class="input_login" placeholder="Ime veščine" type="text" name="title"  /></td>
		</tr>
		<tr>
			<td class="input_desc">Opis:</td>
			<td class="input_table"><textarea class="input_login2" name="description" cols="15" rows="5" placeholder="Vnesi pobrobni opis veščine"></textarea></td>
		</tr>
		<tr>
			<td class="input_desc">Kategorija:</td>
			<td>
			<select class="input_login" name="country_id">        
				<?php
					$query = "SELECT * FROM categories";
					$result = mysqli_query($link, $query);
					while ($row = mysqli_fetch_array($result)) {
						echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
					}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input class="login_button" type="submit" value="Vnesi"/>
				<input class="login_button" type="reset" value="Prekliči"/>
			</td>
		</tr>
	</table>
</form>


<?php
    include_once 'footer.php';
?>