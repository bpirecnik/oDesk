<select class="input_login" name="country_id">        
					<?php
						$query = "SELECT * FROM countries";
						$result = mysqli_query($link, $query);
						while ($row = mysqli_fetch_array($result)) {
							echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
						}
					?>
				</select>