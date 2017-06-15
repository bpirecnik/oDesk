<?php
include_once 'header.php';
include_once 'database.php';
?>

<link href="css/register.css" rel="stylesheet" type="text/css"/>

<form action="user_insert.php" method="POST" onsubmit="return validateForm()">
	<table id="login_table">
		<tr>
			<td class="input_desc"><label id="first_name">Ime</label></td>
			<td class="input_table"><input type="text" class="input_login" placeholder="Vaše ime" name="first_name" required="required"/><br/></td>
			<td colspan="4" rowspan="7" id="login_desc">
				<div>
					<p>Potrebujete opravljeno delo? Potem je to pravo mesto za vas! Objavite vaš projekt in prejmite ponudbe zanj v parih minutah!
					Pomagali Vam bomo priti v stik z najbolšimi med najbolšimi!</p>
					<h4>Kaj lahko pridobite?</h4>
					<ul id="desc_list">
						<li>Pomoč ostalih pri vaših projektih</li>
						<li>Preprosta uporaba spletne strani</li>
						<li>Dogovarjanje je brezplačno</li>
						<li>Preverite prejšnje projekte delojemalcev</li>
						<li>Plačajte le, ko je delo opravljeno in nič prej!</li>
					</ul>
					<!-- <img id="freelancer_img" src="images/freelancer.png"> -->
				</div>
			</td>
		</tr>
		<tr>
			<td class="input_desc"><label id="last_name">Priimek</label></td>
			<td class="input_table"><input type="text" class="input_login" placeholder="Vaš priimek" name="last_name" required="required"/><br/></td>
		</tr>
		<tr>
			<td class="input_desc"><label id="email">E-pošta</label></td>
			<td class="input_table"><input type="email" class="input_login" placeholder="Vaša e-pošta" name="email" required="required"/><br/></td>
		</tr>
		<tr>
			<td class="input_desc"><label id="pass">Vaše geslo</label></td>
			<td class="input_table"><input type="password" class="input_login" placeholder="Vnesite geslo" name="pass" required="required"/><br/></td>
		</tr>
		<tr>
			<td class="input_desc"><label id="pass2">Ponovite geslo</label></td>
			<td class="input_table"><input type="password" class="input_login" placeholder="Ponovno vnesite geslo" name="pass2" required="required"/><br /></td>
		</tr>
		<tr>
			<td class="input_desc"><label id="country">Država</label></td>
			<td class="input_table">
				<select class="input_login" name="country_id">        
					<?php
						$query = "SELECT * FROM countries";
						$result = mysqli_query($link, $query);
						while ($row = mysqli_fetch_array($result)) {
							echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
						}
					?>
				</select><br/>
			</td>
		</tr>
		<tr>
			<td class="input_desc"><div id="passErr"></div></td>
			<td class="login_button"><input type="submit" value="Registriraj" /></td>
		</tr>
	</table>
</form>

<?php
include_once 'footer.php';
?>