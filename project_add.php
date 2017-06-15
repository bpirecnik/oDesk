<?php
    include_once 'header.php';
?>

<link href="css/forms.css" rel="stylesheet" type="text/css"/>

<h1 class="align_center">Dodajanje projektov</h1>
<form action="project_insert.php" method="POST">
	<table class="login_table">
		<tr>
			<td class="input_desc">Ime:</td>
			<td class="input_table"><input type="text" class="input_login" placeholder="Vnesite ime projekta" name="title" required="required"/></td>
		</tr>
		<tr>
			<td class="input_desc">Okvirna cena::</td>
			<td class="input_table"><input type="text" class="input_login" placeholder="Vnesite okvirno ceno" name="price" required="required"/></td>
		</tr>
		<tr>
			<td class="input_desc">Datum začetka:</td>
			<td class="input_table"><input type="date" class="input_login" id="start_date" name="start_date" required="required" step="1"/></td>
		</tr>
		<tr>
			<td class="input_desc">Datum konca:</td>
			<td class="input_table"><input type="date" class="input_login" id="end_date" name="end_date" step="1"/></td>
		</tr>
		<tr>
			<td class="input_desc">Opis:</td>
			<td><textarea name="description" class="input_login2" cols="15" rows="5" placeholder="Vnesi pobrobni opis projekta"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input class="login_button" type="submit" value="Vnesi"/>
				<input class="login_button" type="reset" value="Prekliči"/>
			</td>
		</tr>
	</table>
</form>


<?php
    include_once 'footer.php';
?>