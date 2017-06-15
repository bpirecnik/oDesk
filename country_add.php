<?php
    include_once 'header.php';
?>

<link href="css/forms.css" rel="stylesheet" type="text/css"/>

<h1 class="align_center">Dodajanje države</h1>
<form action="country_insert.php" method="POST">
		<table class="login_table">
			<tr>
				<td class="input_desc">Ime:</td>
				<td class="input_table"><input class="input_login" placeholder="Vpišite ime države" type="text" name="title"/></td>
			</tr>
			<tr>
				<td class="input_desc">Kratica:</td>
				<td class="input_table"><input class="input_login" placeholder="Vpišite kratico države" type="text" name="short"/></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input class="login_button" type="submit" value="Vnesi"/></td>
			</tr>
		</table>
</form>


<?php
    include_once 'footer.php';
?>