<?php
    include_once 'header.php';
?>

<link href="css/forms.css" rel="stylesheet" type="text/css"/>

<h1 class="align_center">Prijava</h1>

<form action="login_check.php" method="POST">
    <table class="login_table">
		<tr>
			<td class="input_desc">E-Pošta:</td>
			<td class="input_table"><input class="input_login" placeholder="Vaša e-pošta" type="email" name="email"/></td>
		</tr>
		<tr>
			<td class="input_desc">Geslo:</td>
			<td class="input_table"><input class="input_login" placeholder="Vnesite geslo" type="password" name="pass"/></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input class="login_button" type="submit" value="Prijava" />
				<input class="login_button" type="reset" value="Prekliči" />
			</td>
		</tr>
	</table>
</form>

<?php
    include_once 'footer.php';
?>