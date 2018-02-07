<select name="slots" size="4" required>					
	<?php
		$connection = mysql_connect('localhost','root','');
		$db = mysql_select_db('my_database');
		$query = mysql_query("SELECT * FROM timeslot_details");
			
			while($row = mysql_fetch_array($query))
			{	
				if(intval($row['SEATS']) == 0)
				{ 	?>
					<option value="<?php echo $row['ID'] ?>" disabled>
						<?php echo $row['TIMESLOT'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $row['SEATS'] . ' seats remaining' ?>
					</option>
						
		<?php 	} 	
				else
				{	?>
				
					<option value="<?php echo $row['ID'] ?>">
						<?php echo $row['TIMESLOT'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $row['SEATS'] . ' seats remaining' ?>
					</option>
		<?php 	} 	
			}
				?>
</select>
