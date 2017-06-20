<?php
    include_once 'header.php';
    include_once 'database.php';
?>

<h1 class="align_center">Dodajanje projektov</h1>
<?php $id = $_GET['sender']?>
<form action="message_send.php?sender=<?php echo $id; ?>" method="POST">
	<table class="login_table">
		<tr>
			<td class="input_desc">Naslov:</td>
			<td class="input_table"><input type="text" class="input_login" placeholder="Vnesite naslov sporočila" name="title" required="required"/></td>
		</tr>
		<tr>
			<td class="input_desc">Vsebina:</td>
			<td><textarea style="resize: none;" name="description" class="input_login2" cols="70" rows="10" placeholder="Vnesi vsebino sporočila"></textarea></td>
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