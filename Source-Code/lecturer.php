<link rel="stylesheet" type="text/css" href="style.css">
<div class="container">
        <div class="header">
            <h3>
				COMP207 - Register here for a practical slot
			</h3>
        </div>
<div class="block">
<div id="displayPage">
                <div style="float:right;">
                    <form action="index.php">
                     <button type="submit" class="btn" id="btnDisplayPage">Go to Registration</button>
                    </form>
                </div>
</div>
<table>
<tr>
    <td><h4><label>Select the Slot to display the list of Students Registered:</label></h4></td>
    <td>
<select id="searchSlot" onchange="filterFunc()"> 
	<option value="All">All</option>
    <?php
		$connection = mysql_connect('localhost','root','');
		$db = mysql_select_db('my_database');
		$query = mysql_query("SELECT * FROM timeslot_details");
			
			while($row = mysql_fetch_array($query))
			{	?>
				
					<option value="<?php echo $row['ID'] ?>">
						<?php echo $row['TIMESLOT'] ?>
					</option>
	<?php 	} 	?>
</select></td>
</tr>
</table>
<div style="overflow-y:scroll;height:50%">
<table id="tblResults">
  <tr>
    <th>Student Id</th>
    <th>Student Name</th>
    <th>Email Id</th>
  </tr>
    <?php
    $index = 0;
    $query = mysql_query("SELECT * FROM STUDENT");
    while($row = mysql_fetch_array($query))
    {	?>
        <tr>
            <td>
                <input type="hidden" name="<?php echo "slotid".$index ?>" value="<?php echo $row["TIMESLOT_ID"] ?>">
                <?php $index = $index + 1; echo $row["SID"]; ?>                
            </td>
            <td><?php echo $row["LAST_NAME"].", ".$row["FIRST_NAME"] ?></td>
            <td><?php echo $row["EMAIL_ADDRESS"] ?></td>
        </tr>    
<?php } ?>
</table>
</div>
</div>
</div>
<script>
function filterFunc() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchSlot");
  filter = input.value;
  table = document.getElementById("tblResults");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
        if (td.getElementsByTagName('input')[0].value == filter || filter == "All") {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>