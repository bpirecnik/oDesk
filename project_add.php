<?php
    include_once 'header.php';
?>

<link href="css/forms.css" rel="stylesheet" type="text/css"/>

<h1 id="center">Dodajanje projektov</h1>
<form action="project_insert.php" method="POST">
	<table id="login_table">
		<tr>
			<td class="input_desc">Ime:</td>
			<td class="input_table"><input type="text" placeholder="Vnesite ime projekta" name="title" required="required"/></td>
		</tr>
		<tr>
			<td class="input_desc">Okvirna cena::</td>
			<td class="input_table"><input type="text" placeholder="Vnesite okvirno ceno" name="price" required="required"/></td>
		</tr>
		<tr>
			<td class="input_desc">Datum začetka:</td>
			<td class="input_table"><input type="date" id="startdate" name="start_date" required="required"/></td>
		</tr>
		<tr>
			<td class="input_desc">Datum konca:</td>
			<td class="input_table"><input type="date" id="enddate" name="end_date"/></td>
		</tr>
		<tr>
			<td class="input_desc">Opis:</td>
			<td class="input_table"><textarea name="description" cols="15" rows="5" placeholder="Vnesi pobrobni opis projekta"></textarea></td>
		</tr>
		<tr>
			<td><input class="" type="submit" value="Vnesi"/></td>
			<td><input type="reset" value="Prekliči"/></td>
		</tr>
	</table>
</form>


<?php
    include_once 'footer.php';
?>