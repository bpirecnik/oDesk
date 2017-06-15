<?php
    include_once 'header.php';
?>

<link href="css/forms.css" rel="stylesheet" type="text/css"/>

<h1 id="center">Prijava</h1>

<form action="login_check.php" method="POST">
    <table id="login_table">
		<tr>
			<td class="input_desc">E-Pošta:</td>
			<td class="input_table"><input class="input_login" placeholder="Vaša e-pošta" type="email" name="email"/></td>
		</tr>
		<tr>
			<td class="input_desc">Geslo:</td>
			<td class="input_table"><input class="input_login" placeholder="Vnesite geslo" type="password" name="pass"/></td>
		</tr>
		<tr>
			<td><input class="login_button" type="submit" value="Prijava" /></td>
			<td><input class="login_button" type="reset" value="Prekliči" /></td>
		</tr>
	</table>
</form>

<?php
    include_once 'footer.php';
?>